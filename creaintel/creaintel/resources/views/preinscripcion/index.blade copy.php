@extends('adminlte::page')

@section('title', 'CreaIntel | Preinscripción')

@section('content_header')

@include('usuarios/roltopmenu')

<h3>
    <i class="fa-solid fa-file-signature"></i>
    Preinscripción |
    <small class="text-muted">Proyecto Sociotecnológico</small>
</h3>


@stop

@section('content')

<a href="preinscripcion/create" class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>

<table id="preinscripcion" class=" table table-striped shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cédula Líder</th>
            <th scope="col">Nombres y Apellidos</th>
            <th scope="col">PNF</th>
            <th scope="col">Sede</th>
            <th scope="col">Tipo Estudio</th>
            <th scope="col">Trayecto</th>
            <th scope="col">Título del Proyecto</th>
            <th scope="col">Objetivo</th>
            <th scope="col">Status Planilla</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Acciones</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($preinscripciones as $preinscripcion)
        @if($preinscripcion->preins=='1')
        <tr>
            <td>{{$preinscripcion->id}}</td>
            <td>{{$preinscripcion->estudiantes['estudiante_ci']}}</td>
            <td>{{$preinscripcion->estudiantes['nombre']}} {{$preinscripcion->estudiantes['apellido']}}</td>
            <td>{{$preinscripcion->pnfs['nombre_PNF']}}</td>
            <td>{{$preinscripcion->sedes['nombre_Sede']}}</td>
            <td>{{$preinscripcion->tipo_estudios['nombre_Tipo_Estudio']}}</td>
            <td>{{$preinscripcion->trayectos['nombre_Trayecto']}}</td>
            <td>{{$preinscripcion->titulo_tentativo}}</td>
            <td>{{$preinscripcion->objetivo}}</td>
            <td>{{$preinscripcion->status['nombre_Status']}}</td>
            <td>{{$preinscripcion->observaciones}}</td>
            <td>
                <form action="{{ route ('preinscripcion.destroy',$preinscripcion->id)}}" method="POST" id="miFormulario">

                    @csrf
                    @method('DELETE')
                    <!--                     <a href="/preinscripcion/{{$preinscripcion->id}}/inscribir" data-toggle="tooltip" data-placement="top" title="Inscribir" class="btn btn-info mr-2"><i class="fa-solid fa-id-card fa-fw"></i></a> -->

                    <!--                     <a href="/preinscripcion/{{$preinscripcion->id}}/inscribir" data-toggle="tooltip" data-placement="top" title="Inscribir" class="btn btn-info mr-2" onclick=" javascript:return popup_inscribir();"><i class="fa-solid fa-id-card fa-fw"></i></a> -->

                    <a onclick="validarInscribir();" data-toggle="tooltip" data-placement="top" title="Inscribir" class="btn btn-info mr-2"><i class="fa-solid fa-id-card fa-fw"></i></a>

                    <a href="/preinscripcion/{{$preinscripcion->id}}/edit" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>

                    <a href=" {{ route('Preinscripcion') }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a>

                    <a onclick="validarGuardar();" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Observaciones" class="btn btn-dark mr-2"><i class="fa-solid fa-comment fa-fw"></i></a>

                    <!-- Modal Inscribir -->

                    <div class="modal" tabindex="-1" role="dialog" id="modalInscribir">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title badge badge-success"> <i class="fa-solid fa-fw fa-fw fa-check"></i>CONFIRMACIÓN</h5>
                                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    <p class="text-center" id="mensaje2"></p>
                                </div>
                                <div class="modal-footer">

                                    <a href="/preinscripcion/{{$preinscripcion->id}}/inscribir" form="registro" type="button" class="btn btn-primary">Sí</a>
                                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">No</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function validarInscribir() {
                            MENSAJE2 = "¿Está seguro de inscribir el proyecto?";
                            $("#mensaje2").html(MENSAJE2);
                            $("#modalInscribir").modal('show');
                        }
                        //end function validarGuardar
                    </script>

                    <!-- Modal Inscribir-->



                    <!-- Modal Observaciones -->

                    <div class="modal" tabindex="-1" role="dialog" id="modalGuardar">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title badge badge-success"> <i class="fa-solid fa-fw fa-fw fa-table-columns"></i>FORMULARIO</h5>
                                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    <p class="text-center" id="mensaje2"></p>
                                    <form action="/preinscripcion/{{$preinscripcion->id}}" method="POST" id="observaciones">
                                        <table>
                                            @csrf
                                            @method('PUT')
                                            <tr>

                                                <div class="form-group">
                                                    <label for="observaciones">Observaciones</label>
                                                    <textarea class="form-control col-md-11" id="observaciones" name="observaciones" maxlength="200" rows="2" placeholder="Ej: " value="{{$preinscripcion->observaciones}}" required></textarea>


                                                </div>
                                            </tr>
                                        </table>

                                </div>

                                <div class="modal-footer">
                                    <a type="submit" form="observaciones" class="btn btn-primary">Guardar</a>
                                    <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Salir</a>
                </form>
                </div>
                </div>
                </div>
                </div>



                <script>
                    function validarGuardar() {
                        $("#modalGuardar").modal('show');
                    }
                    //end function validarGuardar
                </script>

                <!-- Modal Observaciones-->



                <!--                     <button type="submit" data-toggle="tooltip" data-placement="top" title="Inactivar" class="btn btn-warning" onclick="javascript:return popup_inactivar();"><i class="fa-solid fa-ban fa-fw"></i>
                    </button> -->
            </td>
        </tr>

        @endif
        @endforeach
    </tbody>
</table>
</div>
@stop

@section('css')
<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">

@stop

@section('js')

<!-- <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->

<script type="text/javascript" src="{{asset('js/jquery-3.6.4.js')}}"></script>

<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('js/validaciones.js') }}"></script>


<script>
    $(function() {
        $('#preinscripcion').DataTable({
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