<?php

namespace App\Livewire;

use App\Repositories\Contracts\PostRepository;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Blog extends Component
{
    #[Title('Blog')]
    public function render(): View
    {
        return view('livewire.blog', [
            'posts' => app(PostRepository::class)->getPublishedPosts(),
        ]);
    }
}
