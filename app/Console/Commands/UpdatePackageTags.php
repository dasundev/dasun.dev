<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdatePackageTags extends Command
{
    protected $signature = 'package:update-tags';

    protected $description = 'Fetch and update all tags for packages from GitHub.';

    public function handle(): void {}
}
