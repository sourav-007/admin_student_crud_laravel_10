<div class="container">
    <div class="row g-3 g-md-0">
        <div class="col-12 col-md-4">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>
        <div class="mt-3 mt-md-0 col-md-8">
            <div class="p-4 bg-white shadow-sm rounded-3">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
