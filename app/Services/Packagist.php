<?php

declare(strict_types=1);

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

final class Packagist
{
    /**
     * Get package with stats.
     */
    public static function getPackageWithStats(string $package): ?array
    {
        try {
            $response = Http::get("https://packagist.org/packages/{$package}.json");

            abort_if($response->failed(), 500);

            $data = $response->json();

            if (is_null($data)) {
                return null;
            }

            return collect($data)->mapWithKeys(function ($data) {
                return [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'github_stars' => $data['github_stars'],
                    'downloads' => $data['downloads']['total'],
                    'repository' => $data['repository'],
                ];
            })->all();

        } catch (Exception $e) {
            report($e);
        }

        return null;
    }
}
