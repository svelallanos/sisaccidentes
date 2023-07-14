<!-- Modal Registro-->
<div class="modal fade" id="modal_save" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00273C">
                <h1 class="modal-title title_mod fs-5" style="color: dodgerblue;" id="staticBackdropLabel">ASIGNAR EPP</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_save">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">USUARIO :</label>
                            <select required class="form-control" name="cbxUser" id="cbxUser">
                                <option value="" disabled selected>Seleccione una opcion</option>
                                <?php
                                $users = $data['page_user'];
                                $cadena = "";
                                foreach ($users as $key => $value) {
                                    $cadena .= "<option value='" . $value["usuarios_id"] . "' >" . $value["usuarios_nombres"] . " " . $value["usuarios_paterno"] . " " . $value["usuarios_materno"] . "</option>";
                                }
                                echo $cadena;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small mb-0 fw-500">ACCIDENTE:</label>
                            <select required class="form-control" name="cbxAccidentes" id="cbxAccidentes">
                                <option value="" disabled selected>Seleccione una opcion</option>
                                <?php foreach ($data['accidentes'] as $key => $value) { ?>
                                    <option value="<?= $value['accidentes_id'] ?>"><?= $value['accidentes_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small mb-0 fw-500">LESION:</label>
                            <select required class="form-control" name="cbxLesiones" id="cbxLesiones">
                               

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