<div>
    @foreach($packages as $package)
        <div class="max-w-4xl mx-auto grid grid-cols-3 justify-start mt-10">
            <div class="col-span-3 lg:col-span-1">
                <div class="text-primary-700 font-normal text-md">{{ \Illuminate\Support\Str::replace('dasundev/', '', $package->name) }}</div>
                <div class="flex gap-2 items-center">
                    <div class="flex items-center gap-1">
                        <span class="text-gray-500 text-sm">{{ $package->github_stars }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    </div>
                    <div class="w-1 h-1 bg-gray-500 rounded-full"></div>
                    <div class="flex items-center gap-1">
                        <span class="text-gray-500 text-sm">{{ $package->downloads_total }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-span-3 lg:col-span-2">
                <div class="text-md text-black dark:text-white">{{ $package->description }}</div>
            </div>
        </div>
    @endforeach
</div>
