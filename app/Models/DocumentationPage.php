<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Sheets\Sheet;

/**
 * @property string $title
 * @property string $slug
 * @property string $package
 * @property string $section
 */
final class DocumentationPage extends Sheet
{
    public function isIndex(): bool
    {
        return Str::endsWith($this->slug, '_index');
    }

    public function getPackageAttribute(): string
    {
        $parts = explode('/', $this->slug);

        return $parts[0];
    }

    public function getSectionAttribute(): string
    {
        $parts = explode('/', $this->slug);

        return $parts[1];
    }
}
