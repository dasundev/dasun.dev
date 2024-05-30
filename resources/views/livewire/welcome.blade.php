<div>
    <section class="bg-white dark:bg-black">
        <div
            class="max-w-7xl flex flex-col items-center justify-center mx-auto px-3 lg:px-8 bg-white dark:bg-black pt-10">
            <h1 class="text-5xl lg:text-6xl text-center mt-10 text-black dark:text-white">A Solid <span
                    class="text-primary-700">Laravel</span> Developer</h1>
            <p class="max-w-lg lg:max-w-xl mx-auto text-center text-lg text-gray-500 mt-5">I craft web applications,
                courses & open source packages with the Laravel ecosystem — Let's create something awesome!</p>
            <a
                href="mailto:hello@dasun.dev?subject=Interested in hiring you&body=Hi Dasun,%0D%0A%0D%0AI'm interested in hiring you for my project. Are you currently available?"><x-button
                    class="mt-7">Work with me</x-button></a>
        </div>
    </section>
    <section class="bg-white dark:bg-black">
        @foreach($premiumPackages as $premiumPackage)
            <div class="max-w-4xl flex flex-wrap lg:flex-nowrap items-start justify-center gap-8 lg:gap-10 mx-auto px-5 lg:px-12 pt-20">
                <img src="{{ Storage::url($premiumPackage->thumbnail) }}" class="w-full md:w-1/2 lg:w-1/3" alt="{{ $premiumPackage->name }}">
                <div class="flex flex-col gap-4">
                    <div>
                        <h3 class="text-2xl lg:text-3xl dark:text-white">{{ $premiumPackage->name }}</h3>
                        <span class="bg-green-400 dark:bg-green-600 font-normal text-green-800 dark:text-green-950 px-2 py-1 rounded-full text-xs lg:text-sm">20% OFF</span>
                    </div>
                    <p class="text-gray-500 text-md lg:text-lg">{{ $premiumPackage->description }}</p>
                    <a href="{{ route('checkout', ['package' => $premiumPackage->slug]) }}" class="text-primary-700 text-md font-normal inline-flex items-center gap-1">
                        {{ __('Buy for :price', ['price' => Number::currency($premiumPackage->price, config('payhere.currency'))]) }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
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
