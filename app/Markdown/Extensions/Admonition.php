<?php

declare(strict_types=1);

namespace App\Markdown\Extensions;

use League\CommonMark\Node\Block\AbstractBlock;

final class Admonition extends AbstractBlock
{
    public function __construct(string $type)
    {
        parent::__construct();

        $this->data->set('attributes', ['class' => ['callout', "callout-{$type}"]]);
    }
}
