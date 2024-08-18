<?php

declare(strict_types=1);

namespace App\Http\Integrations\Packagist\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

final class GetPackageDataRequest extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $package)
    {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return 'dasundev/'.$this->package.'.json';
    }
}
