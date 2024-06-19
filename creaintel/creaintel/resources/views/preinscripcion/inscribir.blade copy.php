@extends('adminlte::page')

@section('title', 'CreaIntel | Inscribir')

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
                            Inscribir
                        </h3>
                    </div>

                    <div class="card-body ml-3">

                        <form action="/preinscripcion/{{$preinscripcion->id}}" method="POST">
                            <table>
                                @csrf
                                @method('PUT')
                                <tr>
                                    <b>
                                        <th>Código del Proyecto:</th>
                                    </b>
                                    <td>{{$preinscripcion->pnfs['abreviatura']}}{{$preinscripcion->sedes['abreviatura']}}-{{$preinscripcion->trayectos['nombre_Trayecto']}}-{{$preinscripcion->anio}}-{{$preinscripcion->correlativo}} </td>
                                </tr>

                            </table>
                    </div>

                    </form>

                    <div class="card-footer">

                        <a href="/inscripcion" class="btn btn-primary mr-3" tabindex="4" onclick="javascript:return popup_confirmar();">Guardar</button>
                            <a href="/preinscripcion" class="btn btn-secondary" tabindex="3" onclick="javascript:return popup_back();">Cancelar</a>
                    </div>
                    </form>


                    @stop

                    @section('css')
                    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">



                    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">

                    @stop

                    @section('js')

                    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
                    <script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

                    @stop