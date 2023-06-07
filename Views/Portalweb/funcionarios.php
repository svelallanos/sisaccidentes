<?php headerPortal($data); ?>
<section class="container-section max-width bg-light">
    <div class="__container__funcionarios">
        <div class="__card__introduccion">
            <div class="__item__description">
                <h1>Conoce a nuestro equipo de trabajo</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum temporibus dolorem eos, tempora fugiat nesciunt quod cupiditate recusandae eveniet, labore debitis repellat. Quidem dolore velit deserunt amet temporibus libero nostrum.
                </p>
                <div class="__view__detalle">
                    <a target="_blank" class="btn-bg-primary" href="https://www.gob.mx/cms/uploads/attachment/file/344484/Referencias_Habilidades_Gerenciales.pdf">Ver más</a>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_view_equipo"><i class="feather-play-circle"></i></a>
                </div>
            </div>
            <div class="__item__img">
                <div class="__content__img">
                    <img src="<?= media() ?>/portalweb/images/funcionarios/funcionarios_6.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="__card__title">
            <h1>Funcionarios Públicos de la Entidad</h1>
            <p>Jefes de las diferentes Oficinas, Divisiones y Áreas de la Municipalidad.
            </p>
        </div>
        <div class="__card__funcionarios">
            <div class="__card__filtro">
                <div class="__input__search">
                    <input type="text" placeholder="Buscar por nombres / cargos">
                </div>
                <div class="__button__search">
                    <button class="btn-bg-danger"><i class="feather-search"></i> Buscar</button>
                </div>
            </div>
            <div class="__card__contenido">

                <?php foreach ($data['funcionarios'] as $key => $value) { ?>
                    <div class="__card__user">
                        <div class="__background__img">
                            <img src="<?= media() ?>/portalweb/images/funcionarios/<?= $value['funcionario_perfil'] ?>" alt="">
                        </div>
                        <div class="__descripcion">
                            <h1><?= $value['funcionario_nombres'] ?>&nbsp<?= $value['funcionario_paterno'] ?>&nbsp<?= $value['funcionario_materno'] ?></h1>
                            <span><?= $value['funcionario_cargo'] ?></span>
                        </div>
                        <div class="__social">
                            <div class="__icon">
                                <a target="_blank" href="<?= $value['funcionario_link_facebook'] ?>"><i class="feather-facebook"></i></a>
                            </div>
                            <div class="__icon">
                                <a target="_blank" href="<?= $value['funcionario_link_ig'] ?>"><i class="feather-instagram"></i></a>
                            </div>
                            <div class="__icon">
                                <a target="_blank" href="<?= $value['funcionario_link_linkedln'] ?>"><i class="feather-linkedin"></i></a>
                            </div>
                            <div class="__icon">
                                <a target="_blank" href="<?= $value['funcionario_link_twitter'] ?>"><i class="feather-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Modals open Youtube -->
    <div class="modal fade" id="modal_view_equipo" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h1 class="modal-title" id="staticBackdropLabel">EQUIPO DE TRABAJO</h1>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <iframe src="https://www.youtube.com/embed/cJUXxjOeoCk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php footerPortal($data); ?>