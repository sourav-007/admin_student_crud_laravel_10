<x-guest-layout>
    <x-authentication-card>

        <div class="d-flex justify-content-center mb-4">
            <span class="h3" style="color:#032830;">Admin CRUD System</span>
        </div>

        <x-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 text-success fw-medium small">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="form-group needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"/>
                <div class="invalid-feedback">        
                    @if (!old('email'))
                        {{ __('Email is required!') }}
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" 
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"/>
                <div class="invalid-feedback">        
                    {{ __('Password is required!') }}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                    <label for="remember_me" class="form-check-label small text-muted">
                        {{ __('Remember me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none small text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a class="text-decoration-none small text-secondary" href="{{ route('register') }}">
                    {{ __("Don't have account?") }}
                </a>

                <x-button>
                    {{ __('Log in') }}
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
