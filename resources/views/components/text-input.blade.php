@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-primary-700 dark:focus:border-primary-700 focus:ring-primary-700 dark:focus:ring-primary-700 rounded-md shadow-sm']) !!}>
