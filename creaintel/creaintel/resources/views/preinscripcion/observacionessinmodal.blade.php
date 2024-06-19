<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa-solid fa-solid fa-file-signature"></i>
                            Observaciones
                        </h3>
                    </div>

                    <div class="card-body ml-3">

                        <form action="/preinscripcion/{{$preinscripcion->id}}" method="POST">
                            <table>
                                @csrf
                                @method('PUT')
                                <tr>
                                    <div class="form-group">
                                        <label for="observaciones" class="mt-4">Observaciones</label>
                                        <textarea class="form-control col-md-11" id="observaciones" name="observaciones" maxlength="200" rows="2" placeholder="Ej: " value="{{$preinscripcion->observaciones}}" required></textarea>
                                    </div>
                                </tr>
                            </table>
                    </div>


                    <div class=" card-footer">

                        <button type="submit" class="btn btn-primary mr-3" tabindex="4" onclick="javascript:return popup_confirmar();">Guardar</button>
                        <a href="/preinscripcion" class="btn btn-secondary" tabindex="3" onclick="javascript:return popup_back();">Cancelar</a>
                    </div>

                    </form>