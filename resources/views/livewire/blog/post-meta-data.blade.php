<div>
    @if(! $post->isEdited())
        <p class="text-sm text-gray-700 dark:text-gray-200">
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
    @else
        <p class="text-sm text-gray-700 dark:text-gray-200">
            Last updated on
            <time datetime="{{ $post->updated_at }}">
                {{ $post->updated_at->format('M jS Y') }}
            </time>
            by
            <a class="underline" target="_blank" rel="noopener noreferrer" title="https://x.com/dasundev"
               href="https://x.com/dasundev">
                Dasun Tharanga
            </a>
        </p>
    @endif
</div>
