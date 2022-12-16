@props(['active'])

@php
    $classes = $active ?? false ? 'rounded-full inline-flex items-center px-4 text-md font-medium leading-5 text-cyan-900 focus:outline-none transition duration-150 ease-in-out hover:text-cyan-700  hover:bg-white bg-white font-semibold' : 'rounded-full px-5 inline-flex items-center px-4 text-md font-semibold leading-5 text-cyan-900 hover:text-cyan-700  hover:bg-white focus:outline-none focus:text-cyan-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
