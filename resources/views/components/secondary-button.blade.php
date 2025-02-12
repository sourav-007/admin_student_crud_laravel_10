
<button {{ $attributes->merge(['type' => 'button', 'class' => 'd-inline-flex align-items-center px-4 py-2 bg-white border border-light rounded-3 fw-semibold fs-6 text-uppercase shadow-sm disabled:opacity-25 sec', 
        'style' => 'color: #4B5563; letter-spacing: 0.1em; outline: none; box-shadow: 0 0 0 2px #3b82f6;']) }}>
    {{ $slot }}
</button>

<style>
    .sec {
        transition: all 0.15s ease-in-out;
    }
    .sec:hover{
        background-color: #F9FAFB !important;
    }
</style>
