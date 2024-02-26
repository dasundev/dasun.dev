<?php

namespace App\Torchlight;

use Closure;
use Torchlight\Block;
use Torchlight\Commonmark\V2\TorchlightExtension;

class TorchlightWithCopyExtension extends TorchlightExtension
{
    public function defaultBlockRenderer(): Closure
    {
        return function (Block $block) {
            $torchlight = parent::defaultBlockRenderer();

            return <<<HTML
                <div x-data="clipboard" class="relative code-block-container">
                    <button
                        type="button"
                        title="Copy to clipboard"
                        class="hidden lg:block copy-to-clipboard-button"
                        @click.prevent="copyToClipboard"
                    >
                        <svg x-show="!copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20px" height="20px" class="text-gray-500">
                          <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                        </svg>
                        <svg x-show="copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20px" height="20px" class="text-gray-500">
                          <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                          <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    {$torchlight($block)}
                </div>
            HTML;
        };
    }
}
