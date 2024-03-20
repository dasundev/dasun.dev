<div class="max-w-4xl mx-auto py-10 flex flex-col items-center justify-center px-10 mt-10">
    <p class="dark:text-white text-2xl text-center font-normal">
        Get notified for the next blog post? </br>
        <span class="text-primary-700 font-semibold">Sign up</span> for the newsletter.
    </p>
    <div class="w-full flex items-center gap-2 mt-10">
        <div class="w-full h-full">
            <label for="email" class="sr-only">Email</label>
            <livewire:components.forms.input
                id="email"
                type="email"
                wire:model="email"
                placeholder="Enter your email"
            />
        </div>
        <x-button class="w-1/2 h-full">Notify me</x-button>
    </div>
</div>
