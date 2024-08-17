<?php

namespace App\Jobs;

use App\Http\Integrations\Anystack\AnystackConnector;
use App\Http\Integrations\Anystack\Requests\CreateLicenseRequest;
use App\Http\Integrations\Anystack\Requests\GetPoliciesRequest;
use App\Models\Package;
use App\Models\User;
use App\Repositories\Contracts\LicenseRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class CreateLicense implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly Package $package,
        private readonly User $user
    ) {}

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function handle(LicenseRepository $licenseRepository): void
    {
        $anystackProductId = $this->package->anystack_product_id;
        $anystackPolicy = $this->getAnystackPolicy();

        $license = $this->createLicenseOnAnystack(
            policyId: $anystackPolicy->id,
            productId: $anystackProductId
        );

        // TODO: Create license
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    private function getAnystackPolicy(): Collection
    {
        $token = config('anystack.token');

        $connector = new AnystackConnector($token);

        $response = $connector->send(new GetPoliciesRequest($this->package->anystack_product_id));

        return $response
            ->collect('data')
            ->where('name', '1 Year')
            ->first();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    private function createLicenseOnAnystack(string $policyId, string $productId): Collection
    {
        $token = config('anystack.token');

        $connector = new AnystackConnector($token);

        $response = $connector->send(new CreateLicenseRequest(
            productId: $productId,
            policyId: $policyId,
            user: $this->user
        ));

        return $response
            ->collect('data')
            ->first();
    }
}
