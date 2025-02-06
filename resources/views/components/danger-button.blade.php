{{-- <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}


<button {{ $attributes->merge(['type' => 'button', 'class' => 'd-inline-flex align-items-center justify-content-center px-2 py-2 bg-danger border-0 rounded-3 text-white fw-semibold fs-6 text-uppercase den']) }}>
    {{ $slot }}
</button>

<style>
    .den {
        transition: all 0.15s ease-in-out !important;
    }
    .den:focus {
        outline: none !important;
        box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.5) !important;
    }
    .den:hover {
        background-color: #e35d6a !important; 
    }
    .den:active {
        background-color: #c82333 !important;
    }
    .sec:hover{
        background-color: #F9FAFB !important;
    }
</style>
