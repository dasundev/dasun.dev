<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Package;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
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
        $packages = Package::all();

        foreach ($packages as $package) {
            $directory = $this->getImportDirectory($package->name);

            $process = Process::fromShellCommandline('bash '.base_path('scripts/import-docs.sh')." {$package->name} {$directory}");
            $process->run();

            if (! $process->isSuccessful()) {
                throw new Exception('Docs import failed');
            }
        }
    }

    private function getImportDirectory(string $package): string
    {
        return Str::of($package)
            ->after('/')
            ->toString();
    }
}
