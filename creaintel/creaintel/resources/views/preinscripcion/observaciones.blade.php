@extends('adminlte::page')

@section('title', 'CreaIntel | Observaciones')

@section('content_header')
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
                                Observaciones
                            </h3>
                        </div>
                        <!--                     value="{{ $preinscripcion->observaciones }}" -->

                        <!--                     /preinscripcion/{{ $preinscripcion->id }} -->
                        <div class="card-body ml-3">
                            <form action="/preinscripcion/observaciones/{{ $preinscripcion->id }} " method="POST">
                                @csrf
                                @method('PUT')

                                <tr>
                                    <div class="form-group">
                                        <label for="observaciones" class="mt-4">Observaciones</label>
                                        <textarea class="form-control col-md-11" id="observaciones" name="observaciones" maxlength="200" rows="2"
                                            placeholder="Ej: " required>{{ old('observaciones', $preinscripcion->observaciones) }}</textarea>
                                </tr>
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary mr-3" tabindex="4">Guardar</button>
                        <a href="/preinscripcion" class="btn btn-secondary" tabindex="3">Cancelar</a>
                    </div>

                    </form>

                    <!--                     onclick="javascript:return popup_confirmar();" -->
                    <!--                     onclick="javascript:return popup_back();" -->

                @stop

                @section('css')
                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">


                    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                @stop

                @section('js')

                    <script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
                    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

                    <script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>

                @stop
