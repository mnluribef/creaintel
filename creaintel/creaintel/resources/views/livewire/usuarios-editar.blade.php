
@can('editar-usuarios')
<div class="d-flex justify-content-start">
    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#miModal"
        wire:click.prevent="accion({{ $user->id }})"><i class="fas fa-edit"></i></a>
@endcan
</div>


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

<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>


<script>
    window.addEventListener('close-modal', event => {
            $(".btn-secondary").click();
        });
</script>

{{--  --}}
{{-- Crear Usuario --}}

<div wire:ignore.self class="modal top fade" id="miModal" tabindex="-1" aria-labelledby="exampleModal2Label"
    aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: 5rem;">
            <div class="modal-header bg-success d-flex justify-content-center text-center" style="height:3rem">
                <h5 class="modal-title text-center" id="config-titulo">
                    <div wire:ignore>

                        <i class="fa-solid fa-edit fa-fw"></i>

                        <label>Editar Usuario</label>
                    </div>
                </h5>

                <style>
                    .fa-circle-sm .fa-stack-2x {
                        font-size: 0.1em;
                    }
                </style>
                </button>
            </div>
                <form method="POST" autocomplete="off">
                {{-- <form wire:submit.prevent="registrarUsuario" method="POST" autocomplete="off"> --}}
                    @csrf
                    <div class="modal-body">

                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                        @endif

                        {{-- <legend>
                            <h5>Datos básicos</h5>
                        </legend> --}}
                        <fieldset class="border border-success border-2 p-2 rounded">
                            <div class="form-row">
                                <div class="col">
                                    <label for="ci" class="mt-4 required">Cédula</label>
                                    <input type="tel" wire:model.defer="ci" class="form-control col-md-12" id="ci"
                                        name="ci" placeholder="" autocomplete="off" minlength="7" maxlength="8"
                                        tabindex="1" onkeypress="return numeros(event);" required disabled>
                                    @error('ci') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col">
                                    <label for="name" class="mt-4 required">Nombre</label>
                                    <input type="text" wire:model.defer="name" class="form-control col-md-12" id="name"
                                        name="name" placeholder="" maxlength="20" tabindex="2"
                                        onkeypress="return txt(event);" required>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col">
                                    <label for="apellido" class="mt-4 required">Apellido</label>
                                    <input type="text" wire:model.defer="apellido" class="form-control col-md-12"
                                        id="apellido" name="apellido" placeholder="" maxlength="20" tabindex="3"
                                        onkeypress="return txtspace(event);" required>
                                    @error('apellido') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="email" class="mt-4 required">Correo</label>
                                    <input type="email" wire:model.defer="email" class="form-control col-md-12"
                                        id="email" onkeyup="validateEmail(this.value);" name="email" placeholder=""
                                        maxlength="50" tabindex="4" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col">
                                    <label for="telefono" class="mt-4">Teléfono</label>
                                    <input type="tel" wire:model.defer="telefono" class="form-control col-md-12"
                                        onkeypress="return numeros(event);" id="telefono" name="telefono" maxlength="11"
                                        tabindex="5">
                                    @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col">
                                    <label for="id_chat_telegram" class="mt-4">Telegram ID</label>
                                    <input type="tel" wire:model.defer="id_chat_telegram" class="form-control col-md-12"
                                        id="id_chat_telegram" onkeypress="return numeros(event);"
                                        name="id_chat_telegram" maxlength="11" tabindex="6">
                                    @error('id_chat_telegram') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col mt-4">
                                    <label class="required" for="rol">Rol</label>
                                    {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-select',
                                    'placeholder'=>'Seleccione',
                                    'required', 'wire:model' => 'roles_select')) !!} --}}
                                    {{-- {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-select',
                                    'placeholder'=>'Seleccione', 'wire:model' => 'edit_roles_select')) !!} --}}

                                    <select id="edit_roles_select" name="edit_roles_select" wire:model.defer="edit_roles_select" class="form-select text-center">
                                        <option>Seleccione</option>
                                        @foreach($roles as $r)
                                        <option value="{{$r->id}}" wire:key="role-{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="password" class="mt-4 required">Contraseña</label>
                                    <input type="password" wire:model.defer="password" class="form-control col-md-12"
                                        id="edit_password" name="password" maxlength="20" tabindex="8" autocomplete="new-password">
                                </div>

                                <div class="col">
                                    <label for="password_confirmation" class="mt-4 required">Confirmar Contraseña</label>
                                    <input type="password" wire:model.defer="password_confirmation"
                                        class="form-control col-md-12" id="password_confirmation"
                                        name="password_confirmation" maxlength="20" tabindex="9">
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="modal-footer mt-1 justify-content-center" style="background-color:#f5f5f5">
                        <button type="button" wire:click.prevent="updateUsuario()" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-solid fa-floppy-disk fa-fw"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark fa-fw"></i>Cancelar</button>
                    </div>
                </form>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>

<style>
    .select-ancho-fijo {
        width: 17vw;
        /* width: 200px; */
    }

    hr {
    border: 0;
    height: 3px;
    background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
    background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
    background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
    background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
    }

</style>


