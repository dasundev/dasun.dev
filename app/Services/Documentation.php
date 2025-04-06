<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\DocumentationPage;
use Spatie\Sheets\Facades\Sheets;

final class Documentation
{
    /**
     * Gets documentation pages for a specific package
     */
    public function get(string $package): array
    {
        $pages = Sheets::collection('docs')->all();

        return $pages->where(function (DocumentationPage $sheet) use ($package) {
            return $sheet->package === $package;
        })->all();
    }

    /**
     * Gets the first page of a package's documentation
     */
    public function getFirstPage(string $package): DocumentationPage
    {
        $sections = array_values($this->getNavigation($package));

        abort_if(empty($sections), 404);

        $pages = $sections[0]['pages'];

        return $pages->first();
    }

    /**
     * Retrieves a single page by slug
     */
    public function getPage(string $slug): DocumentationPage
    {
        $page = Sheets::collection('docs')->get($slug);

        abort_if(empty($page), 404);

        return $page;
    }

    /**
     * Generates navigation for the documentation pages
     */
    public function getNavigation(string $package): array
    {
        $sections = collect($this->get($package))
            ->reduce(function (array $navigation, DocumentationPage $page) {
                if ($page->isIndex()) {
                    $navigation[$page->section]['_index'] = $page;
                } else {
                    $navigation[$page->section]['pages'][] = $page;
                }

                return $navigation;
            }, []);

        return collect($sections)
            ->sortBy(fn (array $sections) => $sections['_index']->weight ?? -1)
            ->map(fn ($section) => [...$section, 'pages' => collect($section['pages'])->sortBy(fn (DocumentationPage $page) => $page->weight ?? -1)])
            ->all();
    }
}
