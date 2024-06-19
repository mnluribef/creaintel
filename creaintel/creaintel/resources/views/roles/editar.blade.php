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

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa-solid fa-solid fa-file-signature"></i>
                    Editar Rol
                </h3>
            </div>


            @if ($errors->any());
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

            <div class="card-body p-4">
                <fieldset class="border border-primary border-2 p-3 rounded">
                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}


                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label for="name" class="mt-4">Nombre del Rol</label>
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    @foreach ($types as $type)
                                        <th>{{ $type }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classifications as $classification)
                                    <tr>
                                        <td>{{ $classification }}</td>
                                        @foreach ($types as $type)
                                            <td>
                                                @foreach ($permissions->where('classification', $classification)->where('type', $type) as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox" name="permission[]"
                                                            value="{{ $permission->id }}"
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                                            class="form-check-input">
                                                        <!-- <label class="form-check-label">{{ $permission->name }}</label> -->
                                                    </div>
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="card-footer mt-4">
                            <button type="submit" class="btn btn-primary mr-3" tabindex="7"
                                onclick="validarGuardar();">Guardar</button>
                            <a class="btn btn-secondary" tabindex="8" onclick="validarCancelar();">Cancelar</a>
                        </div>

                        {!! Form::close() !!}
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

        <!-- <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> -->



        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>



        <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>



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
