<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <div class="text-center">
                <h2>CreaIntel</h2>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row align-items-center">


                <x-jet-label for="ci" value="{{ __('Cédula') }}" />
                <x-jet-input id="ci" type="number" placeholder="Ej: 25617543" name="ci" :value="old('ci')" onkeypress="return numbers(event);" required autofocus autocomplete="ci" />

                <div class="input-group">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" type="text" placeholder="Ej: Pedro" name="name" :value="old('name')" required autofocus autocomplete="name" />

                    <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                    <x-jet-input id="apellido" class="block mt-1" type="text" placeholder="Ej: Pérez" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
                </div>

                <div class="input-group">

                    <x-jet-label for="email" value="{{ __('Correo') }}" />
                    <x-jet-input id="email" class="block mt-1" type="email" placeholder="Ej: ejemplo@gmail.com" name="email" :value="old('email')" required />

                    <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                    <x-jet-input id="telefono" class="block mt-1" type="number" name="telefono" placeholder="Ej: 04124562154" :value="old('telefono')" onkeypress="return numbers(event);" required autofocus autocomplete="telefono" />
                </div>

                <div class="col-auto">
                    <x-jet-label for="password" value="{{ __('Password') }}" />


                    <x-jet-input id="password" class="block mt-1" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="col-auto">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />

                    <x-jet-input id="password_confirmation" class="block mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
                    <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
        </form>


        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    </x-jet-authentication-card>
</x-guest-layout>