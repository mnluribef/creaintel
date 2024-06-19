<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <div class="text-center">
                <h2>CreaIntel</h2>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <div class="text-center">
            <h4>Registro</h4>
        </div>
        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
            @csrf

            <div class="input-group">
                <div class="col mt-2">
                    <x-jet-label class="required" for="ci" value="{{ __('Cédula') }}" />
                    <x-jet-input class="block mt-1 mr-3 " id="Ci" type="tel" placeholder="Ej: 25617543" name="Ci" :value="old('Ci')" minlength="7" maxlength="8" onkeypress="return numeros(event);" required autofocus autocomplete="ci" />
                    <div class="invalid-feedback">
                        Por favor rellene este campo.
                    </div>
                </div>
                <div class="col mt-2">
                    <x-jet-label class="required" for="name" value="{{ __('Name') }}" />
                    <x-jet-input class="block mt-1 mr-3" id="name" type="text" placeholder="Ej: Pedro" name="name" :value="old('name')" onkeypress="return txt(event);" required autofocus autocomplete="name" />
                    <div class="invalid-feedback">
                        Por favor rellene este campo.
                    </div>
                </div>


                <div class="col mt-2">
                    <x-jet-label class="required" for="apellido" value="{{ __('Apellido') }}" />
                    <x-jet-input class="block mt-1 mr-3" id="apellido" type="text" placeholder="Ej: Pérez" name="apellido" :value="old('apellido')" onkeypress="return txt(event);" required autofocus autocomplete="apellido" />
                    <div class="invalid-feedback">
                        Por favor rellene este campo.
                    </div>
                </div>
            </div>

            <div class="input-group">
                <div class="col mt-4">
                    <x-jet-label class="required" for="email" value="{{ __('Correo') }}" />
                    <x-jet-input class="block mt-1 mr-3" id="email" type="email" placeholder="Ej: ejemplo@gmail.com" name="email" :value="old('email')" required />
                    <div class="invalid-feedback">
                        Por favor rellene este campo.
                    </div>
                </div>


                <div class="col mt-4">
                    <x-jet-label class="required" for="password" value="{{ __('Password') }}" />
                    <x-jet-input class="block mt-1 mr-3" id="password" type="password" name="password" required aria-label="password" aria-describedby="password" autocomplete="off" />
                    <div class="invalid-feedback">
                        Por favor rellene este campo.
                    </div>
                </div>

                <div class="col mt-4">
                    <x-jet-label class="required" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input class="block mt-1 mr-3" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <div class="invalid-feedback">
                        Por favor rellene este campo.
                    </div>
                </div>
            </div>



            <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

            <!--                     Password seguro -->
            <div class="col-6 mt-4 mt-xxl-0 w-auto h-auto">

                <div class="alert px-4 py-3 mb-0 d-none" role="alert" data-mdb-color="warning" id="password-alert">
                    <ul class="list-unstyled mb-0">
                        <li class="requirements leng">
                            <i class="fas fa-check text-success me-2"></i>
                            <i class="fas fa-times text-danger me-3"></i>
                            Su contraseña debe tener 8 carácteres
                        </li>
                        <li class="requirements big-letter">
                            <i class="fas fa-check text-success me-2"></i>
                            <i class="fas fa-times text-danger me-3"></i>
                            Una letra mayúscula
                        </li>
                        <li class="requirements num">
                            <i class="fas fa-check text-success me-2"></i>
                            <i class="fas fa-times text-danger me-3"></i>
                            Al menos un número
                        </li>
                        <li class="requirements special-char">
                            <i class="fas fa-check text-success me-2"></i>
                            <i class="fas fa-times text-danger me-3"></i>
                            Al menos un carácter especial
                        </li>
                    </ul>
                </div>
                <!--                         Password seguro -->
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


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

<style>
    .wrong .fa-check {
        display: none;
    }

    .good .fa-times {
        display: none;
    }

    .valid-feedback,
    .invalid-feedback {
        margin-left: calc(2em + 0.25rem + 1.5rem + 1.5rem);
    }
</style>

<script>
    addEventListener("DOMContentLoaded", (event) => {
        const password = document.getElementById("password");
        const passwordAlert = document.getElementById("password-alert");
        const requirements = document.querySelectorAll(".requirements");
        let lengBoolean, bigLetterBoolean, numBoolean, specialCharBoolean;
        let leng = document.querySelector(".leng");
        let bigLetter = document.querySelector(".big-letter");
        let num = document.querySelector(".num");
        let specialChar = document.querySelector(".special-char");
        const specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
        const numbers = "0123456789";

        requirements.forEach((element) => element.classList.add("wrong"));

        password.addEventListener("focus", () => {
            passwordAlert.classList.remove("d-none");
            if (!password.classList.contains("is-valid")) {
                password.classList.add("is-invalid");
            }
        });

        password.addEventListener("input", () => {
            let value = password.value;
            if (value.length < 8) {
                lengBoolean = false;
            } else if (value.length > 7) {
                lengBoolean = true;
            }

            if (value.toLowerCase() == value) {
                bigLetterBoolean = false;
            } else {
                bigLetterBoolean = true;
            }

            numBoolean = false;
            for (let i = 0; i < value.length; i++) {
                for (let j = 0; j < numbers.length; j++) {
                    if (value[i] == numbers[j]) {
                        numBoolean = true;
                    }
                }
            }

            specialCharBoolean = false;
            for (let i = 0; i < value.length; i++) {
                for (let j = 0; j < specialChars.length; j++) {
                    if (value[i] == specialChars[j]) {
                        specialCharBoolean = true;
                    }
                }
            }

            if (lengBoolean == true && bigLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
                password.classList.remove("is-invalid");
                password.classList.add("is-valid");

                requirements.forEach((element) => {
                    element.classList.remove("wrong");
                    element.classList.add("good");
                });
                passwordAlert.classList.remove("alert-warning");
                passwordAlert.classList.add("alert-success");
            } else {
                password.classList.remove("is-valid");
                password.classList.add("is-invalid");

                passwordAlert.classList.add("alert-warning");
                passwordAlert.classList.remove("alert-success");

                if (lengBoolean == false) {
                    leng.classList.add("wrong");
                    leng.classList.remove("good");
                } else {
                    leng.classList.add("good");
                    leng.classList.remove("wrong");
                }

                if (bigLetterBoolean == false) {
                    bigLetter.classList.add("wrong");
                    bigLetter.classList.remove("good");
                } else {
                    bigLetter.classList.add("good");
                    bigLetter.classList.remove("wrong");
                }

                if (numBoolean == false) {
                    num.classList.add("wrong");
                    num.classList.remove("good");
                } else {
                    num.classList.add("good");
                    num.classList.remove("wrong");
                }

                if (specialCharBoolean == false) {
                    specialChar.classList.add("wrong");
                    specialChar.classList.remove("good");
                } else {
                    specialChar.classList.add("good");
                    specialChar.classList.remove("wrong");
                }
            }
        });

        password.addEventListener("blur", () => {
            passwordAlert.classList.add("d-none");
        });
    });
</script>

<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">

<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

<script src="{{ asset('js/validaciones.js') }}"></script>

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