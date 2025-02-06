{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @if ($errors->has('name'))
                    <ul class="text-red-600 text-sm list-disc list-inside">
                        @foreach ($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                @if ($errors->has('email'))
                    <ul class="text-red-600 text-sm list-disc list-inside">
                        @foreach ($errors->get('email') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                @if ($errors->has('password'))
                    <ul class="text-red-600 text-sm list-disc list-inside">
                        @foreach ($errors->get('password') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                @if ($errors->has('password_confirmation'))
                    <ul class="text-red-600 text-sm list-disc list-inside">
                        @foreach ($errors->get('password_confirmation') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <x-authentication-card>
    
        <div class="d-flex justify-content-center mb-4">
            <span class="h3" style="color:#032830;">Admin CRUD System</span>
        </div>

        <form method="POST" action="{{ route('register') }}" class="form-group needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}"/>
                <div class="invalid-feedback">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <li class="ms-1">{{ $error }}</li>
                        @endforeach
                    @else
                        {{ __('Name is required!') }} 
                    @endif
                </div>
                
            </div>

            <div class="mb-3">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" 
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"/>
                <div class="invalid-feedback">
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $error)
                            <li class="ms-1">{{ $error }}</li>
                        @endforeach
                    @else
                        {{ __('Email is required!') }}
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="new-password" 
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"/>
                <div class="invalid-feedback">
                    @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $error)
                            <li class="ms-1">{{ $error }}</li>
                        @endforeach
                    @else
                        {{ __('Password is required!') }}
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                    class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"/>
                <div class="invalid-feedback">
                    @if ($errors->has('password_confirmation'))
                        @foreach ($errors->get('password_confirmation') as $error)
                            <li class="ms-1">{{ $error }}</li>
                        @endforeach
                    @else
                        {{ __('Confirm Password is required!') }}
                    @endif
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-3">
                    <x-label for="terms">
                        <div class="form-check">
                            <x-checkbox name="terms" id="terms" class="form-check-input" required />
                            <label class="form-check-label ms-2" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-decoration-none">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-decoration-none">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <a class="text-decoration-none small text-secondary" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button>
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <script>
            (function () {
                'use strict';
        
                const forms = document.querySelectorAll('.needs-validation');
        
                Array.from(forms).forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
        
                        form.classList.add('was-validated');
                    }, false);
                });
            })();
        </script>
        
    </x-authentication-card>
</x-guest-layout>
