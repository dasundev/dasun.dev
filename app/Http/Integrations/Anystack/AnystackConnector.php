<?php

namespace App\Http\Integrations\Anystack;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class AnystackConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        private readonly string $token
    ) {
    }

    /**
     * The Base URL of the API.
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.anystack.sh/v1';
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}
