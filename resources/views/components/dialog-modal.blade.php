
@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="p-4">
        <div class="fs-5 fw-medium text-body">
            {{ $title }}
        </div>

        <div class="mt-3 small text-muted">
            {{ $content }}
        </div>
    </div>

    <div class="d-flex justify-content-end px-4 py-3 bg-light text-end">
        {{ $footer }}
    </div>
</x-modal>
