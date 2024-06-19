<div class="d-flex justify-content-start">
    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#miModal"
        wire:click.prevent="accion({{ $user->id }})"><i class="fas fa-edit"></i></a>
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

{{-- @if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
    @endif --}}

<script>
    window.addEventListener('close-modal', event => {
            $(".btn-secondary").click();
        });
</script>

<div wire:ignore.self class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModal2Label"
    aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: 5rem;">
            <div class="modal-header bg-success d-flex justify-content-center text-center" style="height:3rem">
                <h5 class="modal-title text-center" id="config-titulo">
                    <div wire:ignore>

                        <i class="fa-solid fa-edit fa-fw"></i>
                        <label>Editar Rol</label>
                    </div>
                </h5>
            </div>

            <form wire:submit.prevent="registrarUnidad" method="POST">
                @csrf
                <div class="modal-body">

                            {{-- {!! Form::model($role,['method'=>'PATCH', 'route'=> ['roles.update', $role->id]]) !!} --}}
                                    <fieldset class="border border-primary border-2 p-3 rounded">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="name" class="mt-4">Nombre del Rol</label>
                                                    <input type="text" wire:model.defer="name" class="form-control" onkeypress="return txt(event);">
                                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    {{-- {!! Form::text('name', null, array('class' => 'form-control')) !!} --}}
                                                </div>
                                            </div>


                                    
                                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group pl-3">
                                                    <label for="" class="mt-4">Permisos para este Rol</label>
                                                    <br>
                                                    @foreach($permission as $value)
                                                    <label>
                                                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class'
                                                        => 'form-check-input name', 'wire:model.defer' => 'permission_checkbox.' . $value->id)) }}
                                                        {{ $value->name }}
                                                    </label>
                                                    <br />
                                                    @endforeach
                                                </div>
                                            </div> --}}

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <h6>
            <label for="" class="mt-2">Permisos para este Rol</label>
        </h6>

        <div class="form-group pl-4">

            @php
            $count = count($permission);
            $halfCount = ceil($count / 2);
            $currentCount = 0;
            @endphp
            @foreach($permission as $index => $value)
            <label>
                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false,
                array('class' => 'form-check-input name', 'wire:model.defer' => 'permission_checkbox.' . $value->id)) }}
                {{ $value->name }}
            </label>
            <br>
            @php
            $currentCount++;
            if ($currentCount == $halfCount) {
            break;
            }
            @endphp
            @endforeach
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="" class="mt-10"></label>
            <br>
            @foreach($permission as $index => $value)
            @if($index >= $halfCount)
            <label>
                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false,
                array('class' => 'form-check-input name', 'wire:model.defer' => 'permission_checkbox.' . $value->id)) }}
                {{ $value->name }}
            </label>
            <br>
            @endif
            @endforeach
        </div>
    </div>
</div>

</fieldset>
                                    
                </div>
<div class="modal-footer mt-1 justify-content-center" style="background-color:#f5f5f5">
                    <button type="button" wire:click.prevent="updateRol()" class="btn btn-success"><i
                            class="fa-solid fa-floppy-disk fa-fw"></i>Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa-solid fa-xmark fa-fw"></i>Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>