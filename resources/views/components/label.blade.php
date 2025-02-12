
@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label d-block fw-normal text-secondary', 'style' => 'font-size:0.85rem; line-height: 1.25rem;']) }}>
    {{ $value ?? $slot }}
</label>
