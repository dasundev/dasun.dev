<?php

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component {
    #[Computed]
    public function posts(): Collection
    {
        return Post::query()
            ->published()
            ->orderByDesc('published_at')
            ->get();
    }

    public function render(): mixed
    {
        return view('pages.blog')
            ->title('Blog')
            ->layoutData(['description' => "Things that are too long to tweet."]);
    }
}
?>

<div>
    <h1 class="text-zinc-100 text-4xl md:text-5xl font-bold tracking-tight leading-normal mt-8">Things that are too long to tweet.</h1>
    <div class="mt-10 flex max-w-full flex-col">
        @foreach($this->posts as $post)
            <div class="z-0 sm:rounded-2xl md:col-span-3 group relative flex flex-col gap-1 items-start hover:bg-zinc-800 transition-colors -inset-x-5 px-5 py-8">
                <a href="{{ route('blog-post', ['slug' => $post->slug]) }}" class="absolute inset-0"></a>
                <h2 class="text-xl font-semibold tracking-tight text-zinc-100">{{ $post->title }}</h2>
                <p class="mt-2 text-base text-zinc-400">
                    {{ $post->excerpt }}
                </p>
                <div aria-hidden="true" class="mt-4 flex items-center text-base font-medium text-primary">Read post
                    <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current">
                        <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
        @endforeach
    </div>
</div>
