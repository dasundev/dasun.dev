<?php

declare(strict_types=1);

use Livewire\Volt\Volt;

Route::feeds();

Volt::route('/', 'welcome');
Volt::route('/about', 'about')->name('about');
Volt::route('/blog', 'blog')->name('blog');
Volt::route('/blog/{slug}', 'post')->name('blog-post');
Volt::route('/open-source', 'open-source')->name('open-source');
