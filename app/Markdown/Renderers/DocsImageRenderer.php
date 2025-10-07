<?php

declare(strict_types=1);

namespace App\Markdown\Renderers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use League\CommonMark\Node\Inline\Newline;
use League\CommonMark\Node\Node;
use League\CommonMark\Node\NodeIterator;
use League\CommonMark\Node\StringContainerInterface;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Util\RegexHelper;
use League\CommonMark\Xml\XmlNodeRendererInterface;
use League\Config\ConfigurationAwareInterface;
use League\Config\ConfigurationInterface;
use Stringable;

final class DocsImageRenderer implements ConfigurationAwareInterface, NodeRendererInterface, XmlNodeRendererInterface
{
    /** @psalm-readonly-allow-private-mutation */
    private ConfigurationInterface $config;

    /**
     * @param  Image  $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): Stringable
    {
        Image::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');

        $attrs['class'] = 'spotlight';

        $forbidUnsafeLinks = ! $this->config->get('allow_unsafe_links');
        if ($forbidUnsafeLinks && RegexHelper::isLinkPotentiallyUnsafe($this->getImageUrl($node))) {
            $attrs['src'] = '';
        } else {
            $attrs['src'] = $this->getImageUrl($node);
        }

        $attrs['alt'] = $this->getAltText($node);

        if (($title = $node->getTitle()) !== null) {
            $attrs['title'] = $title;
        }

        return new HtmlElement('img', $attrs, '', true);
    }

    public function setConfiguration(ConfigurationInterface $configuration): void
    {
        $this->config = $configuration;
    }

    public function getXmlTagName(Node $node): string
    {
        return 'image';
    }

    /**
     * @param  Image  $node
     * @return array<string, scalar>
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function getXmlAttributes(Node $node): array
    {
        Image::assertInstanceOf($node);

        return [
            'destination' => $this->getImageUrl($node),
            'title' => $node->getTitle() ?? '',
        ];
    }

    private function getAltText(Image $node): string
    {
        $altText = '';

        foreach ((new NodeIterator($node)) as $n) {
            if ($n instanceof StringContainerInterface) {
                $altText .= $n->getLiteral();
            } elseif ($n instanceof Newline) {
                $altText .= "\n";
            }
        }

        return $altText;
    }

    private function getImageUrl(Image $node): string
    {
        // If we're not on the docs route, return the URL as-is
        if (! request()->routeIs('docs')) {
            return $node->getUrl();
        }

        $storage = Storage::disk('docs');

        $slug = request()->route('slug');

        $package = Str::beforeLast($slug, '/');

        $imagePath = Str::after($node->getUrl(), './');

        $path = "{$package}/{$imagePath}";

        if ($storage->missing($path)) {
            return $node->getUrl();
        }

        return $storage->url($path);
    }
}
