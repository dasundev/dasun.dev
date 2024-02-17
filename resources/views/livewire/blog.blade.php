<div class="max-w-3xl mx-auto my-10">
    <div class="mb-10">
        <h2 class="text-3xl lg:text-4xl text-center text-black dark:text-white">{{ __('Blog') }}</h2>
        <p class="text-center text-md text-gray-500 mt-2">{{ __('Web Development Tips, Tricks, and Insights') }}</p>
    </div>
    @foreach ($posts as $post)
        <article class="py-10 border border-gray-100 dark:border-gray-900 px-10 mb-8">
            <a class="text-xl lg:text-2xl font-normal text-black dark:text-white"
                href="{{ route('show-post', $post->slug) }}" wire:navigate.hover>{{ $post->title }}</a>
            <p class="text-sm text-gray-700 dark:text-gray-200 mt-2">
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
            <p class="text-black dark:text-white mt-5 text-md">{{ $post->excerpt }}</p>
            <p class="mt-6">
                <a class="underline text-primary-700 font-normal" href="{{ route('show-post', $post->slug) }}"
                    wire:navigate.hover>{{ __('Read more') }}</a>
            </p>
        </article>
    @endforeach
</div>
