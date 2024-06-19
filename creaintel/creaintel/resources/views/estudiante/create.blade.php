    <!-- Modal Guardar -->

    <!--     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
        </ul>
    </div>
    @endif -->

    <div class="modal" tabindex="-1" role="dialog" id="modalEstudiante">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-primary"><i class="fa-solid fa-plus fa-fw"></i>AGREGAR ESTUDIANTE
                    </h5>
                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="/estudiante" method="POST" id="estudiantecrear" class="needs-validation" novalidate>
                        @csrf
                        <fieldset class="border border-primary border-2 p-3 rounded">
                            <h4 class="text-center text-primary">Datos del Estudiante</h4>

                            <div class="form-row">
                                <div class="col">
                                    <label for="estudiante_ci" class="mt-4 required">Cédula</label>
                                    <input type="tel" class="form-control col-md-12" id="estudiante_ci"
                                        name="estudiante_ci" placeholder="Ej: 25617543" autocomplete="off"
                                        minlength="7" maxlength="8" tabindex="1" onkeypress="return numeros(event);"
                                        required>

                                    <div class="invalid-feedback">
                                        Por favor rellene este campo.
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="nombre" class="mt-4 required">Primer Nombre</label>
                                    <input type="text" class="form-control col-md-12" id="nombre" name="nombre"
                                        placeholder="Ej: Alejandro" maxlength="20" tabindex="2"
                                        onkeypress="return txt(event);" required>

                                    <div class="invalid-feedback">
                                        Por favor rellene este campo.
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="apellido" class="mt-4 required">Primer Apellido</label>
                                    <input type="text" min="1" class="form-control col-md-12" id="apellido"
                                        name="apellido" placeholder="Ej: González" maxlength="20" tabindex="3"
                                        onkeypress="return txt(event);" required>

                                    <div class="invalid-feedback">
                                        Por favor rellene este campo.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="correo" class="mt-4 required">Correo</label>
                                    <input type="email" class="form-control col-md-12" id="correo" name="correo"
                                        placeholder="Ej: ejemplo@gmail.com" maxlength="30" tabindex="4" required>

                                    <div class="invalid-feedback">
                                        Por favor escriba un correo válido.
                                    </div>
                                </div>


                                <div class="col">
                                    <label for="telefono" class="mt-4 required">Teléfono</label>
                                    <div label for="prefijo_id"></label>
                                        <select required name="prefijo_id" id="prefijo_id" tabindex="5"
                                            class="form-select col-sm-3 col-md-5 d-inline-block">
                                            <option value=""> -Prefijo- </option>
                                            @foreach ($prefijos as $prefijo)
                                                <option value="{{ $prefijo['id'] }}">{{ $prefijo['prefijo'] }}</option>
                                            @endforeach
                                        </select>

                                        <input type="tel" class="form-control col-md-6 d-inline-block"
                                            id="telefono" name="telefono" placeholder="Ej: 5432132" tabindex="6"
                                            autocomplete="off" minlength="7" maxlength="7" required
                                            onkeypress="return numeros(event);">
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>
                                </div>


                                <div class="col">
                                    <label for="sede_id" class="mt-4 required">Sede</label>
                                    <select required name="sede_id" id="sede_id" tabindex="7"
                                        class="form-select col-md-12">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($sedes as $Sede)
                                            <option value="{{ $Sede['id'] }}">{{ $Sede['nombre_Sede'] }}</option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback">
                                        Por favor escoja una opción.
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="PNF_id" class="mt-4 required">PNF</label>
                                    <select required name="PNF_id" id="PNF_id" tabindex="6"
                                        class="form-select col-md-12">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($pnfs as $pnf)
                                            <option value="{{ $pnf['id'] }}">{{ $pnf['nombre_PNF'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor escoja una opción.
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="lider_id" class="mt-4 required">¿Es Líder?</label>
                                    <select required name="lider_id" id="lider_id" tabindex="7"
                                        class="form-select col col-md-12">
                                        <option value="">-- Escoja una opción --</option>
                                        <option value="2">No</option>
                                        <option value="1">Sí</option>
                                    </select>

                                    <div class="invalid-feedback">
                                        Por favor escoja una opción.
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer mt-4 justify-content-center">
                                <button type="submit" form="estudiantecrear" type="button"
                                    class="btn btn-primary">Guardar</button>
                                <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                            </div>
                </div>
            </div>
        </div>
        </form>

        <script>
            function crearEstudiante() {

                $("#modalEstudiante").modal('show');
            }
            //end function validarGuardar
        </script>
        <script>
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        </script>

        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">




        <!-- Modal Guardar-->
