<div class="col-md d-flex justify-content-between flex-col align-items-center p-3">
    <div class="flex-fill px-3 px-sm-0">
        <h3 class="h5 fw-medium text-dark mb-1">{{ $title }}</h3>
        <p class="text-muted fs-6 mb-0">
            {{ $description }}
        </p>
    </div>

    @if (!empty($aside))
        <div class="px-3 text-end">
            {{ $aside }}
        </div>
    @endif
</div>
