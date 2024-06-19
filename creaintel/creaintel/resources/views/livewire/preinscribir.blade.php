<div>
    @section('title', 'CreaIntel | Preinscripción')

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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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


                                                <body class="h-screen overflow-hidden flex items-center justify-center"
                                                    style="background: #edf2f7;">


                                                    <style>
                                                        [x-cloak] {
                                                            display: none;
                                                        }
                                                    </style>

                                                    <div x-data="app()" x-cloak>
                                                        <div class="max-w-5xl mx-auto px-4">

                                                            <!-- <div x-show.transition="step === 'complete'"> -->

                                                            <div x-show.transition="step === 'complete'"
                                                                x-init="step = 1"
                                                                class="flex items-center justify-center">
                                                                <div
                                                                    class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                                                                    <div>
                                                                        <div class="d-flex">
                                                                            <!-- @if ($errors->any())
@endif-->
                                                                            <button @click="step = 1"
                                                                                class="btn btn-outline-secondary me-2"><i
                                                                                    class="fa-solid fa-arrow-left"></i>
                                                                                Ir al Paso 1</button>

                                                                            <a href="preinscripcion"
                                                                                class="btn btn-outline-secondary"><i
                                                                                    class="fa-solid fa-list"></i> Ir al
                                                                                listado</a>


                                                                        </div>

                                                                        <!-- @if ($errors->any())
                            <div class="flex justify-center items-center"> -->
                                                                        <!-- <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold"><i class="fa-solid fa-xmark" style="color: #e70808;"></i>Error</h2> -->
                                                                        <!-- <div class="text-red-500">
                                    Tiene errores de validación. Revise los datos ingresados. -->
                                                                        <!-- @if ($errors->any())
<div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
                                    </ul>
                                </div>
@endif -->


                                                                        <!-- <div class="flex justify-center items-center mt-3">
                                <button @click="step = 1" class="btn btn-outline-secondary"><i class="fa-solid fa-house mr-3"></i>Ir al Paso 1</button>

                                <a href="preinscripcion" class="btn btn-outline-secondary"><i class="fa-solid fa-house"></i> Ir al listado</a> -->
                                                                        <!-- <button @click="step = 1"
                                        class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Ir al Inicio</button> -->
                                                                        <!-- </div> -->
                                                                        <!--
