@extends('adminlte::page')

@section('title', 'CreaIntel | Roles')

@section('content_header')

@include('usuarios/roltopmenu')
<h3>
    <i class="fa-solid fa-circle-user"></i>
    Roles |
    <small class="text-muted">Configuración</small>
</h3>

@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <h3 class="card-title">

                    @if ($errors->any());
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{$error}}</span>
                        @endforeach

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="card-body p-4">
                        <fieldset class="border border-primary border-2 p-3 rounded">

                            {!! Form::open(array('route'=>'roles.store', 'method'=>'POST', 'class'=>'ml-3')) !!}
                            <div class="form-group" <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="mt-4">Nombre del Rol</label>
                                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="" class="mt-4">Permisos para este Rol</label>
                                    @foreach($permission as $value)
                                    <label>
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class'=>'form-check-input name')) }}
                                        {{$value->name}}
                                        @endforeach
                                    </label>
                                </div>
                            </div>
                    </div>

                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-primary mr-3" tabindex="6" onclick="validarGuardar();">Guardar</button>
                        <a class="btn btn-secondary" tabindex="5" onclick="validarCancelar();">Cancelar</a>
                    </div>

                    {!! Form::close() !!}

                    @include('modales/modalcancelar')
                    @include('modales/modalguardar')
            </div>
        </div>
    </div>
    </div>
    </div>

    @stop

    @section('css')
    <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">


    <link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">


    @stop

    @section('js')

    <!-- <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->



    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>






    <script>
        $(function() {
            $('#trayecto').DataTable({
                language: {
                    url: '/language/datatables-es-ES.json'
                }
            });
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @stop