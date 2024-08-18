<?php

namespace App\Livewire\Blog;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class PostMetaData extends Component
{
    public $post;

    public function render(): View
    {
        return view('livewire.blog.post-meta-data');
    }
}
