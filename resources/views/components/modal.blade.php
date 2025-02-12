
@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));

$maxWidth = [
    'sm' => 'max-width: 384px;',
    'md' => 'max-width: 448px;',
    'lg' => 'max-width: 512px;',
    'xl' => 'max-width: 576px;',
    'xxl' => 'max-width: 672px;',
][$maxWidth ?? 'xxl'];
@endphp

<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    id="{{ $id }}"
    class="jetstream-modal position-fixed top-0 start-0 w-100 h-100 overflow-auto z-index-50"
    style="display: none;"
>
    <div x-show="show" class="position-fixed top-0 start-0 w-100 h-100 transition-all transform ease-in-out duration-300" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-secondary opacity-75" style="background-color: #6b7280 !important;"></div>
    </div>

    <div x-show="show" class="mb-6 mt-5 bg-light rounded-3 position-relative top-0 start-50 translate-middle-x 
        overflow-hidden shadow-lg transition-all transform ease-in-out duration-300 sm:w-100 sm:mx-auto"
                    x-trap.inert.noscroll="show"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-4" style="{{ $maxWidth }}">
        {{ $slot }}
    </div>
</div>
