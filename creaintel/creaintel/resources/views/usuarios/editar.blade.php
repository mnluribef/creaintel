@extends('adminlte::page')

@section('title', 'CreaIntel | Usuarios')

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>Editar preinscripción</h1> -->
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa-solid fa-file-signature"></i>
                                Editar Usuario
                            </h3>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-body p-4">

                            {!! Form::model($user, [
                                'method' => 'PATCH',
                                'route' => ['usuarios.update', $user->id, 'class' => 'needs-validation', 'novalidate'],
                            ]) !!}
                            <fieldset class="border border-primary border-2 p-3 rounded">

                                <div class="form-row">
                                    <div class="col">
                                        <label for="Ci" class="mt-4 required">Cédula</label>
                                        <input type="tel" class="form-control col-md-12" id="Ci" name="Ci"
                                            placeholder="Ej: 25617543" autocomplete="off" minlength="7" maxlength="8"
                                            tabindex="1" onkeypress="return numeros(event);" value="{{ $user->Ci }}"
                                            required>

                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="name" class="mt-4 required">Primer Nombre</label>
                                        <input type="text" class="form-control col-md-12" id="name" name="name"
                                            placeholder="Ej: Alejandro" maxlength="20" tabindex="2"
                                            onkeypress="return txt(event);" value="{{ $user->name }}" required>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="apellido" class="mt-4 required">Primer Apellido</label>
                                        <input type="text" class="form-control col-md-12" id="apellido" name="apellido"
                                            placeholder="Ej: González" maxlength="20" tabindex="3"
                                            onkeypress="return txt(event);" value="{{ $user->apellido }}" required>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="email" class="mt-4 required">Correo</label>
                                        <input type="email" class="form-control col-md-12" id="email" name="email"
                                            placeholder="Ej: ejemplo@gmail.com" maxlength="30" tabindex="4"
                                            value="{{ $user->email }}" required>

                                        <div class="invalid-feedback">
                                            Por favor escriba un correo válido.
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="password" class="mt-4 required">Contraseña</label>
                                        <input type="password" class="form-control col-md-12" id="password" name="password"
                                            maxlength="20" tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="confirm-password" class="mt-4 required">Confirmar Contraseña</label>
                                        <input type="password" class="form-control col-md-12" id="confirm-password"
                                            name="confirm-password" maxlength="20" tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group mt-4">
                                        <label for="">Roles</label>
                                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control']) !!}
                                        <div class="invalid-feedback">
                                            Por favor escoja una opción.
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer mt-4">
                            <button type="submit" class="btn btn-primary mr-3" tabindex="6"
                                onclick="validarGuardar();">Guardar</button>
                            <a class="btn btn-secondary" tabindex="5" onclick="validarCancelar();">Cancelar</a>
                        </div>

                    </div>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        </div>
        </div>

        @include('modales/modalcancelar')
        @include('modales/modalguardar')
    @endsection

    @section('css')
        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


        <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

    @stop

    @section('js')
        <script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>


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
    @stop
