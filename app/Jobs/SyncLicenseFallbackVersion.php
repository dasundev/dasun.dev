<?php

namespace App\Jobs;

use App\Models\License;
use App\Models\Package;
use App\Services\GitHub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class SyncLicenseFallbackVersion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly License $license,
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
