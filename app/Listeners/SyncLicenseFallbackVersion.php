<?php

namespace App\Listeners;

use App\Events\LicenseCreated;
use App\Services\GitHub;
use Illuminate\Contracts\Queue\ShouldQueue;

readonly class SyncLicenseFallbackVersion implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param \App\Events\LicenseCreated $event
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
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
