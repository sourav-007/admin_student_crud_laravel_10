{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}


{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark fw-semibold text-uppercase px-4 py-2']) }}>
    {{ $slot }}
</button> --}}

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn text-uppercase font-weight-bold text-xs px-2 py-1 rounded-3', 'style' => 'background-color:#032830; color:white;']) }}>
    {{ $slot }}
</button>
