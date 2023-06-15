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
                                        18 a 35 años
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                        36 a 55 años
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                            >55 años
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (2) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">2</span>. ¿Cuál es tu género?</label>
                                <div class="form-text mb-2">Seleccione una opcion.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                            Femenino
                                        </label>
                                    </div>                                  
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (3) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">3</span>. ¿Se le entrego sus equipos de proteccion personal(EPP)?</label>
                                <div class="form-text mb-2">Seleccione una opcion.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                            Ninguno
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                            Algunos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                            Todos
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <!-- pregunta (4) -->
                            <label class="form-label mb-0"><span class="fw-bold text-pink">4</span>. ¿Tiene alguno de estos estados?</label>
                            <div class="form-text mb-2">Seleccione una o varias opciones.</div>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Estrés
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    Depresión
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Fatiga mental
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    Ansioso
                                    </label>
                                </div>
                               </div> 
                               <hr>
                             <!-- pregunta (5) -->
                             <label class="form-label mb-0"><span class="fw-bold text-pink">5</span>. ¿¿Cuál es tu estado de ánimo actual?</label>
                            <div class="form-text mb-2">Seleccione una o varias opciones.</div>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Feliz
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    Triste
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Enojado
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                   Preocupado
                                    </label>
                                </div>
                               </div> 
                               <hr>
                            <!-- pregunta (6) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">6</span>. ¿Has identificado algún riesgo potencial en tu entorno de trabajo??</label>
                                <div class="form-text mb-2">Seleccione una opcion.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                        Sí, he identificado un riesgo potencial y he informado a mi supervisor.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                        Sí, he identificado un riesgo potencial y he tomado medidas preventivas para mitigarlo.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        No, no he identificado ningún riesgo potencial hasta el momento.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        No estoy seguro, necesito más información sobre cómo identificar riesgos en mi entorno de trabajo.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (5) -->
                            <label class="form-label mb-0"><span class="fw-bold text-pink">5</span>. ¿Tienes alguna condición de salud física?</label>
                            <div class="form-text mb-2">Seleccione una o varias opciones.</div>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Diabetes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    Asma
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Problemas de audición
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    Problemas de visión (miopía y/o astigmatismo)
                                    </label>
                                </div>
                               </div> 
                               <hr>
                            <!-- pregunta (8) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">8</span>. ¿Cuántos años de experiencia laboral tiene?</label>
                                <div class="form-text mb-2">Seleccione el rango de años de experiencia.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                        1> año 
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                        1 a 3 años
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        4 a 8 años
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        >8 años
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (9) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">9</span>. ¿Cuantos accidentes laborales has sufrido hasta el dia de hoy?</label>
                                <div class="form-text mb-2">Seleccione el rango de accidentes que has sufrido.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                        0 accidentes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                        1 a 5 accidentes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        6 a 10 accidentes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_4">
                                        <label class="form-check-label" for="radio_edad_4">
                                        >10  accidentes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (10) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">10</span>. ¿Cuál es tu nivel académico más alto alcanzado?</label>
                                <div class="form-text mb-2">Seleccione una opcion.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                        Primaria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                        Secundaria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        Técnica/universitario
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- pregunta (11) -->
                            <div class="mb-3">
                                <label class="form-label mb-0"><span class="fw-bold text-pink">11</span>. ¿Qué tipo de actividad realizas?</label>
                                <div class="form-text mb-2">Seleccione una acctividad.</div>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_1">
                                        <label class="form-check-label" for="radio_edad_1">
                                        Excavación
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_2">
                                        <label class="form-check-label" for="radio_edad_2">
                                        Demolición
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_3">
                                        <label class="form-check-label" for="radio_edad_3">
                                        Instalación de tubería
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio_edad" id="radio_edad_4">
                                        <label class="form-check-label" for="radio_edad_4">
                                        Encofrado
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <h>
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