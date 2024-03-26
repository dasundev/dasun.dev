<section class="max-w-4xl mx-auto">
        <h2 class="max-w-lg mx-auto dark:text-white text-3xl text-center font-normal">
            Get notified for the next blog post? <span class="text-primary-700 font-semibold">Sign up</span> for the newsletter.
        </h2>

        <div
            x-data="{
                subscribed: false,
                message: '',
                onSubscribe(e) {
                    this.subscribed = true
                    this.message = e.detail.message
                }
            }"
            @subscribed.window="onSubscribe"
        >
            <div
                x-cloak
                x-show="subscribed"
                x-transition
                class="mt-10 p-5 transition-opacity duration-300 text-black bg-gray-100 dark:bg-gray-900 dark:text-white"
            >
                Success! I've just sent you an email. Simply click the link inside to confirm your subscription.
            </div>

            <form
                x-show="!subscribed"
                wire:submit="subscribe"
            >
                <div class="mt-10 flex flex-col lg:flex-row items-center justify-center gap-2">
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
                        <x-button type="submit">Notify me</x-button>
                    </div>
                </div>
            </form>
        </div>
</section>
