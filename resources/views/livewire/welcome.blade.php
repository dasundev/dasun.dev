<div>
    <section class="bg-white dark:bg-black">
        <div
            class="max-w-7xl flex flex-col items-center justify-center mx-auto px-3 lg:px-8 bg-white dark:bg-black pt-10">
            <h1 class="text-5xl lg:text-6xl text-center mt-10 text-black dark:text-white">A Solid <span
                    class="text-primary-700">Laravel</span> Developer</h1>
            <p class="max-w-lg lg:max-w-xl mx-auto text-center text-lg text-gray-500 mt-5">I craft web applications,
                courses & open source packages with the Laravel ecosystem — Let's create something awesome!</p>
            <a href="{{ route('register') }}"><x-button class="mt-7">Register and Buy</x-button></a>
        </div>
    </section>
    <section class="bg-white dark:bg-black">
        <div class="max-w-7xl flex flex-col items-center justify-center gap-2 mx-auto px-5 lg:px-8 py-20">
            <h2 class="text-3xl lg:text-4xl text-center text-black dark:text-white">Open Source</h2>
            <p class="text-center text-md text-gray-500">Enjoying my packages? <a
                    href="https://github.com/sponsors/dasundev" target="_blank" class="underline">Become a sponsor</a>
            </p>
            <livewire:packages />
        </div>
    </section>
    <section class="bg-white dark:bg-black">
        <div class="max-w-4xl flex flex-col items-center justify-center gap-2 mx-auto px-0 lg:px-10">
            <h2 class="text-3xl lg:text-4xl text-center text-black dark:text-white mb-10">Latest Blog Post</h2>
            @foreach ($posts as $post)
                <livewire:blog.post :$post :key="$post->id"/>
            @endforeach
        </div>
    </section>
    <section>
        <div class="px-5 py-20">
            <livewire:newsletter />
        </div>
    </section>
</div>
