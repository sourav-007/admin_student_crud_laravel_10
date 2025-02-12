<div {{ $attributes->merge(['class' => 'container']) }}>
    <div class="row g-3 g-md-0 mt-1">
        <div class="col-12 col-md-4">
            <x-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot>
            </x-section-title>
        </div>

        <div class="col-12 col-md-8 p-0 rounded"> 
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
