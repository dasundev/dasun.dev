<?php

namespace App\Listeners;

use App\Models\License;
use App\Services\GitHub;
use Illuminate\Contracts\Queue\ShouldQueue;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

readonly class SyncLicenseFallbackVersion implements ShouldQueue
{
    public function __construct(
        private License $license,
    ) {}

    /**
     * Execute the job.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function handle(): void
    {
        $latestTag = GitHub::fetchAllRepositoryTags($this->license->purchasable->composer_package)->first();

        $this->license->update([
            'fallback_version' => $latestTag,
        ]);
    }
}
