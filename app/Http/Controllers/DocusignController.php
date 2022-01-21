<?php

namespace App\Http\Controllers;

use App\Events\OrderCompleted;
use App\Models\Order;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\TemplateRole;
use Illuminate\Http\Request;
use DocuSign\eSign\Configuration;
use DocuSign\eSign\Api\EnvelopesApi;
use DocuSign\eSign\Client\ApiClient;
use Exception;
use Illuminate\Support\Facades\Auth;

class DocusignController extends Controller
{



    private $signer_client_id = 1000; # Used to indicate that the signer will use embedded

    /** Specific template arguments */
    private $args;



    public function __construct()
    {
        //$config->addDefaultHeader('Authorization', 'Bearer ' . self::$access_token->getAccessToken());
    }




    public function jwtTest(){
        $order = Order::findOrFail(1);
        OrderCompleted::dispatch($order);

        return response()->json(['success' => true]);

    }


}
