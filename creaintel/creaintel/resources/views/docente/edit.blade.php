@extends('adminlte::page')

@section('title', 'CreaIntel | Editar')

@section('content_header')

    @include('usuarios/roltopmenu')

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
                                Editar Docente
                            </h3>
                        </div>

                        <div class="card-body p-4">
                            <fieldset class="border border-primary border-2 p-3 rounded">
                                <form action="/docente/{{ $docente->docente_ci }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <h4 class="text-center text-primary">Datos del Docente</h4>

                                    <label>Cédula</label>
                                    <input type="number" min="1" class="form-control col-md-2" id="ci_docente"
                                        name="ci_docente" placeholder="Ej: 25617543" maxlength="100"
                                        value="{{ $docente->docente_ci }}" disabled>


                                    <div class="form-row">
                                        <div class="col">
                                            <label for="nombre" class="mt-4">Primer Nombre</label>
                                            <input type="text" class="form-control col-md-9" id="nombre"
                                                name="nombre" placeholder="Ej: Juan" maxlength="50"
                                                value="{{ $docente->nombre }}" onkeypress="return txt(event);" required>
                                        </div>

                                        <div class="col">
                                            <label for="apellido" class="mt-4">Primer Apellido</label>
                                            <input type="text" class="form-control col-md-9" id="apellido"
                                                name="apellido" placeholder="Ej: Pérez" maxlength="50"
                                                value="{{ $docente->apellido }}" required>
                                        </div>

                                        <div class="col">
                                            <label for="telefono" class="mt-4">Teléfono</label>
                                            <div label for="prefijo_id"></label>
                                                <select name="prefijo_id" id="prefijo_id" tabindex="4"
                                                    class="form-select col-md-3 d-inline-block">
                                                    <option value="">-- Escoja una opción --</option>

                                                    @foreach ($prefijos as $prefijo)
                                                        <option value="{{ $prefijo['id'] }}"
                                                            {{ $prefijo->id == $docente->prefijo_id ? 'selected' : '' }}>
                                                            {{ $prefijo['prefijo'] }}</option>
                                                    @endforeach
                                                </select>

                                                <input type="number" min="1"
                                                    class="form-control col-md-5 d-inline-block" id="telefono"
                                                    name="telefono" placeholder="Ej: 5432132"
                                                    value="{{ $docente->telefono }}" tabindex="5" maxlength="7" required
                                                    onKeyPress="if(this.value.length==7) return false;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">

                                            <label for="PNF_id" class="mt-4">PNF</label>
                                            <select name="PNF_id" id="PNF_id" class="form-select col-md-7">
                                                <option value="">-- Escoja una opción --</option>
                                                @foreach ($pnfs as $pnf)
                                                    <option value="{{ $pnf['id'] }}"
                                                        {{ $pnf->id == $docente->PNF_id ? 'selected' : '' }}>
                                                        {{ $pnf['nombre_PNF'] }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col">
                                            <label for="sede_id" class="mt-4">Sede</label>
                                            <select name="sede_id" id="sede_id" tabindex="7"
                                                class="form-select col-md-6">
                                                <option value="">-- Escoja una opción --</option>

                                                @foreach ($sedes as $sede)
                                                    <option value="{{ $sede['id'] }}"
                                                        {{ $sede->id == $docente->sede_id ? 'selected' : '' }}>
                                                        {{ $sede['nombre_Sede'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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

                    @stop