@else
<svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                                <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registro exitoso</h2>
                    
                                <div class="text-gray-600 mb-8">
                                    Su preinscripción se ha guardado con éxito.
                                </div>
                                @endif -->
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div x-show.transition="step != 'complete'">
                                                                <!-- Top Navigation -->
                                                                <div class="border-b-2 py-4">
                                                                    <div class="uppercase tracking-wide text-sm font-bold text-gray-500 mb-1 leading-tight"
                                                                        x-text="`Paso ${step} de 5`"></div>
                                                                    <div
                                                                        class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                                        <div class="flex-1">
                                                                            <div x-show="step === 1">
                                                                                <div
                                                                                    class="text-lg font-bold text-gray-700 leading-tight">
                                                                                    Datos Personales</div>
                                                                            </div>

                                                                            <div x-show="step === 2">
                                                                                <div
                                                                                    class="text-lg font-bold text-gray-700 leading-tight">
                                                                                    Datos de la Comunidad</div>
                                                                            </div>

                                                                            <div x-show="step === 3">
                                                                                <div
                                                                                    class="text-lg font-bold text-gray-700 leading-tight">
                                                                                    Planilla (1)</div>
                                                                            </div>
                                                                            <div x-show="step === 4">
                                                                                <div
                                                                                    class="text-lg font-bold text-gray-700 leading-tight">
                                                                                    Planilla (2)</div>
                                                                            </div>
                                                                            <div x-show="step === 5">
                                                                                <div
                                                                                    class="text-lg font-bold text-gray-700 leading-tight">
                                                                                    Planilla (3)</div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="flex items-center md:w-64">
                                                                            <div
                                                                                class="w-full bg-white rounded-full mr-2">
                                                                                <div class="rounded-full bg-green-500 text-xs leading-none h-4 text-center text-white"
                                                                                    :style="'width: ' + parseInt(step / 5 *
                                                                                        100) + '%'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-sm w-10 text-gray-600"
                                                                                x-text="parseInt(step / 5 * 100) +'%'">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /Top Navigation -->

                                                                <!-- Step Content -->
                                                                <div class="py-2">
                                                                    <div x-show.transition.in="step === 1">

                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="estudiante_ci"
                                                                                    class="mt-4 required">Líder del
                                                                                    Equipo</label>
                                                                                <div class="form-row">
                                                                                    <div class="input-group">

                                                                                        <input type="tel"
                                                                                            name="estudiante_id"
                                                                                            id="estudiante_id"
                                                                                            wire:model="lider"
                                                                                            class="form-control col-md-8"
                                                                                            required
                                                                                            placeholder="Buscar Cédula"
                                                                                            wire:keydown.tab="realizarBusquedaEst1">
                                                                                        <!-- <input type="tel" class="form-control" placeholder="" wire:model="critico_min"
                                                    onkeypress="return temperaturas(event);"> -->
                                                                                        <div class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text mr-4"
                                                                                                style="padding-top:0;padding-bottom:0">
                                                                                                @if ($busquedaRealizada1)
                                                                                                    @if (!is_null($nombre1) && $apellido1)
                                                                                                        <p>{{ $nombre1 }}
                                                                                                            {{ $apellido1 }}
                                                                                                        </p>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="text-danger">No
                                                                                                            encontrado</span>
                                                                                                    @endif
                                                                                                @endif
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                @error('lider')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                                @if ($mensajeError1)
                                                                                    <span
                                                                                        class="text-danger">{{ $mensajeError1 }}</span>
                                                                                @endif
                                                                            </div>
                                                                            <!-- <select name="estudiante_ci" id="estudiante_ci" wire:model="lider" class="form-select col-md-9" required>
                                                                        <option value="">-- Escoja una opción --</option>
                                                                        @foreach ($estudiantes as $estudiante)
@if ($estudiante->lider_id == '1')
<option value="{{ $estudiante['estudiante_ci'] }}">{{ $estudiante['estudiante_ci'] }} {{ $estudiante['nombre'] }} {{ $estudiante['apellido'] }}</option>
@endif
@endforeach
                                                                    </select> -->



                                                                            <!-- <div class="invalid-feedback"> -->

                                                                            <!-- </div> -->


                                                                            <div class="col">
                                                                                <label for="estudiante2_ci"
                                                                                    class="mt-4 col-md-9">Estudiante
                                                                                    2</label>
                                                                                <div class="form-row">
                                                                                    <div class="input-group">

                                                                                        <input type="tel"
                                                                                            name="estudiante_id"
                                                                                            id="estudiante_id"
                                                                                            wire:model="estudiante2"
                                                                                            class="form-control col-md-8"
                                                                                            placeholder="Buscar Cédula"
                                                                                            wire:keydown.tab="realizarBusquedaEst2">
                                                                                        <!-- <input type="tel" class="form-control" placeholder="" wire:model="critico_min"
                                                    onkeypress="return temperaturas(event);"> -->
                                                                                        <div
                                                                                            class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text mr-4"
                                                                                                style="padding-top:0;padding-bottom:0">
                                                                                                @if ($busquedaRealizada2)
                                                                                                    @if (!is_null($nombre2) && $apellido2)
                                                                                                        <p>{{ $nombre2 }}
                                                                                                            {{ $apellido2 }}
                                                                                                        </p>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="text-danger">No
                                                                                                            encontrado</span>
                                                                                                    @endif
                                                                                                @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @if ($mensajeError2)
                                                                                    <p>{{ $mensajeError2 }}</p>
                                                                                @endif
                                                                            </div>
                                                                            <!-- <label for="estudiante2_ci" class="mt-4 col-md-9">Estudiante 2</label>
                                                                    <select name="estudiante2_ci" id="estudiante2_ci" wire:model="estudiante2" class="form-select col-md-9">
                                                                        <option value="">-- Escoja una opción --</option>
                                                                        @foreach ($estudiantes as $estudiante)
