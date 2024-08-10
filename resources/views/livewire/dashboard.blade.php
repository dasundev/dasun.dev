<?php

use App\Repositories\Contracts\LicenseRepository;

use function Livewire\Volt\state;

state([
    'licenses' => app(LicenseRepository::class)->getLicenses()
])
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-5">
    <div class="max-w-7xl mx-auto px-0 lg:px-5">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border border-gray-100 dark:border-gray-900">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-black border border-gray-100 dark:border-gray-900">
                    {{ __('Licenses') }}
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">{{ __('All purchased licenses appear in the table below.') }}</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('License name') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Key') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Applicable package(s)') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Purchase date') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('Updates until') }}
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($licenses as $license)
                    <tr class="bg-white border-b border-gray-100 dark:bg-black dark:border-gray-900">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-100">
                            {{ $license->name }}
                        </th>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full dark:bg-gray-800 whitespace-nowrap">{{ $license->key }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $license->purchasable->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Illuminate\Support\Carbon::parse($license->created_at)->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Illuminate\Support\Carbon::parse($license->expires_at)->format('M d, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr class="text-gray-500">
                        <td colspan="4" class="text-center py-3">No licenses.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
