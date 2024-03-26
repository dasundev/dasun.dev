@props([
    'type' => 'button',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'font-normal text-white bg-primary-700 px-3 py-2 hover:bg-primary-800 transition-colors duration-300']) }}>
    {{ $slot }}
</button>
