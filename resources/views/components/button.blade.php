
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn text-uppercase font-weight-bold text-xs px-2 py-1 rounded-3', 'style' => 'background-color:#032830; color:white;']) }}>
    {{ $slot }}
</button>
