<?php headerAdmin($data) ?>
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title fw-700 text-primary">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            <?= !empty($data['page_name']) ? $data['page_name'] : 'Sin Nombre' ?>
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <!-- <a class="btn btn-sm btn-danger-soft text-danger" href="#">
                            <i class="feather-file-text me-1"></i>
                            Reporte
                        </a> -->
                        <!-- <button type="button" class="btn btn-sm btn-light text-primary" data-bs-toggle="modal" data-bs-target="#modal_accidentes">
                            <i class="me-1" data-feather="plus"></i>
                            Nuevo
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fw-bold" style="background-color: #00273c; color: #00b4fe;">Para realizar el Test responde la siguientes preguntas.</div>
                    <div class="card-body">
                        <form id="formTest" name="formTest">
                            <input type="hidden" name="idUser" value="<?= $_SESSION['portal']['usuario_id'] ?>">
                            <div class="row">
                                <!-- pregunta (1) EDAD-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="edad"><span class="fw-bold text-pink">1</span>. ¿Cuantos años tienes?</label>
                                    <div class="form-text mb-2">Ingrese su edad.</div>
                                    <div class="col-md-12">
                                        <input type="range" class="form-range" name="edad" id="edad" min="18" max="100" required>
                                    </div>
                                    <p class="text-center" id="valEdad">00</p>
                                </div>
                                <hr>
                                <!-- pregunta (2) SEXO C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="genero_1"><span class="fw-bold text-pink">2</span>. ¿Cuál es tu género?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_genero'])) {
                                            foreach ($data['page_genero'] as $key => $value) {
                                                $input .= ' <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="' . $value['genero_nombre'] . '" value="Masculino" id="genero_' . $key . '">
                                                            <label class="form-check-label" for="genero_' . $key . '">
                                                                ' . $value['genero_nombre'] . '
                                                            </label>
                                                        </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (3) ACADEMICO C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="academico_2"><span class="fw-bold text-pink">3</span>. ¿Cual es su nivel academico?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_academico'])) {
                                            foreach ($data['page_academico'] as $key => $value) {
                                                $input .= '  <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="academico" value="' . $value["nivel_nombre"] . '" id="academico_' . $key . '">
                                                                <label class="form-check-label" for="academico_' . $key . '">
                                                                    ' . $value["nivel_nombre"] . '
                                                                </label>
                                                            </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (4) CONDICION FISICA C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="condicion_2"><span class="fw-bold text-pink">4</span>. ¿Tiene alguna condicion de salud física?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_fisico'])) {
                                            foreach ($data['page_fisico'] as $key => $value) {
                                                $input .= ' <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="condicion" value="' . $value["estadofs_nombre"] . '" id="condicion_' . $key . '">
                                                                <label class="form-check-label" for="condicion_' . $key . '">
                                                                    ' . $value["estadofs_nombre"] . '
                                                                </label>
                                                            </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (5) CARGO EMPRESA C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="cargo_2"><span class="fw-bold text-pink">5</span>. ¿Qué tipo de cargo tiene en la empresa?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_cargo'])) {
                                            foreach ($data['page_cargo'] as $key => $value) {
                                                $input .= ' <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="cargo" value="' . $value["cargo_nombre"] . '" id="cargo_' . $key . '">
                                                                <label class="form-check-label" for="cargo_' . $key . '">
                                                                    ' . $value["cargo_nombre"] . '
                                                                </label>
                                                            </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (6) ACTIVIDAD LABORAL C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="laboral_2"><span class="fw-bold text-pink">6</span>. ¿Cuál es su actividad laboral?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_laboral'])) {
                                            foreach ($data['page_laboral'] as $key => $value) {
                                                $input .= ' <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="laboral" value="' . $value["actividades_nombre"] . '" id="laboral_' . $key . '">
                                                                <label class="form-check-label" for="laboral_' . $key . '">
                                                                    ' . $value["actividades_nombre"] . '
                                                                </label>
                                                            </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (7) EXPERIENCIA LABORAL C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="experiencia_2"><span class="fw-bold text-pink">7</span>. ¿Cuantos años de experiencia en esa actividad tiene?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="experiencia" value="0" id="experiencia_1">
                                            <label class="form-check-label" for="experiencia_1">
                                                0 años
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="experiencia" value="2" id="experiencia_2">
                                            <label class="form-check-label" for="experiencia_2">
                                                1-3 años
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="experiencia" value="5" id="experiencia_3">
                                            <label class="form-check-label" for="experiencia_3">
                                                4-8 años
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="experiencia" value="9" id="experiencia_4">
                                            <label class="form-check-label" for="experiencia_4">
                                                >8 años
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (8) ESTADO EMOCIONAL C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="estado_2"><span class="fw-bold text-pink">8</span>. ¿Como se siente emocionalmente durante sus labores actualmente?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_animo'])) {
                                            foreach ($data['page_animo'] as $key => $value) {
                                                $input .= ' <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="estado" value="' . $value["estadoan_nombre"] . '" id="estado_' . $key . '">
                                                                <label class="form-check-label" for="estado_' . $key . '">
                                                                    ' . $value["estadoan_nombre"] . '
                                                                </label>
                                                            </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (9) ESTADO TRABAJADOR C-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="estadoTrabajo_2"><span class="fw-bold text-pink">9</span>. ¿Usted ha sentido algunos de estos estados por el trabajo?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <?php
                                        $input = null;
                                        if (!empty($data['page_psicologico'])) {
                                            foreach ($data['page_psicologico'] as $key => $value) {
                                                $input .= ' <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="estadoTrabajo" value="' . $value["estadopsc_nombre"] . '" id="estadoTrabajo_' . $key . '">
                                                                <label class="form-check-label" for="estadoTrabajo_' . $key . '">
                                                                    ' . $value["estadopsc_nombre"] . '
                                                                </label>
                                                            </div>';
                                            }
                                            echo $input;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (10) ACCIDENTE LABORAL-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="accidenteLaboral_2"><span class="fw-bold text-pink">10</span>. ¿Usted ha sufrido algún accidente laboral?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="accidenteLaboral" value="0" id="accidenteLaboral_1">
                                            <label class="form-check-label" for="accidenteLaboral_1">
                                                0
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="accidenteLaboral" value="1" id="accidenteLaboral_2">
                                            <label class="form-check-label" for="accidenteLaboral_2">
                                                1-3
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="accidenteLaboral" value="4" id="accidenteLaboral_3">
                                            <label class="form-check-label" for="accidenteLaboral_3">
                                                4-8
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="accidenteLaboral" value="9" id="accidenteLaboral_4">
                                            <label class="form-check-label" for="accidenteLaboral_4">
                                                >9
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- pregunta (11) FACILIDAD RIESGOS ENTORNOLABORAL-->
                                <div class="mb-3">
                                    <label class="form-label mb-0" for="entornoLaboral_2"><span class="fw-bold text-pink">11</span>. ¿Usted tiene facilidad para identificar los riesgos en su entorno laboral?</label>
                                    <div class="form-text mb-2">Seleccione una opcion.</div>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entornoLaboral" value="Nunca" id="entornoLaboral_1">
                                            <label class="form-check-label" for="entornoLaboral_1">
                                                Nunca
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entornoLaboral" value="Casi nunca" id="entornoLaboral_2">
                                            <label class="form-check-label" for="entornoLaboral_2">
                                                Casi nunca
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entornoLaboral" value="A veces" id="entornoLaboral_3">
                                            <label class="form-check-label" for="entornoLaboral_3">
                                                A veces
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entornoLaboral" value="Siempre" id="entornoLaboral_4">
                                            <label class="form-check-label" for="entornoLaboral_4">
                                                Siempre
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-primary" type="submit">Enviar</button>
                                <h>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data);
getModal('modal_accidentes', $data);
?>