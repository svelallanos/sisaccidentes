<!-- Modal -->
<div class="modal fade" id="modal_lesiones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00273C">
                <h1 class="modal-title title_mod fs-5" style="color: dodgerblue;" id="staticBackdropLabel">AGREGAR LESIONES</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_lesiones">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="lesiones_id" id="lesiones_id">
                        <div class="col-md-5 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                            <input required type="text" class="form-control" name="lesiones_nombre" id="lesiones_nombre">
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="small mb-0 fw-500">ACCIDENTES:</label>
                            <select required class="form-select" name="accidentes_id" id="accidentes_id">
                                <option value="" selected>Seleccione</option>
                                <?php foreach ($data['accidentes'] as $key => $value) { ?>
                                    <option value="<?= $value['accidentes_id'] ?>"><?= $value['accidentes_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small mb-0 fw-500">PESO:</label>
                            <input required type="number" min="0" class="form-control" name="lesiones_peso" id="lesiones_peso">
                        </div>
                        <div class="col-md-12 mb-0">
                            <div class="mb-0">
                                <label for="descripcion_accidente" class="fw-500 mb-0">DESCRIPCIÓN:</label>
                                <textarea required class="form-control" name="lesiones_descripcion" id="lesiones_descripcion" rows="3"></textarea>
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
<div class="modal fade" id="emodal_lesiones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 fw-600" id="staticBackdropLabel">EDITAR LESIONES</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="eform_lesiones" data-lesiones_id="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                            <input required type="text" class="form-control" name="elesiones_nombre" id="elesiones_nombre">
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="small mb-0 fw-500">ACCIDENTES:</label>
                            <select required class="form-select" name="eaccidentes_id" id="eaccidentes_id">
                                <option value="" selected>Seleccione</option>
                                <?php foreach ($data['accidentes'] as $key => $value) { ?>
                                    <option value="<?= $value['accidentes_id'] ?>"><?= $value['accidentes_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small mb-0 fw-500">PESO:</label>
                            <input required type="number" min="0" class="form-control" name="elesiones_peso" id="elesiones_peso">
                        </div>
                        <div class="col-md-12 mb-0">
                            <div class="mb-0">
                                <label for="descripcion_accidente" class="fw-500 mb-0">DESCRIPCIÓN:</label>
                                <textarea required class="form-control" name="elesiones_descripcion" id="elesiones_descripcion" rows="3"></textarea>
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

<div class="modal fade" id="vmodal_lesiones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h1 class="modal-title fs-5 fw-600 text-white" id="staticBackdropLabel">LESIÓN</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label class="small mb-0 fw-500">NOMBRE LESIÓN:</label>
                        <input disabled type="text" class="form-control bg-white" name="vlesiones_nombre" id="vlesiones_nombre">
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="small mb-0 fw-500">ACCIDENTES:</label>
                        <select disabled class="form-select bg-white" name="vaccidentes_id" id="vaccidentes_id">
                            <option value="" selected>Seleccione</option>
                            <?php foreach ($data['accidentes'] as $key => $value) { ?>
                                <option value="<?= $value['accidentes_id'] ?>"><?= $value['accidentes_nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="small mb-0 fw-500">PESO:</label>
                        <input disabled type="number" min="0" class="form-control bg-white" name="vlesiones_peso" id="vlesiones_peso">
                    </div>
                    <div class="col-md-12 mb-0">
                        <div class="mb-0">
                            <label for="descripcion_accidente" class="small mb-0 fw-500">DESCRIPCIÓN:</label>
                            <textarea disabled class="form-control bg-white" name="vlesiones_descripcion" id="vlesiones_descripcion" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>