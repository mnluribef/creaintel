@extends('adminlte::page')

@section('title', 'CreaIntel | Preinscripción')

@section('plugins.Select2', true)

@section('content_header')

    @include('usuarios/roltopmenu')
    <!-- <h1>Preinscripción</h1> -->
@stop


@section('content_top_nav_left')

    <div class="mt-2 ml-2">

        <b>Período:</b>
        {{ $fecha_apertura }}
        hasta
        {{ $fecha_cierre }}
    </div>

@endsection

@section('content')

    <!-- bs-stepper -->


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
                                Nueva Preinscripción de Proyecto
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default">


                                    <div class="card-body p-4">
                                        <fieldset class="border border-primary border-2 p-3 rounded">
                                            <form action="/preinscripcion" method="POST" class="ml-3 needs-validation"
                                                novalidate>
                                                @csrf
                                                <h4 class="text-center text-primary">Planilla de Preinscripción</h4>
                                                <!--       <h5 class="text-primary">Datos Personales</h5> -->

                                                <div class="bs-stepper">
                                                    <div class="bs-stepper-header" role="tablist">
                                                        <!-- your steps here -->
                                                        <div class="step" data-target="#logins-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="logins-part" id="logins-part-trigger">
                                                                <span class="bs-stepper-circle">1</span>
                                                                <span class="bs-stepper-label">Datos Personales</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#information-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="information-part"
                                                                id="information-part-trigger">
                                                                <span class="bs-stepper-circle">2</span>
                                                                <span class="bs-stepper-label">Datos de la Comunidad</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#planilla-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="planilla-part" id="planilla-part-trigger">
                                                                <span class="bs-stepper-circle">3</span>
                                                                <span class="bs-stepper-label">Planilla (1)</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#planilla2-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="planilla2-part" id="planilla2-part-trigger">
                                                                <span class="bs-stepper-circle">4</span>
                                                                <span class="bs-stepper-label">Planilla (2)</span>
                                                            </button>
                                                        </div>
                                                        <div class="line"></div>
                                                        <div class="step" data-target="#planilla3-part">
                                                            <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="planilla3-part" id="planilla3-part-trigger">
                                                                <span class="bs-stepper-circle">4</span>
                                                                <span class="bs-stepper-label">Planilla (3)</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="bs-stepper-content">
                                                        <!-- your steps content here -->
                                                        <div id="logins-part" class="content" role="tabpanel"
                                                            aria-labelledby="logins-part-trigger">

                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="estudiante_ci" class="mt-4 required">Líder
                                                                        del Equipo</label>
                                                                    <select name="estudiante_ci" id="estudiante_ci"
                                                                        class="form-select col-md-9" required>
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($estudiantes as $estudiante)
                                                                            @if ($estudiante->lider_id == '1')
                                                                                <option
                                                                                    value="{{ $estudiante['estudiante_ci'] }}">
                                                                                    {{ $estudiante['estudiante_ci'] }}
                                                                                    {{ $estudiante['nombre'] }}
                                                                                    {{ $estudiante['apellido'] }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="estudiante2_ci"
                                                                        class="mt-4 col-md-9">Estudiante 2</label>
                                                                    <select name="estudiante2_ci" id="estudiante2_ci"
                                                                        class="form-select col-md-9">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($estudiantes as $estudiante)
                                                                            @if ($estudiante->lider_id == '2')
                                                                                <option
                                                                                    value="{{ $estudiante['estudiante_ci'] }}">
                                                                                    {{ $estudiante['estudiante_ci'] }}
                                                                                    {{ $estudiante['nombre'] }}
                                                                                    {{ $estudiante['apellido'] }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="estudiante3_ci"
                                                                        class="mt-4 col-md-9">Estudiante 3</label>
                                                                    <select name="estudiante3_ci" id="estudiante3_ci"
                                                                        class="form-select col-md-9">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($estudiantes as $estudiante)
                                                                            @if ($estudiante->lider_id == '2')
                                                                                <option
                                                                                    value="{{ $estudiante['estudiante_ci'] }}">
                                                                                    {{ $estudiante['estudiante_ci'] }}
                                                                                    {{ $estudiante['nombre'] }}
                                                                                    {{ $estudiante['apellido'] }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="sede"
                                                                        class="mt-4 required">Sede</label>
                                                                    <select required name="sede" id="sede"
                                                                        class="form-select col-md-9"
                                                                        style="display: flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($sedes as $sede)
                                                                            <option value="{{ $sede['id'] }}">
                                                                                {{ $sede['nombre_Sede'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="PNF"
                                                                        class="mt-4 required">PNF</label>
                                                                    <div class="form-group mt-4">
                                                                        <select id="PNF" name="PNF"
                                                                            class="form-control">
                                                                        </select>
                                                                    </div>

                                                                    <!--                                                                 <select name="province" id="province">
            <option value="">Selecciona una provincia</option>
            @foreach ($sedes as $province)
    <option value="{{ $province->id }}">{{ $province->nombre_Sede }}</option>
    @endforeach
        </select>

        <select name="city" id="city">
            <option value="">Selecciona una ciudad</option>
        </select> -->



                                                                    <select required name="PNF_id" id="PNF_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($pnfs as $pnf)
                                                                            <option value="{{ $pnf['id'] }}">
                                                                                {{ $pnf['nombre_PNF'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="tipo_estudio_id"
                                                                        class="mt-4 required">Tipo de Estudio</label>
                                                                    <select required name=" tipo_estudio_id"
                                                                        id="tipo_estudio_id" class="form-select col-md-9">

                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($tipo_estudios as $tipo_Estudio)
                                                                            <option value="{{ $tipo_Estudio['id'] }}">
                                                                                {{ $tipo_Estudio['nombre_Tipo_Estudio'] }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="turno_id"
                                                                        class="mt-4 required">Turno</label>
                                                                    <select required name=" turno_id" id="turno_id"
                                                                        class="form-select col-md-9">

                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($turnos as $turno)
                                                                            <option value="{{ $turno['id'] }}">
                                                                                {{ $turno['nombre_Turno'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="trayecto_id"
                                                                        class="mt-4 required">Trayecto</label>
                                                                    <select required name="trayecto_id" id="trayecto_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($trayectos as $trayecto)
                                                                            <option value="{{ $trayecto['id'] }}">
                                                                                {{ $trayecto['nombre_Trayecto'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="seccion_id"
                                                                        class="mt-4 required">Sección</label>
                                                                    <select required name="seccion_id" id="seccion_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($seccion as $seccion)
                                                                            <option value="{{ $seccion['id'] }}">
                                                                                {{ $seccion['nombre_Seccion'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <button class="btn btn-primary mt-4"
                                                                onclick="stepper.next()">Siguiente<i
                                                                    class="fa-solid fa-arrow-right fa-fw"></i></button>
                                                        </div>
                                                        <div id="information-part" class="content" role="tabpanel"
                                                            aria-labelledby="information-part-trigger">

                                                            <!--                                          <h5 class="text-primary mt-4">Datos de la Comunidad</h5> -->
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="estado_id"
                                                                        class="mt-4 required">Estado</label>
                                                                    <select required name="estado_id" id="estado_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($estado as $estado)
                                                                            <option value="{{ $estado['id'] }}">
                                                                                {{ $estado['nombre_Estado'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="municipio_id"
                                                                        class="mt-4 required">Municipio</label>
                                                                    <select required name="municipio_id" id="municipio_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($municipio as $municipio)
                                                                            <option value="{{ $municipio['id'] }}">
                                                                                {{ $municipio['nombre_Municipio'] }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="parroquia_id"
                                                                        class="mt-4 required">Parroquia</label>
                                                                    <select required name="parroquia_id" id="parroquia_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($parroquia as $parroquia)
                                                                            <option value="{{ $parroquia['id'] }}">
                                                                                {{ $parroquia['nombre_Parroquia'] }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="sector_id"
                                                                        class="mt-4 required">Sector</label>
                                                                    <select required name="sector_id" id="sector_id"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($sector as $sector)
                                                                            <option value="{{ $sector['id'] }}">
                                                                                {{ $sector['nombre_Sector'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="asesor_ci" class="mt-4 required">Docente
                                                                        Asesor</label>
                                                                    <select required name="asesor_ci" id="asesor_ci"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($docente as $docente1)
                                                                            <option value="{{ $docente1['docente_ci'] }}">
                                                                                {{ $docente1['docente_ci'] }}
                                                                                {{ $docente1['nombre'] }}
                                                                                {{ $docente1['apellido'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <label for="tutor_ci" class="mt-4">Tutor</label>
                                                                    <select name="tutor_ci" id="tutor_ci"
                                                                        class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($docente as $docente2)
                                                                            <option value="{{ $docente2['docente_ci'] }}">
                                                                                {{ $docente2['docente_ci'] }}
                                                                                {{ $docente2['nombre'] }}
                                                                                {{ $docente2['apellido'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label for="lineainve_id" class="mt-4 required">Línea
                                                                        de Investigación</label>
                                                                    <select required name="lineainve_id" id="lineainve_id"
                                                                        class="form-select col-md-6" style="display:flex">
                                                                        <option value="">-- Escoja una opción --
                                                                        </option>
                                                                        @foreach ($linea_inve as $lineainve)
                                                                            <option value="{{ $lineainve['id'] }}">
                                                                                {{ $lineainve['descripcion'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Por favor escoja una opción.
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary mt-4 mr-3"
                                                                onclick="stepper.previous()">Atrás<i
                                                                    class="fa-solid fa-arrow-left fa-fw"></i></button>

                                                            <button class="btn btn-primary mt-4"
                                                                onclick="stepper.next()">Siguiente<i
                                                                    class="fa-solid fa-arrow-right fa-fw"></i></button>

                                                            <!--          <button type="submit" class="btn btn-primary">Submit</button> -->

                                                        </div>
                                                        <div id="planilla-part" class="content" role="tabpanel"
                                                            aria-labelledby="planilla-part-trigger">

                                                            <div class="form-group">
                                                                <label for="titulo_Tentativo" class="mt-4 required">Título
                                                                    del Proyecto </label>
                                                                <textarea class="form-control col-md-11" id="titulo_Tentativo" name="titulo_Tentativo" maxlength="400"
                                                                    rows="2" placeholder="Ej: Componente de software para el control de suministros de la UPT Aragua" required></textarea>

                                                                <div class="invalid-feedback">
                                                                    Por favor escoja una opción.
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="objetivo"
                                                                    class="mt-4 required">Objetivo</label>
                                                                <textarea class="form-control col-md-11" id="objetivo" name="objetivo" maxlength="400" rows="2"
                                                                    placeholder="Ej: Objetivo principal del proyecto, comenzar con verbo en infinitivo" required></textarea>
                                                                <div class="invalid-feedback">
                                                                    Por favor rellene este campo.
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-primary mt-4 mr-3"
                                                                onclick="stepper.previous()">Atrás<i
                                                                    class="fa-solid fa-arrow-left fa-fw"></i></button>

                                                            <button class="btn btn-primary mt-4"
                                                                onclick="stepper.next()">Siguiente<i
                                                                    class="fa-solid fa-arrow-right fa-fw"></i></button>
                                                        </div>

                                                        <div id="planilla2-part" class="content" role="tabpanel"
                                                            aria-labelledby="planilla2-part-trigger">

                                                            <div class=" form-group">
                                                                <label for="alcance"
                                                                    class="mt-4 required">Alcance</label>
                                                                <textarea class="form-control col-md-11" id="alcance" name="alcance" maxlength="800" rows="3"
                                                                    placeholder="Ej: La investigación abarcará las siguientes áreas..." required></textarea>
                                                                <div class="invalid-feedback">
                                                                    Por favor rellene este campo.
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="limitacion"
                                                                    class="mt-4 required">Limitaciones</label>
                                                                <textarea class="form-control col-md-11" id="limitacion" name="limitacion" maxlength="400" rows="3"
                                                                    placeholder="Ej: Inestabilidad del servicio eléctrico del país. Problemas con el servicio de internet." required></textarea>
                                                                <div class="invalid-feedback">
                                                                    Por favor rellene este campo.
                                                                </div>
                                                            </div>


                                                            <button class="btn btn-primary mt-4 mr-3"
                                                                onclick="stepper.previous()">Atrás<i
                                                                    class="fa-solid fa-arrow-left fa-fw"></i></button>

                                                            <button class="btn btn-primary mt-4"
                                                                onclick="stepper.next()">Siguiente<i
                                                                    class="fa-solid fa-arrow-right fa-fw"></i></button>
                                                        </div>

                                                        <div id="planilla3-part" class="content" role="tabpanel"
                                                            aria-labelledby="planilla3-part-trigger">

                                                            <div class="form-group">
                                                                <label for="aportes_comu" class="mt-4 required">Aportes a
                                                                    la Comunidad, Personas Beneficiadas</label>
                                                                <textarea class="form-control col-md-11" id="aportes_comu" name="aportes_comu" maxlength="400" rows="3"
                                                                    placeholder="Ej: Serán beneficiados directamente los estudiantes de la escuela y el personal del Departamento de Recursos Humanos, debido a que..."
                                                                    required></textarea>
                                                                <div class="invalid-feedback">
                                                                    Por favor rellene este campo.
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="acciones_integra"
                                                                    class="mt-4 required">Acciones de Integración con la
                                                                    Comunidad</label>
                                                                <textarea class="form-control col-md-11" id="acciones_integra" name="acciones_integra" maxlength="400"
                                                                    rows="3"
                                                                    placeholder="Ej: Reuniones con el Jefe del Departamento y el Tutor del Proyecto sobre la funcionalidad y requerimientos de la aplicación."
                                                                    required></textarea>
                                                                <div class="invalid-feedback">
                                                                    Por favor rellene este campo.
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="plan_patria" class="mt-4 required">Vinculación
                                                                    de la investigación con el Plan de la Patria
                                                                    2013-2019</label>
                                                                <textarea class="form-control col-md-11" id="plan_patria" name="plan_patria" maxlength="400" rows="3"
                                                                    placeholder="Ej: 1.6. Desarrollar las capacidades científico-tecnológicas que hagan viable, potencien y blinden la protección y atención de las necesidades del pueblo y el desarrollo del país potencia."
                                                                    required></textarea>
                                                                <div class="invalid-feedback">
                                                                    Por favor rellene este campo.
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary mt-4 mr-3"
                                                                onclick="stepper.previous()">Atrás<i
                                                                    class="fa-solid fa-arrow-left fa-fw"></i></button>
                                                        </div>

                                                    </div>
                                                </div>
                                    </div>
                                    <!-- bs-stepper -->




                                </div>

                                <div class="card-footer mt-4">
                                    <button type="submit" class="btn btn-primary mr-3" tabindex="6"
                                        onclick="validarGuardar();">Guardar</button>
                                    <a class="btn btn-secondary" tabindex="5" onclick="validarCancelar();">Cancelar</a>
                                </div>

                                </fieldset>
                                </form>

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

                                <script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>



                                <script>
                                    $(function() {
                                        $('#estudiante_ci').select2();
                                        $('#estudiante2_ci').select2();
                                        $('#estudiante3_ci').select2();
                                    });
                                </script>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
                                    })
                                </script>


                                @include('modales/modalcancelar')
                                @include('modales/modalguardar')

                            @stop

                            @section('css')
                                <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
                                <link href="{{ asset('/css/bs-stepper.min.css') }}" rel="stylesheet">

                            @stop

                            @section('js')

                                <script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>

                                <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                                <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

                                <script type="text/javascript" src="{{ asset('js/bs-stepper.min.js') }}"></script>

                                <script>
                                    $(document).ready(function() {

                                        $('#sede').change(function() {

                                            const pnf_dropdown = $('#PNF');

                                            $.ajax({
                                                url: "{{ route('pnf.dependiente') }}",
                                                data: {
                                                    sede_id: $(this).val()
                                                },
                                                success: function(data) {
                                                    pnf_dropdown.html('<option value="" selected>Seleccione</option>');
                                                    $.each(data, function(id, value) {
                                                        pnf_dropdown.append('<option value="' + id + '">' + value +
                                                            '</option>');
                                                    });
                                                },
                                                error: function(jqxhr, status, exception) {
                                                    alert('Exception:', exception);
                                                }
                                            })
                                        })
                                    })
                                </script>
                            @stop
