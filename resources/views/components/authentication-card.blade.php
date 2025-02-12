<div class="d-flex flex-column justify-content-center align-items-center min-vh-100 bg-light">
    {{-- <div>
        {{ $logo }}
    </div> --}}

    <div class="w-100 rounded-3 shadow-sm" style="max-width: 28rem; margin-top: 1.5rem;">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>