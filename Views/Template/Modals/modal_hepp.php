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
                        <div class="col-md-10 mb-3">
                            <label class="small mb-0 fw-500">EPP:</label>
                            <select required class="form-control" name="cbxEpp" id="cbxEpp">
                                <option value="" disabled selected>Seleccione una opcion</option>
                                <?php
                                $epps = $data['page_epps'];
                                $cadena = null;
                                foreach ($epps as $key => $value) {
                                    $cadena .= '<optgroup label="' . $value["epp_nombre"] . '">';
                                    foreach ($value["talla"] as $cont => $val) {
                                        $cadena .= "<option value='" . $val["talla_id"] . "'>" . $val["talla_nombre"] . "</option>";
                                    }
                                    $cadena .= '</optgroup>';
                                }
                                echo $cadena;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small mb-0 fw-500">CANTIDAD:</label>
                            <input type="number" min="1" required class="form-control" name="txtCantidad" id="txtCantidad">
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
                <h1 class="modal-title title_mod fs-5" style="color: dodgerblue;" id="staticBackdropLabel">ACTUALIZAR EPP</h1>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_update">
                <input type="hidden" name="idAnimo" id="idAnimo" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 mb-3">
                            <label class="small mb-0 fw-500">NOMBRE :</label>
                            <input required type="text" class="form-control" name="txtNameUpd" id="txtNameUpd">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="small mb-0 fw-500">PESO:</label>
                            <input required type="number" min="0" class="form-control" name="txtPesoUpdt" id="txtPesoUpdt">
                        </div>
                        <div class="col-md-12 mb-0">
                            <div class="mb-0">
                                <label for="descripcion_accidente" class="fw-500 mb-0">DESCRIPCIÓN:</label>
                                <textarea required class="form-control" name="txtDescripcionUdpt" id="txtDescripcionUdpt" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="small mb-0 fw-500">ESTADO:</label>
                            <select required class="form-control" name="cbxEstadoUpdt" id="cbxEstadoUpdt">
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
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