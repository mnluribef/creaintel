<x-guest-layout>

    <!--     <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrarse</a>
    </div> -->

    <x-jet-authentication-card>
        <div class="d-flex flex-row bd-highlight mb-3">
            <x-slot name="logo">
                <x-jet-authentication-card-logo />

                <div class="text-center">
                    <h2>CreaIntel</h2>
                </div>

            </x-slot>
        </div>
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @csrf

            <div>
                <x-jet-label class="required" for="ci" value="{{ __('Cédula') }}" />
                <x-jet-input id="ci" class="block mt-1 w-full" type="tel" minlength="7" maxlength="8" name="ci" :value="old('ci')" onkeypress="return numeros(event);" required autofocus />
                <div class="invalid-feedback">
                    Por favor rellene este campo.
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label class="required" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" onKeyPress="if(this.value.length==15) return false;" name="password" required autocomplete="current-password" />
                <div class="invalid-feedback">
                    Por favor rellene este campo.
                </div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif



                <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
                <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

                <x-jet-button class="ml-4">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
            <div class="mt-4 text-center text-sm">
                ¿No tienes cuenta?
                <a href=" {{ route('register') }}" class="text-sm text-gray-700 underline">Registrarse</a>
            </div>

        </form>
        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


        <script>
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>
    </x-jet-authentication-card>
</x-guest-layout>