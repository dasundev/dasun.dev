@section('title', $post->title)

<div class="max-w-3xl mx-auto">
    <article class="max-w-none my-10 px-5 lg:px-0">
        <h1 href="{{ route('show-post', $post->slug) }}"
           class="text-3xl lg:text-4xl font-semibold text-black dark:text-white">{{ $post->title }}</h1>
        <div class="mt-5 mb-10">
            <livewire:blog.post-meta-data :$post />
        </div>
        <div class="prose dark:prose-invert">
            @markdown($post->content)
        </div>
        <div class="my-20">
            <livewire:newsletter />
        </div>
    </article>
</div>
