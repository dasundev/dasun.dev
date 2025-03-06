<?php

declare(strict_types=1);

namespace App\Markdown\Extensions;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;

final class AdmonitionStartParser implements BlockStartParserInterface
{
    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented()) {
            return BlockStart::none();
        }

        if ($cursor->getNextNonSpaceCharacter() !== '>') {
            return BlockStart::none();
        }

        if (! preg_match('/\[!(NOTE|TIP|IMPORTANT|WARNING|CAUTION)\]/', $cursor->getLine(), $matches)) {
            return BlockStart::none();
        }

        $type = mb_strtolower($matches[1]);

        $cursor->advanceToNextNonSpaceOrTab();
        $cursor->advanceToEnd();
        $cursor->advanceBySpaceOrTab();

        return BlockStart::of(new AdmonitionParser($type))->at($cursor);
    }
}
