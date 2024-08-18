<?php

namespace App\Http\Integrations\Anystack\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPoliciesRequest extends Request
{
    public function __construct(
        private readonly string $productId
    ) {
    }

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/products/$this->productId/policies";
    }
}
