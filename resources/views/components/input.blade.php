{{-- @props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}> --}}


@props(['disabled' => false,])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control shadow-sm']) !!}
    style="border-color: #ced4da;" 
    onfocus="this.style.borderColor = '#087990';" 
    onblur="this.style.borderColor = '#ced4da';"
>    
    
