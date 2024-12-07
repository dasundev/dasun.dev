<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<nav x-data="{ open: false }" x-init="$watch('open', value => {
            value
                ?
                $refs.links.style.display = 'inline-flex' :
                $refs.links.style.display = 'none'
        })"
     class="flex-col justify-center items-center p-0 lg:px-5 lg:py-5 bg-primary-700">
    <div class="relative max-w-7xl mx-auto flex justify-between flex-wrap lg:flex-nowrap items-center">
        <button type="button" class="block lg:hidden p-5" @click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="w-7 h-7 transition-all duration-300 scale-90 text-black dark:text-white"
                 :class="open ? 'rotate-90' : 'rotate-[-45]'">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                <path x-cloak x-show="open" stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="absolute lg:relative top-0 left-1/2 lg:left-0 -ml-[75px] lg:m-0 z-0 lg:z-10 p-5 lg:p-0 order-none lg:order-1">
            <a href="/" class="text-2xl font-normal text-white" wire:navigate.hover>dasun.dev</a>
        </div>
        <div class="flex items-center order-none lg:order-3">
            <div class="z-0 lg:z-10 inline-flex gap-0 lg:gap-5 items-center">
                @auth
                    <div class="sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <img class="rounded-full cursor-pointer" width="38" height="38" src="{{ Gravatar::fallback("https://ui-avatars.com/api?name=".auth()->user()->name)->get(auth()->user()->email) }}" alt="{{ auth()->user()->name }}">
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('dashboard')" wire:navigate>
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth
                <button type="button" @click="$store.darkMode.toggle()"
                        class="bg-black bg-opacity-10 hover:bg-opacity-15 transition-colors cursor-pointer text-yellow-500 p-2 m-5 lg:m-0 rounded-full">
                    <svg x-data xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path x-cloak x-show="!$store.darkMode.on" stroke-linecap="round" stroke-linejoin="round"
                              d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                        <path x-cloak x-show="$store.darkMode.on" stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                </button>
            </div>
        </div>
        <div x-ref="links"
             class="static lg:absolute order-none lg:order-2 hidden lg:inline-flex justify-center flex-col lg:flex-row gap-x-0 lg:gap-x-6 h-full w-full">
            <a class="text-md inline-flex leading-none items-center font-light hover:text-gray-200 text-white border-b border-white border-opacity-10 first:border-t lg:first:border-0 lg:border-0 px-6 py-6 lg:p-0"
               href="#">Documentation</a>
            <a class="text-md inline-flex leading-none items-center font-light hover:text-gray-200 text-white border-b border-white border-opacity-10 lg:border-0 px-6 py-6 lg:p-0"
               href="{{ route('blog') }}" wire:navigate.hover>GitHub</a>
        </div>
    </div>
</nav>
