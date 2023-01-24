@props(['active'])

@php
    $classes = $active ?? false ? 'space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700 hover:bg-white bg-white font-semibold' : 'space-x-2 rounded-md md:rounded-full lg:rounded-full md:inline-flex lg:inline-flex items-center px-1 md:px-4 lg:px-4 text-xs text-center md:text-md lg:text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700 hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
