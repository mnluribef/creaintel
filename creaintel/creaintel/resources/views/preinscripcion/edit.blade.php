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
                                Editar Preinscripción
                            </h3>
                        </div>

                        <div class="card-body p-4">
                            <fieldset class="border border-primary border-2 p-3 rounded">
                                <form action="/preinscripcion/{{ $preinscripcion->id }}" method="POST"
                                    class="ml-3 needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <h4 class="text-center text-primary">Planilla de Preinscripción</h4>

                                    <h5 class="text-primary">Datos Personales</h5>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="estudiante_ci" class="mt-4 required">Líder del Equipo</label>
                                            <select name="estudiante_ci" id="estudiante_ci" class="form-select col-md-9"
                                                required style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($estudiantes as $estudiante)
                                                    @if ($estudiante->lider_id == '1')
                                                        <option value="{{ $estudiante['estudiante_ci'] }}"
                                                            {{ $estudiante->estudiante_ci == $preinscripcion->estudiante_ci ? 'selected' : '' }}>
                                                            {{ $estudiante['estudiante_ci'] }} {{ $estudiante['nombre'] }}
                                                            {{ $estudiante['apellido'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>

                                        </div>
                                        <div class="col">
                                            <label for="estudiante2_ci" class="mt-4 ">Estudiante 2</label>
                                            <select name="estudiante2_ci" id="estudiante2_ci" class="form-select col-md-9"
                                                style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($estudiantes as $estudiante)
                                                    @if ($estudiante->lider_id == '2')
                                                        <option value="{{ $estudiante['estudiante_ci'] }}"
                                                            {{ $estudiante->estudiante_ci == $preinscripcion->estudiante2_ci ? 'selected' : '' }}>
                                                            {{ $estudiante['estudiante_ci'] }} {{ $estudiante['nombre'] }}
                                                            {{ $estudiante['apellido'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="estudiante3_ci" class="mt-4 ">Estudiante 3</label>
                                            <select name="estudiante3_ci" id="estudiante3_ci" class="form-select col-md-9"
                                                style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($estudiantes as $estudiante)
                                                    @if ($estudiante->lider_id == '2')
                                                        <option value="{{ $estudiante['estudiante_ci'] }}"
                                                            {{ $estudiante->estudiante_ci == $preinscripcion->estudiante3_ci ? 'selected' : '' }}>
                                                            {{ $estudiante['estudiante_ci'] }} {{ $estudiante['nombre'] }}
                                                            {{ $estudiante['apellido'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="sede_id" class="mt-4 required">Sede</label>
                                            <select required name="sede_id" id="sede_id" class="form-select col-md-9"
                                                style="display: flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($sedes as $sede)
                                                    <option value="{{ $sede['id'] }}"
                                                        {{ $sede->id == $preinscripcion->sede_id ? 'selected' : '' }}>
                                                        {{ $sede['nombre_Sede'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>



                                        <div class="col">
                                            <label for="PNF_id" class="mt-4 required">PNF</label>
                                            <select required name=" PNF_id" id="PNF_id" class="form-select col-md-9"
                                                style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($pnfs as $pnf)
                                                    <option value="{{ $pnf['id'] }}"
                                                        {{ $pnf->id == $preinscripcion->PNF_id ? 'selected' : '' }}>
                                                        {{ $pnf['nombre_PNF'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="tipo_estudio_id" class="mt-4 required">Tipo de Estudio</label>
                                            <select required name=" tipo_estudio_id" id="tipo_estudio_id"
                                                class="form-select col-md-9">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($tipo_estudios as $tipo_estudio)
                                                    <option value="{{ $tipo_estudio['id'] }}"
                                                        {{ $tipo_estudio->id == $preinscripcion->tipo_estudio_id ? 'selected' : '' }}>
                                                        {{ $tipo_estudio['nombre_Tipo_Estudio'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="turno_id" class="mt-4 required">Turno</label>
                                            <select required name=" turno_id" id="turno_id" class="form-select col-md-9">
                                                <option value="">-- Escoja una opción --</option>

                                                @foreach ($turnos as $turno)
                                                    <option value="{{ $turno['id'] }}"
                                                        {{ $turno->id == $preinscripcion->turno_id ? 'selected' : '' }}>
                                                        {{ $turno['nombre_Turno'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="trayecto_id" class="mt-4 required">Trayecto</label>
                                            <select required name=" trayecto_id" id="trayecto_id"
                                                class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($trayectos as $trayecto)
                                                    <option value="{{ $trayecto['id'] }}"
                                                        {{ $trayecto->id == $preinscripcion->trayecto_id ? 'selected' : '' }}>
                                                        {{ $trayecto['nombre_Trayecto'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="seccion_id" class="mt-4 required">Sección</label>
                                            <select required name=" seccion_id" id="seccion_id"
                                                class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($seccion as $seccion)
                                                    <option value="{{ $seccion['id'] }}"
                                                        {{ $seccion->id == $preinscripcion->seccion_id ? 'selected' : '' }}>
                                                        {{ $seccion['nombre_Seccion'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-primary mt-4">Datos de la Comunidad</h5>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="estado_id" class="mt-4 required">Estado</label>
                                            <select required name=" estado_id" id="estado_id"
                                                class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($estado as $estado)
                                                    <option value="{{ $estado['id'] }}"
                                                        {{ $estado->id == $preinscripcion->estado_id ? 'selected' : '' }}>
                                                        {{ $estado['nombre_Estado'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="municipio_id" class="mt-4 required">Municipio</label>
                                            <select required name=" municipio_id" id="municipio_id"
                                                class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($municipio as $municipio)
                                                    <option value="{{ $municipio['id'] }}"
                                                        {{ $municipio->id == $preinscripcion->municipio_id ? 'selected' : '' }}>
                                                        {{ $municipio['nombre_Municipio'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="parroquia_id" class="mt-4 required">Parroquia</label>
                                            <select required name=" parroquia_id" id="parroquia_id"
                                                class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($parroquias as $parroquia)
                                                    <option value="{{ $parroquia['id'] }}"
                                                        {{ $parroquia->id == $preinscripcion->parroquia_id ? 'selected' : '' }}>
                                                        {{ $parroquia['nombre_Parroquia'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="sector_id" class="mt-4 required">Sector</label>
                                            <select required name=" sector_id" id="sector_id"
                                                class="form-select col-md-9" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($sectores as $sector)
                                                    <option value="{{ $sector['id'] }}"
                                                        {{ $sector->id == $preinscripcion->sector_id ? 'selected' : '' }}>
                                                        {{ $sector['nombre_Sector'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="asesor_ci" class="mt-4 required">Docente Asesor</label>
                                            <select required name="asesor_ci" id="asesor_ci" class="form-select col-md-9"
                                                style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($docente as $docente1)
                                                    <option value="{{ $docente1['docente_ci'] }}"
                                                        {{ $docente1->docente_ci == $preinscripcion->asesor_ci ? 'selected' : '' }}>
                                                        {{ $docente1['docente_ci'] }} {{ $docente1['nombre'] }}
                                                        {{ $docente1['apellido'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="tutor_ci" class="mt-4">Tutor</label>
                                            <select name="tutor_ci" id="tutor_ci" class="form-select col-md-9"
                                                style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($docente as $docente2)
                                                    <option value="{{ $docente2['docente_ci'] }}"
                                                        {{ $docente2->docente_ci == $preinscripcion->tutor_ci ? 'selected' : '' }}>
                                                        {{ $docente2['docente_ci'] }} {{ $docente2['nombre'] }}
                                                        {{ $docente2['apellido'] }}</option>
                                                @endforeach
                                            </select>




                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="lineainve_id" class="mt-4 required">Línea de Investigación</label>
                                            <select required name=" lineainve_id" id="lineainve_id"
                                                class="form-select col-md-6" style="display:flex">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($linea_inves as $lineainve)
                                                    <option value="{{ $lineainve['id'] }}"
                                                        {{ $lineainve->id == $preinscripcion->lineaInves_id ? 'selected' : '' }}>
                                                        {{ $lineainve['descripcion'] }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Por favor escoja una opción.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="titulo_Tentativo" class="mt-4 required">Título del Proyecto </label>
                                        <textarea class=" form-control col-md-11" id="titulo_Tentativo" name="titulo_Tentativo" maxlength="400"
                                            rows="2" placeholder="Ej: Componente de software para el control de suministros de la UPT Aragua" required>{{ old('titulo_tentativo', $preinscripcion->titulo_tentativo) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="objetivo" class="mt-4 required"">Objetivo</label>
                                        <textarea class=" form-control col-md-11" id="objetivo" name="objetivo" maxlength="400" rows="2"
                                            placeholder="Ej: Objetivo principal del proyecto, comenzar con verbo en infinitivo" required>{{ old('objetivo', $preinscripcion->objetivo) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alcance" class="mt-4 required">Alcance</label>
                                        <textarea class=" form-control col-md-11" id="alcance" name="alcance" maxlength="800" rows="3"
                                            placeholder="Ej: La investigación abarcará las siguientes áreas..." required>{{ old('alcance', $preinscripcion->alcance) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="limitacion" class="mt-4 required">Limitaciones</label>
                                        <textarea class=" form-control col-md-11" id="limitacion" name="limitacion" maxlength="400" rows="3"
                                            placeholder="Ej: Inestabilidad del servicio eléctrico del país. Problemas con el servicio de internet." required>{{ old('limitacion', $preinscripcion->limitacion) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label for="aportes_comu" class="mt-4 required">Aportes a la Comunidad, Personas
                                            Beneficiadas</label>
                                        <textarea class=" form-control col-md-11" id="aportes_comu" name="aportes_comu" maxlength="400" rows="3"
                                            placeholder="Ej: Serán beneficiados directamente los estudiantes de la escuela y el personal del Departamento de Recursos Humanos, debido a que..."
                                            required>{{ old('aportes_comu', $preinscripcion->aportes_comu) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="acciones_integra" class="mt-4 required">Acciones de Integración con la
                                            Comunidad</label>
                                        <textarea class=" form-control col-md-11" id="acciones_integra" name="acciones_integra" maxlength="400"
                                            rows="3"
                                            placeholder="Ej: Reuniones con el Jefe del Departamento y el Tutor del Proyecto sobre la funcionalidad y requerimientos de la aplicación."
                                            required>{{ old('acciones_integra', $preinscripcion->acciones_integra) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label for="plan_patria" class="mt-4 required">Vinculación de la investigación con
                                            el Plan de la Patria 2013-2019</label>
                                        <textarea class=" form-control col-md-11" id="plan_patria" name="plan_patria" maxlength="400" rows="3"
                                            placeholder="Ej: 1.6. Desarrollar las capacidades científico-tecnológicas que hagan viable, potencien y blinden la protección y atención de las necesidades del pueblo y el desarrollo del país potencia."
                                            required>{{ old('plan_patria', $preinscripcion->plan_patria) }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                        </div>


                        <!--  -->


                    </div>
                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-primary mr-3" tabindex="7"
                            onclick="validarGuardar();">Guardar</button>
                        <a class="btn btn-secondary" tabindex="8" onclick="validarCancelar();">Cancelar</a>
                    </div>
                    </fieldset>
                    </form>

                    @include('modales/modalcancelar')
                    @include('modales/modalguardar')

                @stop

                @section('css')
                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">



                    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                @stop

                @section('js')

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
