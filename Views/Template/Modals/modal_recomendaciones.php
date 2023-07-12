<!-- Modal Registro-->
<div class="modal fade" id="modal_save" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00273C">
                <h1 class="modal-title title_mod fs-5" style="color: dodgerblue;" id="staticBackdropLabel">AGREGAR RECOMENDACION</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">RECOMENDACION:</label>
                            <textarea required class="form-control" name="recomendacion" id="recomendacion" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">PESO:</label>
                            <select required class="form-control" name="tipo" id="tipo">
                                <option value="" selected disabled>Seleccione una opcion</option>
                                <option value="Bajo">Bajo</option>
                                <option value="Medio">Medio</option>
                                <option value="Alto">Alto</option>
                            </select>
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
<!--Fin Modal Registro-->
<!-- Modal Actualizar-->
<div class="modal fade" id="modal_update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00273C">
                <h1 class="modal-title title_mod fs-5" style="color: dodgerblue;" id="staticBackdropLabel">ACTUALIZAR RECOMENDACION</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_update">
                <input type="hidden" name="idAnimo" id="idAnimo" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE ESTADO PSICOLOGICO:</label>
                            <textarea required class="form-control" name="txtNameUpd" id="txtNameUpd" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">ESTADO:</label>
                            <select required class="form-control" name="cbxEstadoUpdt" id="cbxEstadoUpdt">
                                <option value="" selected disabled>Seleccione una opcion</option>
                                <option value="Bajo">Bajo</option>
                                <option value="Medio">Medio</option>
                                <option value="Alto">Alto</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-6 m-0 px-0 text-end">
                        <button type="submit" class="btn btn-primary" id="btn_save_mod"><i class="feather-plus-circle"></i>&nbsp;ACTUALIZAR</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<!--Fin Modal Actualizar-->