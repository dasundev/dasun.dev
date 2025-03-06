<?php

declare(strict_types=1);

use App\Http\Middleware\DocumentationRedirect;
use Livewire\Volt\Volt;

Route::feeds();

Volt::route('/', 'welcome');
Volt::route('/about', 'about')->name('about');
Volt::route('/blog', 'blog')->name('blog');
Volt::route('/blog/{slug}', 'post')->name('blog-post');
Volt::route('/open-source', 'open-source')->name('open-source');
Volt::route('/docs/{slug}', 'docs')->where('slug', '.*')->middleware(DocumentationRedirect::class)->name('docs');
