{{-- @props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div> --}}


@props(['submit'])

{{-- <div {{ $attributes->merge(['class' => 'row row-cols-1 row-cols-md-3 gap-md-3 mt-4', 'style' => 'border:2px solid green;']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-6 mt-md-0 col-md-8" style="border:2px solid red;">
        <form wire:submit="{{ $submit }}">
            <div class="p-4 bg-white shadow {{ isset($actions) ? 'rounded-top' : 'rounded' }}">
                <div class="row g-3">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="d-flex justify-content-end px-4 py-3 bg-light text-end rounded-bottom shadow">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div> --}}

{{-- <div class="container">
    <div class="row gap-3 gap-md-6">
        <div class="col-12 col-md-4">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>
        <div class="mt-6 mt-md-0 col-md-8" style="border:2px solid red;">
            <form wire:submit="{{ $submit }}">
                <div class="p-4 bg-white shadow {{ isset($actions) ? 'rounded-top' : 'rounded' }}">
                    <div class="row g-3">
                        {{ $form }}
                    </div>
                </div>
    
                @if (isset($actions))
                    <div class="d-flex justify-content-end px-4 py-3 bg-light text-end rounded-bottom shadow">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div> --}}

<div {{ $attributes->merge(['class' => 'container']) }}>
    <div class="row g-3 g-md-0 mt-1" style="border:2px dotted green;">
        <div class="col-12 col-md-4">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>

        <div class="col-12 col-md-8 border border-danger p-0 rounded"> 
            <form wire:submit="{{ $submit }}">
                <div class="p-4 bg-white shadow {{ isset($actions) ? 'rounded-top' : 'rounded' }}">
                    <div class="row g-3">
                        {{ $form }}
                    </div>
                </div>
    
                @if (isset($actions))
                    <div class="d-flex justify-content-end px-4 py-3 bg-light text-end rounded-bottom shadow">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
