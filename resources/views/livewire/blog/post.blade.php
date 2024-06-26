<div class="py-10 px-5 lg:px-10 transition-none lg:transition transform-none lg:transform border-y md:border border-gray-100 dark:border-gray-900 hover:scale-100 lg:hover:scale-105 hover:border-gray-200 dark:hover:border-gray-800 motion-reduce:transition-none motion-reduce:hover:transform-none">
    <a href="{{ route('show-post', $post->slug) }}" wire:navigate.hover>
        <div class="text-xl lg:text-2xl font-normal text-black dark:text-white">{{ $post->title }}</div>
        <div class="mt-2">
            <livewire:blog.post-meta-data :$post :key="$post->id" />
        </div>
        <p class="text-gray-600 dark:text-gray-300 mt-5">{{ $post->excerpt }}</p>
    </a>
</div>
