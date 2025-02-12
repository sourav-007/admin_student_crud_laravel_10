
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'd-inline-flex align-items-center px-1 pt-1 border-bottom-2 border-primary text-sm font-medium leading-5 text-dark focus:outline-none focus:border-primary transition duration-150 ease-in-out'
            : 'd-inline-flex align-items-center px-1 pt-1 border-bottom-2 border-transparent text-sm font-medium leading-5 text-muted hover:text-dark hover:border-secondary focus:outline-none focus:text-dark focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
