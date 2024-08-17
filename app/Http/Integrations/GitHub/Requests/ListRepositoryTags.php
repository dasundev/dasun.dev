<?php

namespace App\Http\Integrations\GitHub\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class ListRepositoryTags extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(private readonly string $repository)
    {
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/repos/$this->repository/tags";
    }
}
