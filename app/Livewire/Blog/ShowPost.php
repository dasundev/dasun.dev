<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;

        SEOMeta::setTitle($this->post->title);
        SEOMeta::setDescription($this->post->excerpt);

        OpenGraph::setTitle($this->post->title);
        OpenGraph::setDescription($this->post->excerpt);
        OpenGraph::addImage(Storage::url($this->post->banner));
    }

    public function render(): View
    {
        return view('livewire.blog.show-post', [
            'title' => $this->post->title,
        ]);
    }
}
