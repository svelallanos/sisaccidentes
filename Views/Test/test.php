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
                        <div class="row">
                            <!-- pregunta (1) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">1</span>. ¿Cuantos años tienes?</label>
                                <div class="form-text mb-2">Seleccione el rango de tu edad.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                            Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                            Default checked radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                            Default checked radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (2) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">2</span>. ¿Cuantos años tienes?</label>
                                <div class="form-text mb-2">Seleccione el rango de tu edad.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                            Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                            Default checked radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                            Default checked radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (3) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">3</span>. ¿Cuantos años tienes?</label>
                                <div class="form-text mb-2">Seleccione el rango de tu edad.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                            Default radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                            Default checked radio
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                            Default checked radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (4) -->
                            <label class="form-label mb-0"><span class="fw-bold text-pink">4</span>. ¿Cuantos años tienes?</label>
                            <div class="form-text mb-2">Seleccione el rango de tu edad.</div>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Default checkbox
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Checked checkbox
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data);
getModal('modal_accidentes', $data);
?>