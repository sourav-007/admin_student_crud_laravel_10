{{-- <div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div> --}}


{{-- <div class="col-md-4 d-flex justify-content-between" style="border: 2px solid red;">
    <div class="px-4 px-sm-0">
        <h3 class="h5 fw-medium text-dark">{{ $title }}</h3>

        <p class="mt-1 text-muted fs-6">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 px-sm-0">
        {{ $aside ?? '' }}
    </div>
</div> --}}


<div class="col-md d-flex justify-content-between flex-col align-items-center border border-danger p-3">
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
