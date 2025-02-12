
<a {{ $attributes->merge(['class' => 'd-block w-100 px-3 py-2 text-start text-decoration-none text-dark fw-light bg-transparent border-0 bg-light focus-shadow-none transition-all dl-hover', 'style' => 'font-size:0.85rem;']) }}>
    {{ $slot }}
</a>
<style>
    .dl-hover:hover{
        background: #e9ecef !important;
        border-radius: none;
    }
</style>