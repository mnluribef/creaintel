<div>
    
    @section('content_top_nav_left')
    <h4 class="text-muted">
        <div class="ml-1 mt-2 unselectable">
            <i class="fa-duotone fa-user" style="--fa-primary-color: #0d0d0d; --fa-secondary-color: #000000;"></i>
            Usuarios

            <small class="text-lightblue">
                <i class="fas fa-xs fa-angle-right text-muted"></i>
                Gestionar
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

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @can('crear-usuarios')
    <a type="button" data-bs-toggle="modal" data-bs-target="#config" class="btn btn-primary mt-4 ml-1 mb-4 float-end">
        <i class="fa-solid fa-plus fa-fw"></i>Agregar</a>
    @endcan

    {{-- <script defer src="{{ asset('js/alpine.min.js') }}"></script> --}}

    <script>
        window.addEventListener('close-modal', event => {
            $(".btn-secondary").click();
        });
    </script>


    {{-- Crear Usuario --}}

    <div wire:ignore.self class="modal top fade" id="config" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="margin-top: 5rem;">
                <div class="modal-header bg-primary d-flex justify-content-center text-center" style="height:3rem">
                    <h5 class="modal-title text-center" id="config-titulo">
                        <div wire:ignore>

                            <i class="fa-solid fa-plus fa-fw"></i>

                            <label>Agregar Usuario</label>
                        </div>
                    </h5>

                    <style>
                        .fa-circle-sm .fa-stack-2x {
                            font-size: 0.1em;
                        }
                    </style>
                    </button>
                </div>

                <form wire:submit.prevent="registrarUsuario" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        {{-- <legend>
                            <h5>Datos básicos</h5>
                        </legend> --}}
                        {{-- <fieldset class="border border-primary border-2 p-1 rounded"> --}}
                        <div class="form-row">
                            <div class="col">
                                <label for="ci" class="mt-4 required">Cédula</label>
                                <input type="tel" wire:model.defer="ci" class="form-control col-md-12" id="ci" name="ci" placeholder="" autocomplete="off" minlength="7" maxlength="8" tabindex="1" onkeypress="return numeros(event);">
                                @error('ci') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col">
                                <label for="name" class="mt-4 required">Nombre</label>
                                <input type="text" wire:model.defer="name" class="form-control col-md-12" id="name" name="name" placeholder="" maxlength="20" tabindex="2" onkeypress="return txt(event);">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col">
                                <label for="apellido" class="mt-4 required">Apellido</label>
                                <input type="text" wire:model.defer="apellido" class="form-control col-md-12" id="apellido" name="apellido" placeholder="" maxlength="20" tabindex="3" onkeypress="return txtspace(event);">
                                @error('apellido') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="email" class="mt-4 required">Correo</label>
                                <input type="email" wire:model.defer="email" class="form-control col-md-12" id="email" onkeyup="validateEmail(this.value);" name="email" placeholder="" maxlength="50" tabindex="4">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col">
                                <label for="telefono" class="mt-4">Teléfono</label>
                                <input type="tel" wire:model.defer="telefono" class="form-control col-md-12" onkeypress="return numeros(event);" id="telefono" name="telefono" maxlength="11" tabindex="5">
                                @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- <div class="form-row">
                                <div class="col mt-4">
                                    <label class="required" for="rol">Rol</label>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-select', 'placeholder'=>'Seleccione',
                                    'wire:model' => 'roles_select')) !!}
                                </div> --}}

                        {{-- <div class="form-row">
                                    <div class="col mt-4">
                                        <label class="required" for="rol">Rol</label>
                                        <select class="form-select" wire:model="roles_select">
                                            <option value="">Seleccione</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                        </select>
                    </div>
            </div> --}}

            <div class="form-row">
                <div class="col mt-4">
                    <label class="required" for="rol">Rol</label>
                    <select class="form-select" wire:model="roles_select">
                        <option value="">Seleccione</option>
                        @foreach ($roles as $id => $name)
                        <option value="{{ $id }}" wire:key="role-{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="password" class="mt-4 required">Contraseña</label>
                    <input type="password" wire:model.defer="password" class="form-control col-md-12" id="password" name="password" maxlength="20" tabindex="7" autocomplete="new-password">
                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="col">
                    <label for="password_confirmation" class="mt-4 required">Confirmar Contraseña</label>
                    <input type="password" wire:model.defer="password_confirmation" class="form-control col-md-12" id="password_confirmation" name="password_confirmation" maxlength="20" tabindex="8">
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            {{-- </fieldset> --}}
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
    @can('ver-usuarios')
    <livewire:tabla-usuarios />
    @endcan
</div>

@section('footer')
<div class="float-right d-none d-sm-block">
    Versión 1.0
</div>

<strong>
    <a href="https://www.s2tindustriales.com" target="_blank" style="text-decoration: none; color: inherit;">© 2024 S2T
        Industriales.</a>
</strong>

<span>Todos los derechos reservados</span>
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
</div>