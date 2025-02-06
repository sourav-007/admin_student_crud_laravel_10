{{-- <a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out']) }}>{{ $slot }}</a> --}}

<a {{ $attributes->merge(['class' => 'd-block w-100 px-3 py-2 text-start text-decoration-none text-dark fw-light bg-transparent border-0 bg-light focus-shadow-none transition-all dl-hover', 'style' => 'font-size:0.85rem;']) }}>
    {{ $slot }}
</a>
<style>
    .dl-hover:hover{
        background: #e9ecef !important;
        border-radius: none;
    }
</style>