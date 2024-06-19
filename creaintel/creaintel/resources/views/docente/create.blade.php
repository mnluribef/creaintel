    <!-- Modal Guardar -->

    <div class="modal" tabindex="-1" role="dialog" id="modalDocente">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title badge badge-primary"><i class="fa-solid fa-plus fa-fw"></i>AGREGAR DOCENTE</h5>
                    <!--                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="/docente" method="POST" id="docentecrear" class="needs-validation" novalidate>
                        @csrf
                        <fieldset class="border border-primary border-2 p-3 rounded">

                            <h4 class="text-center text-primary">Datos del Docente</h4>

                            <label for="docente_ci" class="mt-4 required">Cédula</label>
                            <input type="tel" class="form-control col-md-2" id="docente_ci" name="docente_ci"
                                placeholder="Ej: 25617543" tabindex="1" autocomplete="off" minlength="7"
                                maxlength="8" onkeypress="return numeros(event);" required>
                            <div class="invalid-feedback">
                                Por favor rellene este campo.
                            </div>

                            <div class="form-row">
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
                                    <input type="text" class="form-control col-md-12" id="apellido" name="apellido"
                                        placeholder="Ej: González" maxlength="20" tabindex="3"
                                        onkeypress="return txt(event);" required>
                                    <div class="invalid-feedback">
                                        Por favor rellene este campo.
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="telefono" class="mt-4 required">Teléfono</label>
                                    <div label for="prefijo_id"></label>
                                        <select name="prefijo_id" id="prefijo_id" tabindex="4" required
                                            class="form-select col-sm-3 col-md-5 d-inline-block">
                                            <option value=""> -Prefijo- </option>
                                            @foreach ($prefijos as $prefijo)
                                                <option value="{{ $prefijo['id'] }}">{{ $prefijo['prefijo'] }}</option>
                                            @endforeach
                                        </select>

                                        <input type="tel" class="form-control col-md-6 d-inline-block"
                                            id="telefono" name="telefono" placeholder="Ej: 5432132" tabindex="5"
                                            autocomplete="off" minlength="7" maxlength="7" required
                                            onkeypress="return numeros(event);">
                                        <div class="invalid-feedback">
                                            Por favor rellene este campo.
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <label for="sede_id" class="mt-4 required">Sede</label>
                                    <select required name="sede_id" id="sede_id" tabindex="7"
                                        class="form-select col-md-9">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($sedes as $sede)
                                            <option value="{{ $sede['id'] }}">{{ $sede['nombre_Sede'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor escoja una opción.
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="PNF_id" class="mt-4 required">PNF</label>
                                    <select required name="PNF_id" id="PNF_id" tabindex="6"
                                        class="form-select col-md-9">
                                        <option value="">-- Escoja una opción --</option>
                                        @foreach ($pnfs as $pnf)
                                            <option value="{{ $pnf['id'] }}">{{ $pnf['nombre_PNF'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor escoja una opción.
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer mt-4 justify-content-center">
                                <button type="submit" form="docentecrear" type="button"
                                    class="btn btn-primary">Guardar</button>
                                <a class="btn btn-secondary" data-bs-dismiss="modal" tabindex="5">Cancelar</a>
                            </div>
                </div>
            </div>
        </div>
        </form>



        <script>
            function crearDocente() {
                $("#modalDocente").modal('show');
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

        <!-- Modal Guardar-->

        <link href="{{ asset('/css/admin_custom.css') }}" rel="stylesheet">
