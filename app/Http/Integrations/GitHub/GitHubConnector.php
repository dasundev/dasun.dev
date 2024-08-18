<?php

declare(strict_types=1);

namespace App\Http\Integrations\GitHub;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

final class GitHubConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.github.com';
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        $token = config('services.github.token');

        return new TokenAuthenticator($token);
    }
}
