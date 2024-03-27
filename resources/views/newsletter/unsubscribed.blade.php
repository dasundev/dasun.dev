@extends('layouts.newsletter')

@section('title', 'Unsubscribed')

@section('content')
    <section class="bg-white dark:bg-black">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="flex justify-center mb-8">
                <svg width="100px" height="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-green-500">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>
            </div>
            <p class="mb-4 text-3xl tracking-tight font-bold text-center text-gray-900 md:text-4xl dark:text-white">{{ __("Unsubscribed") }}</p>
            <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">{{ __("We're sorry to hear that, if you change your mind in the future, you can subscribe again!") }}</p>
        </div>
    </section>
@endsection
