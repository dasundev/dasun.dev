<?php

namespace App\Http\Integrations\Packagist;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class PackagistConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://packagist.org/packages';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
