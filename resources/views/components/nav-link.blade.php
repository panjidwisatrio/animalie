@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 border-cyan-900 lg:text-md font-medium leading-5 text-cyan-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent lg:text-md font-medium leading-5 text-cyan-900 hover:text-cyan-700 hover:border-cyan-700 focus:outline-none focus:text-cyan-700 focus:border-cyan-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
