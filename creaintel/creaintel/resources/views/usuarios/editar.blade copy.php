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

                    {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!}

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="Ci">Cédula</label>
                            {!! Form::text('Ci', null, array('class' => 'form-control')) !!}
                        </div>
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
                                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</section>

@include('modales/modalcancelar')
@include('modales/modalguardar')


@section('css')
<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">

@stop

@section('js')
<script type="text/javascript" src="{{ asset('js/jquery-3.6.4.js') }}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validaciones.js')}}"></script>


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