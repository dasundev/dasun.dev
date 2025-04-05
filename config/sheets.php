<?php

declare(strict_types=1);

return [
    'default_collection' => null,

    'collections' => [
        'docs' => [
            'disk' => 'docs',
            'sheet_class' => App\Models\DocumentationPage::class,
            'path_parser' => Spatie\Sheets\PathParsers\SlugParser::class,
            'content_parser' => App\Markdown\DocumentationContentParser::class,
            'extension' => 'md',
        ],
    ],
];
