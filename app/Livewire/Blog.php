<?php

namespace App\Livewire;

use App\Repositories\Contracts\PostRepository;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Blog extends Component
{
    public function mount(): void
    {
        SEOMeta::setTitle('Blog');
        SEOMeta::setDescription("Dasun's Blog - Insights and Trends in Web Development");

        OpenGraph::setTitle("Dasun's Blog - Insights and Trends in Web Development");
        OpenGraph::setDescription("Dasun's Blog - Insights and Trends in Web Development");
    }

    #[Title('Blog')]
    public function render(): View
    {
        return view('livewire.blog', [
            'posts' => app(PostRepository::class)->getPublishedPosts(),
        ]);
    }
}
