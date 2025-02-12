
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
