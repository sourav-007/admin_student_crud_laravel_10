
@props(['active'])

@php
$classes = ($active ?? false)
            ? 'd-block w-100 ps-3 pe-4 py-2 border-start-4 border-primary text-start text-base fw-medium text-primary bg-light focus:outline-none focus:text-dark focus:bg-light focus:border-primary transition duration-150 ease-in-out'
            : 'd-block w-100 ps-3 pe-4 py-2 border-start-4 border-transparent text-start text-base fw-medium text-muted hover:text-dark hover:bg-light hover:border-secondary focus:outline-none focus:text-dark focus:bg-light focus:border-secondary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
