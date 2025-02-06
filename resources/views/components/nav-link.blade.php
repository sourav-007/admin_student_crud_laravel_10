{{-- @props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> --}}


@props(['active'])

@php
$classes = ($active ?? false)
            ? 'd-inline-flex align-items-center px-1 pt-1 border-bottom-2 border-primary text-sm font-medium leading-5 text-dark focus:outline-none focus:border-primary transition duration-150 ease-in-out'
            : 'd-inline-flex align-items-center px-1 pt-1 border-bottom-2 border-transparent text-sm font-medium leading-5 text-muted hover:text-dark hover:border-secondary focus:outline-none focus:text-dark focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
