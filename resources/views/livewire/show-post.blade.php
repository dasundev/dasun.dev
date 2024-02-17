@section('title', $post->title)

<div class="max-w-3xl mx-auto">
    <article class="max-w-none my-10 px-5 lg:px-0">
        <a href="{{ route('show-post', $post->slug) }}"
            class="text-3xl lg:text-4xl font-semibold text-black dark:text-white" wire:navigate>{{ $post->title }}</a>
        <p class="text-md text-gray-700 dark:text-gray-200 mt-2 mb-5">
            Published on
            <time datetime="{{ $post->published_at }}">
                {{ $post->published_at->format('M jS Y') }}
            </time>
            by
            <a class="underline" target="_blank" rel="noopener noreferrer" title="https://x.com/dasundev"
                href="https://x.com/dasundev">
                Dasun Tharanga
            </a>
        </p>
        <div class="prose dark:prose-invert">
            @markdown($post->content)
        </div>
    </article>
</div>
