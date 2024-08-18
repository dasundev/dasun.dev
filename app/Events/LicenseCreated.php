<?php

namespace App\Events;

use App\Jobs\SyncLicenseFallbackVersion;
use App\Models\License;
use App\Models\Package;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LicenseCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public readonly License $license
    )
    {
        SyncLicenseFallbackVersion::dispatch($license);
    }
}
