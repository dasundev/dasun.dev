@props([
    'type' => 'button',
])

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => 'font-medium text-white bg-primary-700 px-3 py-2']) }}>
    {{ $slot }}
</button>
