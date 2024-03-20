<section class="max-w-4xl mx-auto pb-10">
    <h2 class="max-w-lg mx-auto dark:text-white text-3xl text-center font-normal">
        Get notified for the next blog post? <span class="text-primary-700 font-semibold">Sign up</span> for the newsletter.
    </h2>
    <div class="mt-10 flex flex-col lg:flex-row items-center justify-center gap-3">
        <div class="w-full lg:w-1/2">
            <label for="email" class="sr-only">Email</label>
            <livewire:components.forms.input
                id="email"
                type="email"
                wire:model="email"
                placeholder="Enter your email"
            />
        </div>
        <div>
            <x-button>Notify me</x-button>
        </div>
    </div>
</section>
