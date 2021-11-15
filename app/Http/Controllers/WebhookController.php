<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifySignature;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function __construct()
    {
        $this->middleware(VerifySignature::class);
    }

    /**
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        $payload = $request->input();

        $model = config('coinbase.webhookModel');

        $coinbaseWebhookCall = $model::create([
            'type' =>  $payload['event']['type'] ?? '',
            'payload' => $payload,
        ]);

        try {
            $coinbaseWebhookCall->process();
        } catch (\Exception $e) {
            $coinbaseWebhookCall->saveException($e);

            throw $e;
        }
    }
}
