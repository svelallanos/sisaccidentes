<?php headerPortal($data); ?>
<section class="container-section max-width bg-light">
    <div class="__container__res__alcaldia">
        <div class="__card__introduccion">
            <div class="__item__description">
                <h1>Resoluciones de Alcaldía</h1>
                <p>Las Resoluciones de Alcaldía aprueban y resuelven los asuntos de carácter administrativo de la Municipalidad.
                </p>
            </div>
            <div class="__item__img">
                <div class="__content__img">
                    <img src="<?= media() ?>/portalweb/images/img_resoluciones_alcaldia.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="__card__anios">
            <?php for ($i = 13; $i > -1; $i--) { ?>
                <div data-anio="20<?= $i + 10 ?>" class="__item__anio <?= ($i === 13) ? "active" : "" ?>">
                    <i class="feather-calendar"></i> <span>20<?= $i + 10 ?></span>
                </div>
            <?php } ?>
        </div>
        <div class="__card__res__alcaldia">
            <div class="__title">
                Resoluciones de Alcaldía&nbsp;<span class="__anio_select">2023</span>
            </div>
            <table id="tb_res_alcaldia" class="table table-hover table-striped mb-0 bg-white w-100">
                <thead>
                    <tr>
                        <th class="col-1 text-center">N°</th>
                        <th class="col-2">Documento</th>
                        <th class="col-6">Descripción</th>
                        <th class="col-2">Fecha Publicación</th>
                        <th class="col-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center fw-bold">1</td>
                        <td>R.A. Nº001-2023-A/MDNC</td>
                        <td>DESIGNAR al señor HENRY RIVERA VALLES, con DNI N°01004623, en el cargo de GERENTE MUNICIPAL, de la Municipalidad Distrital de Nueva Cajamarca.</td>
                        <td>06/06/2023 <span class="fw-bold">6:24 PM</span></td>
                        <td class="text-center"><a target="_blank" href="https://germarmu.files.wordpress.com/2014/09/resumen-cien-ac3b1os-de-soledad-mc3a1rquez.pdf" download style="color: red; font-size: 3rem; background-color: transparent;" class="border border-0 p-0"><i class="fa-solid fa-file-pdf fa-beat-fade"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php footerPortal($data); ?>