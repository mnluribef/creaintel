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

                    {!! Form::open(array('route' => 'usuarios.store','method'=>'POST')) !!}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="Ci">Cédula</label>
                            {!! Form::text('Ci', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="Ci" class="mt-4 required">Cédula</label>
                            <input type="tel" class="form-control col-md-12" id="Ci" name="Ci" placeholder="Ej: 25617543" autocomplete="off" minlength="7" maxlength="8" tabindex="1" onkeypress="return numeros(event);" required>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Apellido</label>
                                        {!! Form::text('apellido', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Teléfono</label>
                                            {!! Form::text('telefono', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            {!! Form::password('password', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Password</label>
                                            {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Roles</label>
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="card-footer mt-4">
                                        <button type="submit" class="btn btn-primary mr-3" tabindex="6" onclick="validarGuardar();">Guardar</button>
                                        <a class="btn btn-secondary" tabindex="5" onclick="validarCancelar();">Cancelar</a>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection

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