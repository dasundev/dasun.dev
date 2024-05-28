<?php

namespace App\Http\Integrations\Anystack\Requests;

use App\Models\User;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateLicenseRequest extends Request implements HasBody
{
    use HasJsonBody;

    public function __construct(
        private readonly string $productId,
        private readonly string $policyId,
        private readonly User $user
    ) {
    }

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return "/products/$this->productId/licenses";
    }

    protected function defaultBody(): array
    {
        return [
            'policy_id' => $this->policyId,
            'name' => $this->user->email,
        ];
    }
}
