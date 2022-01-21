<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use DocuSign\eSign\Api\EnvelopesApi;
use DocuSign\eSign\Client\ApiClient;
use DocuSign\eSign\Configuration;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\TemplateRole;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\URL;

class SendDocusignForSignature
{
    protected static $docusignConfig;

    protected static $expires_in;
    protected static $access_token;
    protected static $expiresInTimestamp;
    protected static $account;
    protected static $apiClient;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        self::$docusignConfig['integration_key'] = config('docusign.integration_key');
        self::$docusignConfig['ds_client_id'] = config('docusign.ds_client_id');
        self::$docusignConfig['private_key_file'] = config('docusign.private_key_file');
        self::$docusignConfig['private_key_string'] = config('docusign.private_key_sting');
        self::$docusignConfig['ds_impersonated_user_id'] = config('docusign.ds_impersonated_user_id');
        self::$docusignConfig['account_id'] = config('docusign.account_id');
        self::$docusignConfig['template_id'] = config('docusign.template_id');
        self::$docusignConfig['base_path'] = config('docusign.base_path');
        self::$docusignConfig['authorization_server'] = config('docusign.authorization_server');


        $config = new Configuration();
        $config->setHost(self::$docusignConfig['base_path']);
        self::$apiClient = new ApiClient($config);
        self::$access_token = $this->jwtAuth();
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCompleted  $event
     * @return void
     */
    public function handle(OrderCompleted $event)
    {

        $args = [
            'account_id' => self::$docusignConfig['account_id'],
        ] ;
        $template_id  = self::$docusignConfig['template_id'];


        $config = new Configuration();
        $config->setHost(self::$docusignConfig['base_path']);
        $config->addDefaultHeader('Authorization', 'Bearer ' . self::$access_token->getAccessToken());
        $envelopeApiClient = new ApiClient($config);
        $envelopeApi = new EnvelopesApi($envelopeApiClient);




        $signer_name  = $event->order->user->firstName . ' ' . $event->order->user->lastname;
        $signer_email = $event->order->user->email;



        $args['envelope_args'] =[
            'signer_email' => $signer_email,
            'signer_name' => $signer_name,
            'template_id' => $template_id
        ];

        $envelope_definition = $this->make_envelope($args['envelope_args']);

        $envelopeApi->createEnvelope($args['account_id'], $envelope_definition);


    }

    /**
     * Creates envelope definition using a template
     * Parameters for the envelope: signer_email, signer_name, signer_client_id
     *
     * @param  $args array
     * @return mixed -- returns an envelope definition
     */
    private function make_envelope(array $args): EnvelopeDefinition
    {
        # create the envelope definition with the template_id
        $envelope_definition = new EnvelopeDefinition([
                                                          'status' => 'sent', 'template_id' => $args['template_id']
                                                      ]);
        # Create the template role elements to connect the signer and cc recipients
        # to the template
        $signer = new TemplateRole([
                                       'email' => $args['signer_email'], 'name' => $args['signer_name'],
                                       'role_name' => 'Customer'
                                   ]);

        # Add the TemplateRole objects to the envelope object
        $envelope_definition->setTemplateRoles([$signer]);

        return $envelope_definition;
    }
    # ***DS.snippet.0.end



    public function jwtAuth(){

        self::$apiClient->getOAuth()->setOAuthBasePath(self::$docusignConfig['authorization_server']);
        if(!empty(self::$docusignConfig['private_key_file'])) {
            $privateKey = file_get_contents( base_path() . '/' . self::$docusignConfig['private_key_file'], true );
        } elseif(!empty(self::$docusignConfig['private_key_string'])) {
            $privateKey = self::$docusignConfig['private_key_string'];
        }

        $scope = 'signature user_write group_read organization_read permission_read user_read account_read domain_read identity_provider_read ';

        //Make sure to add the "impersonation" scope when using JWT authorization
        $jwt_scope = $scope . " impersonation";

        try {
            $response = self::$apiClient->requestJWTUserToken(
                self::$docusignConfig['ds_client_id'],
                self::$docusignConfig['ds_impersonated_user_id'],
                $privateKey,
                $jwt_scope,
            );


            return $response[0];    //code...
        } catch (\Throwable $th) {

            // we found consent_required in the response body meaning first time consent is needed
            if (strpos($th->getMessage(), "consent_required") !== false) {
                $_SESSION['consent_set'] = true;
                $authorizationURL = 'https://'.self::$docusignConfig['authorization_server'] .'/oauth/auth?' . http_build_query([
                                                                                                        'scope'         => $jwt_scope,
                                                                                                        'redirect_uri'  => URL::to('/'),
                                                                                                        'client_id'     => self::$docusignConfig['ds_client_id'],
                                                                                                        'response_type' => 'code'
                                                                                                    ]);
                header('Location: ' . $authorizationURL);
                exit();
            }
        }
    }
}
