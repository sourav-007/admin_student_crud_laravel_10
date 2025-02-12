
@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => '', 'style' => 'font-size:0.875rem; line-height:1.25rem; color:red;']) }}>{{ $message }}</p>
@enderror
