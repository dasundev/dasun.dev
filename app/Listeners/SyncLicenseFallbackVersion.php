<?php

namespace App\Listeners;

use App\Events\LicenseCreated;
use App\Models\License;
use App\Services\GitHub;
use Illuminate\Contracts\Queue\ShouldQueue;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

readonly class SyncLicenseFallbackVersion implements ShouldQueue
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function handle(LicenseCreated $event): void
    {
        $license = $event->license;

        $latestTag = GitHub::fetchAllRepositoryTags($license->purchasable->composer_package)->first();

        $license->update([
            'fallback_version' => $latestTag,
        ]);
    }
}
