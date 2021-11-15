<?php

namespace App\Http\Middleware;

use Closure;
use Shakurov\Coinbase\Exceptions\WebhookFailed;

class VerifySignature
{
    /**
     * @throws WebhookFailed
     */
    public function handle($request, Closure $next)
    {
        $signature = $request->header('X-CC-Webhook-Signature');

        if (! $signature) {
            throw WebhookFailed::missingSignature();
        }

        if (! $this->isValid($signature, $request->getContent())) {
            throw WebhookFailed::invalidSignature($signature);
        }

        return $next($request);
    }

    /**
     * @throws WebhookFailed
     */
    protected function isValid(string $signature, string $payload): bool
    {
        $secret = config('coinbase.webhookSecret');

        if (empty($secret)) {
            throw WebhookFailed::sharedSecretNotSet();
        }

        $computedSignature = hash_hmac('sha256', $payload, $secret);

        return hash_equals($signature, $computedSignature);
    }
}
