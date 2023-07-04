<!-- Modal -->
<div class="modal fade" id="modal_capacitaciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00273C">
                <h1 class="modal-title title_mod fs-5" style="color: dodgerblue;" id="staticBackdropLabel">AGREGAR CAPACITACIONES</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_capacitaciones">
                <div class="modal-body">
                    <div class="row g-1">
                        <input type="hidden" name="capacitaciones_id" id="capacitaciones_id">
                        <div class="col-md-10 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                            <input required type="text" class="form-control" name="capacitaciones_nombre" id="capacitaciones_nombre">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small mb-0 fw-500">PESO:</label>
                            <input required type="number" min="0" class="form-control" name="capacitaciones_peso" id="capacitaciones_peso">
                        </div>
                        <div class="col-md-12 mb-0">
                            <div class="mb-0">
                                <label for="descripcion_accidente" class="fw-500 mb-0">DESCRIPCIÓN:</label>
                                <textarea required class="form-control" name="capacitaciones_descripcion" id="capacitaciones_descripcion" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-6 m-0 px-0 text-end">
                        <button type="submit" class="btn btn-primary" id="btn_save_mod"><i class="feather-plus-circle"></i>&nbsp;Guardar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="emodal_capacitaciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 fw-600" id="staticBackdropLabel">EDITAR CAPACITACIONES</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="eform_capacitaciones" data-capacitaciones_id="">
                <div class="modal-body">
                    <div class="row g-1">
                        <div class="col-md-10 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                            <input required type="text" class="form-control" name="ecapacitaciones_nombre" id="ecapacitaciones_nombre">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small mb-0 fw-500">PESO:</label>
                            <input required type="number" min="0" class="form-control" name="ecapacitaciones_peso" id="ecapacitaciones_peso">
                        </div>
                        <div class="col-md-12 mb-0">
                            <div class="mb-0">
                                <label for="descripcion_accidente" class="fw-500 mb-0">DESCRIPCIÓN:</label>
                                <textarea required class="form-control" name="ecapacitaciones_descripcion" id="ecapacitaciones_descripcion" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-6 m-0 px-0 text-end">
                        <button type="submit" class="btn btn-primary" id="btn_save_mod"><i class="feather-plus-circle"></i>&nbsp;Actualizar</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="vmodal_capacitaciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h1 class="modal-title fs-5 fw-600 text-white" id="staticBackdropLabel">CAPACITACIONES</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-1">
                    <div class="col-md-10 mb-3">
                        <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                        <input disabled type="text" class="form-control bg-white" name="vcapacitaciones_nombre" id="vcapacitaciones_nombre">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="small mb-0 fw-500">PESO:</label>
                        <input disabled type="number" min="0" class="form-control bg-white" name="vcapacitaciones_peso" id="vcapacitaciones_peso">
                    </div>
                    <div class="col-md-12 mb-0">
                        <div class="mb-0">
                            <label for="descripcion_accidente" class="small mb-0 fw-500">DESCRIPCIÓN:</label>
                            <textarea disabled class="form-control bg-white" name="vcapacitaciones_descripcion" id="vcapacitaciones_descripcion" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>