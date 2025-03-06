<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Computed;
use App\Models\Post;

new class extends Component {
    public string $slug;

    #[Computed]
    public function post(): Post
    {
        return Post::whereSlug($this->slug)->firstOrFail();
    }

    public function render(): mixed
    {
        return view('pages.post')
            ->title($this->post->title)
            ->layoutData(['description' => $this->post->excerpt]);
    }
}
?>

<div>
    <h1 class="text-zinc-100 text-4xl md:text-5xl font-bold tracking-tight leading-normal">{{ $this->post->title }}</h1>
    @if($this->post->isPublished())
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2">
            <p class="text-sm text-zinc-400">
                @if(! $this->post->isEdited())
                    Published on
                    <time datetime="{{ $this->post->published_at }}">
                        {{ $this->post->published_at->format('M jS Y') }}
                    </time>
                @else
                    Last updated on
                    <time datetime="{{ $this->post->updated_at }}">
                        {{ $this->post->updated_at->format('M jS Y') }}
                    </time>
                @endif
                by Dasun Tharanga
            </p>
            <span class="text-zinc-400 hidden sm:block">·</span>
            <span class="text-sm text-zinc-400">{{ Str::readTime($this->post->content) }} min read</span>
        </div>
    @endif
    <div class="markdown mt-10 flex max-w-full flex-col prose prose-invert text-zinc-100">
        @markdown($this->post->content)
    </div>
</div>
