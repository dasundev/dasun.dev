<?php

declare(strict_types=1);

namespace App\Markdown\Extensions;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use Stringable;

final class AdmonitionRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): Stringable
    {
        Admonition::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');

        $filling = $childRenderer->renderNodes($node->children());

        $innerSeparator = $childRenderer->getInnerSeparator();

        if ($filling === '') {
            return new HtmlElement('div', $attrs, $innerSeparator);
        }

        return new HtmlElement(
            'div',
            $attrs,
            $innerSeparator.$filling.$innerSeparator
        );
    }
}
