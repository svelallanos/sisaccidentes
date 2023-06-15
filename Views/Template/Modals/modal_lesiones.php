<!-- Modal -->
<div class="modal fade" id="modal_lesiones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title title_mod fs-5 text-white" id="staticBackdropLabel"></h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_lesiones">
                <div class="modal-body">

                    <div class="row">

                        <input type="hidden" name="lesiones_id" id="lesiones_id">

                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                            <input type="text" class="form-control" name="lesiones_nombre" id="lesiones_nombre">
                        </div>
                        <div class="col-md-12 mb-0">
                            <div class="mb-0">
                                <label for="descripcion_accidente" class="fw-500 mb-0">DESCRIPCIÓN:</label>
                                <textarea class="form-control" name="lesiones_descripcion" id="lesiones_descripcion" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="col-md-6 m-0 px-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                    <div class="col-6 m-0 px-0 text-end">
                        <button type="submit" class="btn btn-primary" id="btn_save_mod">Guardar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>