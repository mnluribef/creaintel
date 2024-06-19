@section('content_top_nav_right')


@if(@Auth::user()->hasRole('Super Administrador'))
<div class="mt-2 mr-2">
    <h6>Super Administrador</h6>
</div>
@endif

@if(@Auth::user()->hasRole('Super Administrador 2'))
<div class="mt-2 mr-2">
    <h6>Super Administrador 2</h6>
</div>
@endif

@if(@Auth::user()->hasRole('Administrador'))
<div class="mt-2 mr-2">
    <h6>Administrador</h6>
</div>
@endif

@if(@Auth::user()->hasRole('Coordinador'))
<div class="mt-2 mr-2">
    <h6>Coordinador</h6>
</div>
@endif

@if(@Auth::user()->hasRole('Estudiante'))
<div class="mt-2 mr-2">
    <h6>Estudiante</h6>
</div>
@endif
@endsection