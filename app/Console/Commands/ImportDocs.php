<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Package;
use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

final class ImportDocs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import docs from repositories';

    /**
     * Execute the console command.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        $packages = Package::query()
            ->where('documentation', '=', true)
            ->get();

        foreach ($packages as $package) {
            $directory = $package->name;

            $process = Process::fromShellCommandline('bash '.base_path('scripts/import-docs.sh')." {$package->identifier} {$directory}");
            $process->run();

            if (! $process->isSuccessful()) {
                throw new Exception('Docs import failed');
            }
        }
    }
}
