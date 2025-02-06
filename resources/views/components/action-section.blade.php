{{-- <div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
            {{ $content }}
        </div>
    </div>
</div> --}}


{{-- <div {{ $attributes->merge(['class' => 'row row-cols-1 row-cols-md-3 g-3']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-3 mt-md-0 col-md-8">
        <div class="p-4 bg-white shadow-sm rounded-3">
            {{ $content }}
        </div>
    </div>
</div> --}}

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
