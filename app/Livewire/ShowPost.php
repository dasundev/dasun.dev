<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    public function render(): View
    {
        return view('livewire.show-post', [
            'title' => $this->post->title,
        ]);
    }
}
