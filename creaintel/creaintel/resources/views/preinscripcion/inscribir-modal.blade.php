@extends('adminlte::page')

@section('title', 'CreaIntel | Inscribir')

@section('content_header')
<!-- <h1>Editar preinscripción</h1> -->
@stop

@section('content')

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Inscribir</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Vertically centered scrollable modal -->
        <!--         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"> -->


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <i class="fa-solid fa-fw fa-fw fa-bell"></i>
                <h5 class="modal-title">Notificación</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">

                <p>¿Quieres inscribir el proyecto?</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sí</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>

    </div>
</div>

<!-- Dos Modales -->

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Notificación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Quieres inscribir el proyecto?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Sí</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Éxito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($preinscripcion as $preinscripcion)
                <form action="/preinscripcion/{{$preinscripcion->id}}/inscribir" method="POST">
                    @csrf
                    @method('PUT')

                    <th>Código del Proyecto:</th>

                    <td>{{$preinscripcion->pnfs['abreviatura']}}{{$preinscripcion->sedes['abreviatura']}}-{{$preinscripcion->trayectos['nombre_Trayecto']}}-{{$preinscripcion->anio}}-{{$preinscripcion->correlativo}} </td>

                    @endforeach
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Inscribir</a>

@stop

@section('css')
<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">

@stop

@section('js')


<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>

@stop