@if ($estudiante->lider_id == '2')
<option value="{{ $estudiante['estudiante_ci'] }}">{{ $estudiante['estudiante_ci'] }} {{ $estudiante['nombre'] }} {{ $estudiante['apellido'] }}</option>
@endif
@endforeach
                                                                    </select> -->


                                                                            <div class="col">
                                                                                <label for="estudiante3_ci"
                                                                                    class="mt-4 col-md-9">Estudiante
                                                                                    3</label>
                                                                                <div class="form-row">
                                                                                    <div class="input-group">

                                                                                        <input type="tel"
                                                                                            name="estudiante_id"
                                                                                            id="estudiante_id"
                                                                                            wire:model="estudiante3"
                                                                                            class="form-control col-md-8"
                                                                                            placeholder="Buscar Cédula"
                                                                                            wire:keydown.tab="realizarBusquedaEst3">
                                                                                        <!-- <input type="tel" class="form-control" placeholder="" wire:model="critico_min"
                                                            onkeypress="return temperaturas(event);"> -->
                                                                                        <div
                                                                                            class="input-group-append">
                                                                                            <span
                                                                                                class="input-group-text mr-4"
                                                                                                style="padding-top:0;padding-bottom:0">
                                                                                                @if ($busquedaRealizada3)
                                                                                                    @if (!is_null($nombre3) && $apellido3)
                                                                                                        <p>{{ $nombre3 }}
                                                                                                            {{ $apellido3 }}
                                                                                                        </p>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="text-danger">No
                                                                                                            encontrado</span>
                                                                                                    @endif
                                                                                                @endif
                                                                                        </div>
                                                                                    </div>
                                                                                    @if ($mensajeError3)
                                                                                        <p>{{ $mensajeError3 }}</p>
                                                                                    @endif
                                                                                </div>
                                                                                <!-- <select name="estudiante3_ci" id="estudiante3_ci" wire:model="estudiante3" class="form-select col-md-9">
                                                                        <option value="">-- Escoja una opción --</option>
                                                                        @foreach ($estudiantes as $estudiante)
