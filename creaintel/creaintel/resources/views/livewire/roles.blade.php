<div>

    @section('content_top_nav_left')
    <h4 class="text-muted">
        <div class="ml-1 mt-2 unselectable">
            <i class="fa-duotone fa-user-shield" style="--fa-secondary-color: #000000;"></i>
            Usuarios

            <small class="text-lightblue">
                <i class="fas fa-xs fa-angle-right text-muted"></i>
                Roles
            </small>
        </div>
    </h4>
    @stop

    @if (session()->has('message'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '',
            text: "{!! session('message') !!}",
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

    @if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '',
            text: "{!! session('error') !!}",
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

@can('crear-roles')
<a type="button" data-bs-toggle="modal" data-bs-target="#rol_modal" class="btn btn-primary mt-4 mb-4 float-end">
    <i class="fa-solid fa-plus fa-fw"></i>Agregar</a>
@endcan


<div wire:ignore.self class="modal top fade" id="rol_modal" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: 5rem;">
            <div class="modal-header bg-primary d-flex justify-content-center text-center" style="height:3rem">
                <h5 class="modal-title text-center" id="config-titulo">
                    <div wire:ignore>

                        <i class="fa-solid fa-plus fa-fw"></i>

                        <label>Agregar Rol</label>
                    </div>
                </h5>

                <style>
                    .fa-circle-sm .fa-stack-2x {
                        font-size: 0.1em;
                    }
                </style>

                </button>
            </div>
            <form wire:submit.prevent="registrarRol" method="POST">
                @csrf
                <div class="modal-body">

                    <fieldset class="border border-primary border-2 p-3 rounded">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="name" class="mt-4 required">Nombre del Rol</label>
                                    <input type="text" wire:model.lazy="name" class="form-control" onkeypress="return txt(event);">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="" class="mt-4">Permisos para este Rol</label>
                                <div class="form-group pl-3">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach($permission2->chunk(ceil($permission2->count() / 2))[0] as $value)
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input name" wire:model.defer="permission_checkbox.{{ $value->id }}">
                                                {{ $value->name }}
                                            </label>
                                            <br>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach($permission2->chunk(ceil($permission2->count() / 2))[1] as $value)
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input name" wire:model.defer="permission_checkbox.{{ $value->id }}">
                                                {{ $value->name }}
                                            </label>
                                            <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group pl-3">
                                    <label for="" class="mt-4">Permisos para este Rol</label>
                                    <br>
                                    @foreach($permission2 as $value)
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="form-check-input name"
                            wire:model.defer="permission_checkbox.{{ $value->id }}">
                            {{ $value->name }}
                            </label>
                            <br>
                            @endforeach
                        </div>
                </div> --}}
                </fieldset>

        </div>

        <div class="modal-footer mt-1 justify-content-center" style="background-color:#f5f5f5">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk fa-fw"></i>Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-fw"></i>Cancelar</button>
        </div>
        </form>
    </div>
</div>
</div>

<div class="pt-3">
    @can('ver-roles')
    <livewire:tabla-roles />
    @endcan
</div>

{{-- @section('footer')
<div class="float-right d-none d-sm-block">
    Versión 1.0
</div>

<strong>
    <a href="https://www.s2tindustriales.com" target="_blank" style="text-decoration: none; color: inherit;">© 2024 S2T
        Industriales.</a>
</strong>

<span>Todos los derechos reservados</span>
@stop --}}


{{-- @endsection --}}

@section('css')
<link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">

@stop

@section('js')
<script defer src="{{ asset('js/alpine.min.js') }}"></script>
<script>
    window.addEventListener('close-modal', event => {
        $(".btn-secondary").click();
    });
</script>

@stop

</div>