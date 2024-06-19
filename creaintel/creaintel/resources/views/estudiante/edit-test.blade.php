    <!-- Modal Guardar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalEditarEstudiante">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-primary"><i class="fa-solid fa-plus fa-fw"></i>AGREGAR ESTUDIANTE</h5>
                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="/estudiante/{{$estudiante->estudiante_ci}}/edit" method="POST" id="estudiante_editar">
                        @csrf
                        <fieldset class="border border-primary border-2 p-3 rounded">
                            <h4 class="text-center text-primary">Datos del Estudiante</h4>
                            <div class="form-row">
                                <div class="col">
                                    <label for="estudiante_ci" class="mt-4">Cédula</label>
                                    <input type="number" class="form-control col-md-2" id="estudiante_ci" name="estudiante_ci" placeholder="Ej: 25617543" maxlength="8" tabindex="1" onKeyPress="if(this.value.length==8) return false;" onkeypress="return cedula(event);" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="nombre" class="mt-4">Primer Nombre</label>
                                    <input type="text" class="form-control col-md-12" id="nombre" name="nombre" placeholder="Ej: Juan" maxlength="50" tabindex="2" onkeypress="return txt(event);" required>
                                </div>

                                <div class="col">
                                    <label for="apellido" class="mt-4">Primer Apellido</label>
                                    <input type="text" min="1" class="form-control col-md-12" id="apellido" name="apellido" placeholder="Ej: Pérez" maxlength="50" tabindex="3" onkeypress="return txt(event);" required>
                                </div>

                                <div class="col">
                                    <label for="correo" class="mt-4">Correo</label>
                                    <input type="email" class="form-control col-md-12" id="correo" name="correo" placeholder="Ej: ejemplo@gmail.com" maxlength="50" tabindex="4" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="telefono" class="mt-4">Teléfono</label>
                                    <div label for="prefijo_id"></label>
                                        <select name="prefijo_id" id="prefijo_id" tabindex="5" class="form-select col-md-4 d-inline-block">
                                            <option value=""></option>
                                            @foreach ($prefijos as $prefijo)
                                            <option value="{{$prefijo['id']}}">{{$prefijo['prefijo']}}</option>
                                            @endforeach
                                        </select>

                                        <input type="number" min="1" class="form-control col-md-7 d-inline-block" id="telefono" name="telefono" placeholder="Ej: 5432132" tabindex="6" maxlength="7" required onKeyPress="if(this.value.length==7) return false;">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="sede_id" class="mt-4">Sede</label>
                                    <select name="sede_id" id="sede_id" tabindex="7" class="form-select col-md-12">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($sedes as $Sede)
                                        <option value="{{$Sede['id']}}">{{$Sede['nombre_Sede']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="lider_id" class="mt-4">¿Es Líder?</label>
                                    <select name="lider_id" id="lider_id" tabindex="7" class="form-select col col-md-6">
                                        <option value="2" selected>No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer mt-4 justify-content-center">
                                <button type="submit" form="estudiante_editar" type="button" class="btn btn-primary">Guardar</button>
                                <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                            </div>
                </div>
            </div>
        </div>
        </form>

        <script>
            function editarEstudiante() {

                $("#modalEditarEstudiante").modal('show');
            }
            //end function validarGuardar
        </script>

        <!-- Modal Guardar-->