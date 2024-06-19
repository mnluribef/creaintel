@extends('adminlte::page')

@section('title', 'CreaIntel | Editar')

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
                                <i class="fa-solid fa-solid fa-file-signature"></i>
                                Editar Estudiante
                            </h3>
                        </div>

                        <div class="card-body p-4">
                            <fieldset class="border border-primary border-2 p-3 rounded">
                                <form action="/estudiante/{{ $estudiante->estudiante_ci }}" method="POST"
                                    class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')

                                    <h4 class="text-center text-primary">Datos del Estudiante</h4>
                                    <div class="form-row">
                                        <div class="col">

                                            <label>Cédula</label>
                                            <input type="number" min="1" class="form-control col-md-2"
                                                id="ci_Estudiante" name="ci_Estudiante" placeholder="Ej: 25617543"
                                                maxlength="8" value="{{ $estudiante->estudiante_ci }}" disabled>
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="nombre" class="mt-4 required">Primer Nombre</label>
                                            <input type="text" class="form-control col-md-12" id="nombre"
                                                name="nombre" placeholder="Ej: Alejandro" maxlength="20" tabindex="2"
                                                value="{{ $estudiante->nombre }}" onkeypress="return txt(event);" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>

                                        <div class="col">
                                            <label for="apellido" class="mt-4 required">Primer Apellido</label>
                                            <input type="text" min="1" class="form-control col-md-12"
                                                id="apellido" name="apellido" placeholder="Ej: González" maxlength="20"
                                                tabindex="3" value="{{ $estudiante->apellido }}"
                                                onkeypress="return txt(event);" required>

                                            <div class="invalid-feedback">
                                                Por favor rellene este campo.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="correo" class="mt-4 required">Correo</label>
                                            <input type="email" class="form-control col-md-12" id="correo"
                                                name="correo" placeholder="Ej: ejemplo@gmail.com" maxlength="30"
                                                value="{{ $estudiante->correo }}" tabindex="4" required>

                                            <div class="invalid-feedback">
                                                Por favor rellene este campo.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="telefono" class="mt-4 required">Teléfono</label>
                                            <div label for="prefijo_id"></label>
                                                <select required name="prefijo_id" id="prefijo_id" tabindex="5"
                                                    class="form-select col-sm-3 col-md-4 d-inline-block">
                                                    <option value=""> -Prefijo- </option>
                                                    @foreach ($prefijos as $prefijo)
                                                        <option value="{{ $prefijo['id'] }}"
                                                            {{ $prefijo->id == $estudiante->prefijo_id ? 'selected' : '' }}>
                                                            {{ $prefijo['prefijo'] }}</option>
                                                    @endforeach
                                                </select>

                                                <input type="tel" class="form-control col-md-7 d-inline-block"
                                                    id="telefono" name="telefono" placeholder="Ej: 5432132" tabindex="6"
                                                    autocomplete="off" minlength="7" maxlength="7" required
                                                    value="{{ $estudiante->telefono }}" onkeypress="return numeros(event);">
                                                <div class="invalid-feedback">
                                                    Por favor rellene este campo.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="sede_id" class="mt-4 required">Sede</label>
                                            <select required name="sede_id" id="sede_id" tabindex="7"
                                                class="form-select col-md-12">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($sedes as $sede)
                                                    <option value="{{ $sede['id'] }}"
                                                        {{ $sede->id == $estudiante->sede_id ? 'selected' : '' }}>
                                                        {{ $sede['nombre_Sede'] }}</option>
                                                @endforeach
                                            </select>

                                            <div class="invalid-feedback">
                                                Por favor rellene este campo.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="lider_id" class="mt-4 required">¿Es Líder?</label>
                                            <select required name="lider_id" id="lider_id" tabindex="7"
                                                class="form-select col col-md-12">
                                                <option value="">-- Escoja una opción --</option>
                                                <option value="2">No</option>
                                                <option value="1">Sí</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                Por favor rellene este campo.
                                            </div>
                                        </div>
                                    </div>

                        </div>
                    </div>

                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-primary mr-3" tabindex="6"
                            onclick="validarGuardar();">Guardar</button>
                        <a class="btn btn-secondary" tabindex="5" onclick="validarCancelar();">Cancelar</a>
                    </div>
                    </fieldset>
                    </form>

                    @include('modales/modalcancelar')
                    @include('modales/modalguardar')

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

                @section('css')
                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">



                    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                @stop

                @section('js')

                    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

                @stop
