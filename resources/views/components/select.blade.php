@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select rounded-3 shadow-sm']) !!}
    style="border-color: #ced4da;" 
    onfocus="this.style.borderColor = '#087990';" 
    onblur="this.style.borderColor = '#ced4da';">
    {{ $slot }}
</select>