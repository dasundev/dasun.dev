<?php

declare(strict_types=1);

namespace App\Documentation;

use Illuminate\Support\HtmlString;
use Spatie\LaravelMarkdown\MarkdownRenderer;
use Spatie\Sheets\ContentParser as BaseContentParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

final class ContentParser implements BaseContentParser
{
    private MarkdownRenderer $markdownRenderer;

    public function __construct(MarkdownRenderer $markdownRenderer)
    {
        $this->markdownRenderer = $markdownRenderer;
    }

    public function parse(string $contents): array
    {
        $document = YamlFrontMatter::parse($contents);

        $htmlContents = $this->markdownRenderer->toHtml($document->body());

        return array_merge(
            $document->matter(),
            ['contents' => new HtmlString($htmlContents)]
        );
    }
}
