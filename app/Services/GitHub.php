<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Integrations\GitHub\GitHubConnector;
use App\Http\Integrations\GitHub\Requests\ListRepositoryTags;
use Illuminate\Support\Collection;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

final readonly class GitHub
{
    /**
     * Fetch all tags for the given repository from GitHub.
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public static function fetchAllRepositoryTags(string $repository): Collection
    {
        $connector = new GitHubConnector;

        $response = $connector->send(new ListRepositoryTags($repository));

        return $response->collect()->map(function ($tag) {
            return [
                'name' => $tag['name'],
                'sha' => $tag['commit']['sha'],
            ];
        });
    }
}
