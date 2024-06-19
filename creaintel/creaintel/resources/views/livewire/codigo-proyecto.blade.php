<div class="d-flex justify-content-start">

    @foreach ($preinscripciones as $preinscripcion)
        {{ $preinscripcion->pnfs['abreviatura'] }}{{ $preinscripcion->sedes['abreviatura'] }}-{{ $preinscripcion->trayectos['nombre_Trayecto'] }}-{{ $preinscripcion->anio }}-{{ $preinscripcion->correlativo }}
    @endforeach




</div>