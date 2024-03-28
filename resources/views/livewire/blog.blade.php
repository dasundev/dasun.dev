<div class="max-w-4xl mx-auto my-10">
    <div class="mb-10">
        <h2 class="text-3xl lg:text-4xl text-center text-black dark:text-white">{{ __('Blog') }}</h2>
        <p class="text-center text-md text-gray-500 mt-2">{{ __('Web Development Tips, Tricks, and Insights') }}</p>
    </div>
    @foreach ($posts as $post)
        <div class="mb-8">
            <livewire:blog.post :$post :key="$post->id"/>
        </div>
    @endforeach
</div>
