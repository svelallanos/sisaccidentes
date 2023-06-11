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
                        <a class="btn btn-sm btn-danger-soft text-danger" href="#">
                            <i class="feather-file-text me-1"></i>
                            Reporte
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="<?= base_url() ?>Roles/Nuevo">
                            <i class="me-1" data-feather="plus"></i>
                            Nuevo Rol
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-xs-12 col-lg-12 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <table id="tb_roles" class="table-bordered dataTable table-striped table-hover table-sm w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">N°</th>
                                    <th>NOMBRE</th>
                                    <th class="text-center">ESTADO</th>
                                    <th class="text-center">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($data['lista_roles'] !== []) {
                                    foreach ($data['lista_roles'] as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= ($key + 1) ?></td>
                                            <td><?= $value['roles_nombre'] ?></td>
                                            <td class="text-center">
                                                <?= ($value['roles_estado'] == '1') ? '<span class="badge border rounded-pill bg-success">Activo</span>' : '<span class="badge border rounded-pill bg-danger">Inactivo</span>' ?>
                                            </td>
                                            <td class="text-center"><a href="<?= base_url() ?>Roles/editar?roles_id=<?= $value['roles_id'] ?>" class="btn btn-info btn-sm btn-icon"><i class="fa-solid fa-pencil"></i></a>
                                                <?php
                                                if ($value['roles_id'] != '1' && $value['roles_id'] != '2' && $value['roles_id'] != '3' && $value['roles_id'] != '4') { ?>
                                                    <a data-roles_id="<?= $value['roles_id'] ?>" class="btn btn-danger eliminar_rol btn-sm btn-icon"><i class="fa-solid fa-trash-can"></i></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-none d-xl-block col-lg-3 p-3 border border-3 border-info rounded bg-white m-auto mt-0">
                <div class="row">
                    <div class="col-md-12">
                        <img class="shadow roles_img" src="<?= media() ?>/images/roles_1.png" alt="">
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-center p-3 pb-2 m-0 text-primary"><strong>Roles</strong></h3>
                        <p class="text-center m-0">Recuerda que el nombre de los roles no deben ser iguales, ni similares, para evitar confundirlos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data) ?>