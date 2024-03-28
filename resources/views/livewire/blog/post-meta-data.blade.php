<div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2">
    <p class="text-sm text-gray-700 dark:text-gray-200">
        @if(! $post->isEdited())
            Published on
            <time datetime="{{ $post->published_at }}">
                {{ $post->published_at->format('M jS Y') }}
            </time>
        @else
            Last updated on
            <time datetime="{{ $post->updated_at }}">
                {{ $post->updated_at->format('M jS Y') }}
            </time>
        @endif
        by
        <a class="underline" target="_blank" rel="noopener noreferrer" title="https://x.com/dasundev"
           href="https://x.com/dasundev">
            Dasun Tharanga
        </a>
    </p>
    <span class="text-gray-700 dark:text-gray-200 hidden sm:block">·</span>
    <span class="text-sm text-gray-700 dark:text-gray-200">{{ Str::readTime($post->content) }} min read</span>
</div>
