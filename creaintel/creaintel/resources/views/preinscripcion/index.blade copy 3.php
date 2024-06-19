@extends('adminlte::page')

@section('title', 'CreaIntel | Preinscripción')

@section('content_header')

<livewire:styles />

<livewire:scripts />

@include('usuarios/roltopmenu')

@section('content_top_nav_left')

@foreach ($periodos as $peri2)
<div class="mt-2 ml-2">
    <tr>
        <b>Período</b>

        {{$peri2['fecha_apertura']}}
    </tr>

    hasta
    <tr>

        <td>{{$peri2['fecha_cierre']}}</td>
    </tr>
</div>
@endforeach
@endsection

<h3>
    <i class="fa-solid fa-file-signature"></i>
    Preinscripción |
    <small class="text-muted">Proyecto Sociotecnológico</small>
</h3>


@stop

@section('content')

@can('crear-preinscripcion')
<a id="preinscribir" value='preinscribir' class="btn btn-primary mt-4 mb-4"><i class="fa-solid fa-plus fa-fw"></i>Agregar</a>
@endcan

<!-- <script>
    document.getElementById("preinscribir").onclick = function() {
        myFunction()
    };

    function myFunction() {
        var currentDate = new Date().toJSON().slice(0, 10);
        var desde = new Date('2020/01/01');
        var hasta = new Date('2023/04/31');
        var check = new Date(currentDate);

        if (check > desde && check < hasta) {
            window.location.href = "preinscripcion/create";
        } else {
            alert("El período no fue aperturado o fue cerrado");
        }
    }
</script>  Este sirve-->

@foreach ($periodos as $periodos)

<input type="hidden" id="fecha_apertura" class="form-control col-md-7" name="fecha_apertura" value="{{$periodos['fecha_apertura']}}">

<input type="hidden" class="form-control col-md-7" id="fecha_cierre" name="fecha_cierre" value="{{$periodos['fecha_cierre']}}">
@endforeach

<script>
    var desde = document.querySelector('#fecha_apertura').value;
    var hasta = document.querySelector('#fecha_cierre').value;
    document.getElementById("preinscribir").onclick = function() {
        myFunction()
    };

    function myFunction() {
        var check = new Date().toJSON().slice(0, 10);

        if (check > desde && check <= hasta) {
            window.location.href = "preinscripcion/create";
        } else {
            Swal.fire("El período fue cerrado o no fue aperturado");
        }
    }
</script>

<style>
    .swal2-styled.swal2-confirm {
        background-color: #007bff !important;
    }
</style>

<table id="preinscripcion" class=" table table-striped shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cédula Líder</th>
            <th scope="col">Nombre y Apellido</th>
            <th scope="col">PNF</th>
            <th scope="col">Sede</th>
            <th scope="col">Tipo Estudio</th>
            <th scope="col">Trayecto</th>
            <th scope="col">Título del Proyecto</th>
            <!--             <th scope="col">Objetivo</th> -->
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
            <!--             <td>{{$preinscripcion->objetivo}}</td> -->
            <td>
                @if ($preinscripcion->status_planilla==1)
                <a href="{{ url('status-planilla/'.$preinscripcion->id) }}" onclick="return confirm('¿Está seguro de cambiar el Status?')" class="btn btn-sm btn-secondary">Por revisar</a>
                @else
                <a href="{{ url('status-planilla/'.$preinscripcion->id) }}" onclick="return confirm('¿Está seguro de cambiar el Status?')" class="btn btn-sm btn-success">Revisado</a>
                @endif

            </td>
            <td>{{$preinscripcion->observaciones}}</td>
            <td>
                <form action="{{ route ('preinscripcion.destroy',$preinscripcion->id)}}" method="POST" id="miFormulario">

                    @csrf
                    @method('DELETE')
                    <!--                     <a href="/preinscripcion/{{$preinscripcion->id}}/inscribir" data-toggle="tooltip" data-placement="top" title="Inscribir" class="btn btn-info mr-2"><i class="fa-solid fa-id-card fa-fw"></i></a> -->

                    <!--                     <a href="/preinscripcion/{{$preinscripcion->id}}/inscribir" data-toggle="tooltip" data-placement="top" title="Inscribir" class="btn btn-info mr-2" onclick=" javascript:return popup_inscribir();"><i class="fa-solid fa-id-card fa-fw"></i></a> -->
                    @can('inscribir-preinscripcion')
                    <a onclick="validarInscribir();" data-toggle="tooltip" data-placement="top" title="Inscribir" class="btn btn-info mr-2"><i class="fa-solid fa-id-card fa-fw"></i></a>
                    @endcan

                    @can('editar-preinscripcion')
                    <a href="/preinscripcion/{{$preinscripcion->id}}/edit" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-success mr-2"><i class="fa-solid fa-pen-to-square fa-fw"></i></a>
                    @endcan

                    <a href="preinscripcion.download" target="_blank" data-toggle="tooltip" data-placement="top" title="Reporte" class="btn btn-danger mr-2"><i class="fa-solid fa-file-pdf fa-fw"></i></a>
                    <!--                     / -->

                    @can('observaciones-preinscripcion')

                    <a href="{{ url('preinscripcion/observaciones/'.$preinscripcion->id) }}" data-toggle="tooltip" data-placement="top" title="Observaciones" class="btn btn-dark mr-2"><i class="fa-solid fa-comment fa-fw"></i></a>
                    @endcan


                    <!--                     <a onclick="validarObservaciones();" data-toggle=" tooltip" data-target="#exampleModal" data-placement="top" title="Asignar Jurado" class="btn beta mr-2"><i class="fa-solid fa-chalkboard-user fa-fw" style="color: #ffffff;"></i></a>

                    <style>
                        .beta {
                            background-color: orange;
                        }

                        .beta:hover {
                            background-color: darkorange;
                        }
                    </style>

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
                                <div class="modal-footer" style="justify-content: center;">
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
                    </script>



                    </div>
                    </div>
                    </div>

                    <script>
                        function validarJurado() {

                            $("#modalObservaciones").modal('show');
                        }
                        //end function validarGuardar
                    </script>

                    <script>
                        function validarJurado() {

                            $("#modalJurado").modal('show');
                        }
                        //end function validarGuardar
                    </script>





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
<link href="{{ asset('/css/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fontawesome-free/css/solid.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bs-stepper.min.css') }}" rel="stylesheet">

@stop

@section('js')

<!-- <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->

<script type="text/javascript" src="{{asset('js/jquery-3.6.4.js')}}"></script>

<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/sweetalert2.all.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/bs-stepper.min.js')}}"></script>

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