@if ($estudiante->lider_id == '2')
<option value="{{ $estudiante['estudiante_ci'] }}">{{ $estudiante['estudiante_ci'] }} {{ $estudiante['nombre'] }} {{ $estudiante['apellido'] }}</option>
@endif
@endforeach
                                                                    </select> -->
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="sede"
                                                                                    class="mt-4 required">Sede</label>
                                                                                <select required name="sede"
                                                                                    id="sede" wire:model="sede"
                                                                                    class="form-select col-md-9"
                                                                                    style="display: flex">
                                                                                    <option value="">-- Escoja
                                                                                        una opción --</option>
                                                                                    @foreach ($sedes as $sede)
                                                                                        <option
                                                                                            value="{{ $sede['id'] }}">
                                                                                            {{ $sede['nombre_Sede'] }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor escoja una opción.
                                                                                </div>
                                                                            </div>

                                                                            <div class="col">
                                                                                <label for="PNF"
                                                                                    class="mt-4 required">PNF</label>
                                                                                <div class="form-group">
                                                                                    <select required name="PNF_id"
                                                                                        id="PNF_id"
                                                                                        wire:model="pnf"
                                                                                        class="form-select col-md-9"
                                                                                        style="display:flex">
                                                                                        <option value="">--
                                                                                            Escoja una opción --
                                                                                        </option>
                                                                                        @foreach ($pnfs as $pnf)
                                                                                            <option
                                                                                                value="{{ $pnf['pnf_id'] }}">
                                                                                                {{ $pnf['nombre_PNF'] }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <div class="invalid-feedback">
                                                                                    Por favor escoja una opción.
                                                                                </div>
                                                                            </div>

                                                                            <div class="col">
                                                                                <label for="tipo_estudio_id"
                                                                                    class="mt-4 required">Tipo de
                                                                                    Estudio</label>
                                                                                <select required
                                                                                    name=" tipo_estudio_id"
                                                                                    id="tipo_estudio_id"
                                                                                    wire:model="tipo_estudio"
                                                                                    class="form-select col-md-9">

                                                                                    <option value="">-- Escoja
                                                                                        una opción --</option>
                                                                                    @foreach ($tipo_estudios as $tipo_Estudio)
                                                                                        <option
                                                                                            value="{{ $tipo_Estudio['id'] }}">
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
                                                                                <select required name=" turno_id"
                                                                                    id="turno_id" wire:model="turno"
                                                                                    class="form-select col-md-9">

                                                                                    <option value="">-- Escoja
                                                                                        una opción --</option>
                                                                                    @foreach ($turnos as $turno)
                                                                                        <option
                                                                                            value="{{ $turno['id'] }}">
                                                                                            {{ $turno['nombre_Turno'] }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor escoja una opción.
                                                                                </div>
                                                                            </div>

                                                                            <div class="col">
                                                                                <label for="trayecto_id"
                                                                                    class="mt-4 required">Trayecto</label>
                                                                                <select required name="trayecto_id"
                                                                                    id="trayecto_id"
                                                                                    wire:model="trayecto"
                                                                                    class="form-select col-md-9"
                                                                                    style="display:flex">
                                                                                    <option value="">-- Escoja
                                                                                        una opción --</option>
                                                                                    @foreach ($trayectos as $trayecto)
                                                                                        <option
                                                                                            value="{{ $trayecto['id'] }}">
                                                                                            {{ $trayecto['nombre_Trayecto'] }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor escoja una opción.
                                                                                </div>
                                                                            </div>

                                                                            <div class="col">
                                                                                <label for="seccion_id"
                                                                                    class="mt-4 required">Sección</label>
                                                                                <select required name="seccion_id"
                                                                                    id="seccion_id"
                                                                                    wire:model="seccion"
                                                                                    class="form-select col-md-9"
                                                                                    style="display:flex">
                                                                                    <option value="">-- Escoja
                                                                                        una opción --</option>
                                                                                    @foreach ($secciones as $seccion)
                                                                                        <option
                                                                                            value="{{ $seccion['id'] }}">
                                                                                            {{ $seccion['nombre_Seccion'] }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="invalid-feedback">
                                                                                    Por favor escoja una opción.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div x-show.transition.in="step === 2">
                                                                    <!--                                          <h5 class="text-primary mt-4">Datos de la Comunidad</h5> -->
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label for="estado_id"
                                                                                class="mt-4 required">Estado</label>
                                                                            <select required name="estado_id"
                                                                                id="estado_id" wire:model="estado"
                                                                                class="form-select col-md-9"
                                                                                style="display:flex">
                                                                                <option value="">-- Escoja una
                                                                                    opción --</option>
                                                                                @foreach ($estados as $estado)
                                                                                    <option
                                                                                        value="{{ $estado['id'] }}">
                                                                                        {{ $estado['nombre_Estado'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Por favor escoja una opción.
                                                                            </div>
                                                                        </div>

                                                                        <div class="col">
                                                                            <label for="municipio_id"
                                                                                class="mt-4 required">Municipio</label>
                                                                            <select required name="municipio_id"
                                                                                id="municipio_id"
                                                                                wire:model="municipio"
                                                                                class="form-select col-md-9"
                                                                                style="display:flex">
                                                                                <option value="">-- Escoja una
                                                                                    opción --</option>
                                                                                @foreach ($municipios as $municipio)
                                                                                    <option
                                                                                        value="{{ $municipio['id'] }}">
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
                                                                            <select required name="parroquia_id"
                                                                                id="parroquia_id"
                                                                                wire:model="parroquia"
                                                                                class="form-select col-md-9"
                                                                                style="display:flex">
                                                                                <option value="">-- Escoja una
                                                                                    opción --</option>
                                                                                @foreach ($parroquias as $parroquia)
                                                                                    <option
                                                                                        value="{{ $parroquia['id'] }}">
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
                                                                            <select required name="sector_id"
                                                                                id="sector_id" wire:model="sector"
                                                                                class="form-select col-md-9"
                                                                                style="display:flex">
                                                                                <option value="">-- Escoja una
                                                                                    opción --</option>
                                                                                @foreach ($sectores as $sector)
                                                                                    <option
                                                                                        value="{{ $sector['id'] }}">
                                                                                        {{ $sector['nombre_Sector'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Por favor escoja una opción.
                                                                            </div>
                                                                        </div>

                                                                        <div class="col">
                                                                            <label for="asesor_ci"
                                                                                class="mt-4 required">Docente
                                                                                Asesor</label>
                                                                            <div class="input-group">
                                                                                <input type="tel" name="asesor"
                                                                                    id="asesor" wire:model="asesor"
                                                                                    class="form-control col-md-9"
                                                                                    required
                                                                                    placeholder="Buscar Cédula"
                                                                                    wire:keydown.tab="realizarBusquedaDoc1">
                                                                                <!-- <input type="tel" class="form-control" placeholder="" wire:model="critico_min"
                                                    onkeypress="return temperaturas(event);"> -->
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"
                                                                                        style="padding-top:0;padding-bottom:0">
                                                                                        @if ($busquedaRealizada4)
                                                                                            @if (!is_null($nombre4) && $apellido4)
                                                                                                <p>{{ $nombre4 }}
                                                                                                    {{ $apellido4 }}
                                                                                                </p>
                                                                                            @else
                                                                                                <p>No encontrado</p>
                                                                                            @endif
                                                                                        @endif
                                                                                </div>
                                                                                @if ($mensajeError4)
                                                                                    <p>{{ $mensajeError4 }}</p>
                                                                                @endif
                                                                            </div>
                                                                            <!-- <select required name="asesor_ci" id="asesor_ci" wire:model="asesor"  class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --</option>
                                                                        @foreach ($docente as $docente1)
<option value="{{ $docente1['docente_ci'] }}">{{ $docente1['docente_ci'] }} {{ $docente1['nombre'] }} {{ $docente1['apellido'] }}</option>
@endforeach
                                                                    </select> -->
                                                                            <div class="invalid-feedback">
                                                                                Por favor escoja una opción.
                                                                            </div>
                                                                        </div>

                                                                        <div class="col">
                                                                            <label for="tutor_ci"
                                                                                class="mt-4">Tutor</label>
                                                                            <div class="input-group">
                                                                                <input type="tel" name="tutor"
                                                                                    id="tutor" wire:model="tutor"
                                                                                    class="form-control col-md-9"
                                                                                    required
                                                                                    placeholder="Buscar Cédula"
                                                                                    wire:keydown.tab="realizarBusquedaDoc2">
                                                                                <!-- <input type="tel" class="form-control" placeholder="" wire:model="critico_min"
                                                    onkeypress="return temperaturas(event);"> -->
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"
                                                                                        style="padding-top:0;padding-bottom:0">
                                                                                        @if ($busquedaRealizada5)
                                                                                            @if (!is_null($nombre5) && $apellido5)
                                                                                                <p>{{ $nombre5 }}
                                                                                                    {{ $apellido5 }}
                                                                                                </p>
                                                                                            @else
                                                                                                <p>No encontrado</p>
                                                                                            @endif
                                                                                        @endif
                                                                                </div>
                                                                            </div>
                                                                            @if ($mensajeError5)
                                                                                <p>{{ $mensajeError5 }}</p>
                                                                            @endif
                                                                        </div>
                                                                        <!-- <select required name="asesor_ci" id="asesor_ci" wire:model="asesor"  class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --</option>
                                                                        @foreach ($docente as $docente1)
<option value="{{ $docente1['docente_ci'] }}">{{ $docente1['docente_ci'] }} {{ $docente1['nombre'] }} {{ $docente1['apellido'] }}</option>
@endforeach
                                                                    </select> -->
                                                                        <div class="invalid-feedback">
                                                                            Por favor escoja una opción.
                                                                        </div>
                                                                    </div>

                                                                    <!-- <select name="tutor_ci" id="tutor_ci" wire:model="tutor"  class="form-select col-md-9" style="display:flex">
                                                                        <option value="">-- Escoja una opción --</option>
                                                                        @foreach ($docente as $docente2)
<option value="{{ $docente2['docente_ci'] }}">{{ $docente2['docente_ci'] }} {{ $docente2['nombre'] }} {{ $docente2['apellido'] }}</option>
@endforeach
                                                                    </select> -->

                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <label for="lineainve_id"
                                                                                class="mt-4 required">Línea de
                                                                                Investigación</label>
                                                                            <select required name="lineainve_id"
                                                                                wire:model="lineainve"
                                                                                id="lineainve_id"
                                                                                class="form-select col-md-6"
                                                                                style="display:flex">
                                                                                <option value="">-- Escoja una
                                                                                    opción --</option>
                                                                                @foreach ($linea_inve as $lineainve)
                                                                                    <option
                                                                                        value="{{ $lineainve['id'] }}">
                                                                                        {{ $lineainve['descripcion'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="invalid-feedback">
                                                                                Por favor escoja una opción.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div x-show.transition.in="step === 3">

                                                                    <div class="form-group">
                                                                        <label for="titulo_Tentativo"
                                                                            class="mt-4 required">Título del Proyecto
                                                                        </label>
                                                                        <textarea class="form-control col-md-12" id="titulo_Tentativo" wire:model="titulo" name="titulo_Tentativo"
                                                                            maxlength="400" rows="2"
                                                                            placeholder="Ej: Componente de software para el control de suministros de la UPT Aragua" required></textarea>

                                                                        <div class="invalid-feedback">
                                                                            Por favor escoja una opción.
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="objetivo"
                                                                            class="mt-4 required">Objetivo</label>
                                                                        <textarea class="form-control col-md-12" id="objetivo" name="objetivo" wire:model="objetivo" maxlength="400"
                                                                            rows="2" placeholder="Ej: Objetivo principal del proyecto, comenzar con verbo en infinitivo" required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor rellene este campo.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div x-show.transition.in="step === 4">

                                                                    <div class=" form-group">
                                                                        <label for="alcance"
                                                                            class="mt-4 required">Alcance</label>
                                                                        <textarea class="form-control col-md-12" id="alcance" name="alcance" wire:model="alcance" maxlength="800"
                                                                            rows="3" placeholder="Ej: La investigación abarcará las siguientes áreas..." required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor rellene este campo.
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="limitacion"
                                                                            class="mt-4 required">Limitaciones</label>
                                                                        <textarea class="form-control col-md-12" id="limitacion" name="limitacion" wire:model="limitacion" maxlength="400"
                                                                            rows="3"
                                                                            placeholder="Ej: Inestabilidad del servicio eléctrico del país. Problemas con el servicio de internet." required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor rellene este campo.
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div x-show.transition.in="step === 5">

                                                                    <div class="form-group">
                                                                        <label for="aportes_comu"
                                                                            class="mt-4 required">Aportes a la
                                                                            Comunidad, Personas Beneficiadas</label>
                                                                        <textarea class="form-control col-md-12" id="aportes_comu" name="aportes_comu" wire:model="aportes_comu"
                                                                            maxlength="400" rows="3"
                                                                            placeholder="Ej: Serán beneficiados directamente los estudiantes de la escuela y el personal del Departamento de Recursos Humanos, debido a que..."
                                                                            required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor rellene este campo.
                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="acciones_integra"
                                                                            class="mt-4 required">Acciones de
                                                                            Integración con la Comunidad</label>
                                                                        <textarea class="form-control col-md-12" id="acciones_integra" name="acciones_integra" wire:model="acciones_integra"
                                                                            maxlength="400" rows="3"
                                                                            placeholder="Ej: Reuniones con el Jefe del Departamento y el Tutor del Proyecto sobre la funcionalidad y requerimientos de la aplicación."
                                                                            required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor rellene este campo.
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="plan_patria"
                                                                            class="mt-4 required">Vinculación de la
                                                                            investigación con el Plan de la Patria
                                                                            2013-2019</label>
                                                                        <textarea class="form-control col-md-11" id="plan_patria" name="plan_patria" wire:model="plan_patria"
                                                                            maxlength="400" rows="3"
                                                                            placeholder="Ej: 1.6. Desarrollar las capacidades científico-tecnológicas que hagan viable, potencien y blinden la protección y atención de las necesidades del pueblo y el desarrollo del país potencia."
                                                                            required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor rellene este campo.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- </div> -->

                                                            <div class="mt-4">
                                                                <div class="max-w-3xl mx-auto px-4">
                                                                    <div class="flex justify-center">
                                                                        <!-- <div class="flex flex-row justify-between"> -->
                                                                        <button x-show="step > 1"
                                                                            @click.prevent="step--"
                                                                            class="btn btn-outline-secondary mr-4">
                                                                            <i class="fas fa-arrow-left"></i> Atrás
                                                                        </button>

                                                                        <div class="text-right">
                                                                            <button x-show="step < 5"
                                                                                @click.prevent="step++"
                                                                                class="btn btn-primary mr-2"> Siguiente
                                                                                <i class="fas fa-arrow-right"></i>
                                                                            </button>

                                                                            <button @click="step = 'complete'"
                                                                                x-show="step === 5" wire:click="save"
                                                                                class="btn btn-primary">
                                                                                <!-- <button @click="step = 'complete'" x-show="step === 5" wire:click="GuardarTodo" class="btn btn-primary"> -->
                                                                                Guardar <i
                                                                                    class="fa-solid fa-floppy-disk"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Guardar cambios</button> -->
                                                        </div>
                                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer mt-4"> -->
                            <!-- <button wire:click="save" class="btn btn-primary mr-3" tabindex="6">Guardar</button> -->
                            <!-- <button type="submit" class="btn btn-primary mr-3" tabindex="6" onclick="validarGuardar();">Guardar</button> -->
                            <!-- <a class="btn btn-secondary" tabindex="5" onclick="validarCancelar();">Cancelar</a>
                                </div> -->

                            </fieldset>
                            </form>

                            @if (session()->has('message'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: '',
                                        text: "{!! session('message') !!}",
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 5000
                                    });
                                </script>
                            @endif

                            @if (session()->has('error'))
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: '',
                                        text: "{!! session('error') !!}",
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 5000
                                    });
                                </script>
                            @endif
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

                            <!-- @include('modales/modalcancelar')
                                @include('modales/modalguardar') -->

                            @section('css')
                                <link href="{{ asset('/css/tailwind.min.css') }}" rel="stylesheet">
                                <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

                                <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
                                <link href="{{ asset('/css/bs-stepper.min.css') }}" rel="stylesheet">

                            @endsection

                            @section('js')

                                <script type="text/javascript" src="{{ asset('js/bs-stepper.min.js') }}"></script>

                                <script>
                                    function app() {
                                        return {
                                            step: 1,
                                        }
                                    }
                                </script>

                            @endsection

                        </div>
                    </div>
                </div>
            </div>
        </div>
