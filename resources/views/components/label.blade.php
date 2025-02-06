{{-- @props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label> --}}

@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label d-block fw-normal text-secondary', 'style' => 'font-size:0.85rem; line-height: 1.25rem;']) }}>
    {{ $value ?? $slot }}
</label>
