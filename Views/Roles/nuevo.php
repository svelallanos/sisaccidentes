<?php headerAdmin($data) ?>
<main>
  <form id="form_rol_permisos">
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
              <a class="btn btn-sm btn-indigo-soft text-indigo" href="<?= base_url() ?>Roles">
                <i class="feather-file-text me-1"></i>
                Cancelar
              </a>
              <button type="submit" class="btn btn-sm btn-light text-primary">
                <i class="me-1" data-feather="plus"></i>
                Guardar
              </button>
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
            <!-- lift : Sirve para dar movimiento a las cards y demas estilos -->
            <div class="card-body">
              <div class="mensaje"></div>
              <div class="col-12">
                <div class="row">
                  <label class="mb-2">Nombre :</label>
                  <div class="col-8 col-sm-7 col-md-6 col-xl-4 col-xxl-3 __nombre_rol">
                    <div class="input-group input-group-joined">
                      <input name="input_rol" autocomplete="off" required class="form-control pe-0" type="text" placeholder="Ingresar el nombre del rol">
                      <span class="input-group-text">
                        <i class="feather-file-text"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12">
                <label class="mt-3 mb-2">Permisos :</label>
                <?php
                if ($data['lista_permisos_rol'] === []) { ?>
                  No hay ningún permiso
                  <?php } else {
                  $auxGrupo = 'ASDBUDWD';
                  foreach ($data['lista_permisos_rol'] as $key => $value) {
                    if ($auxGrupo !== $value['grupo_permiso_id']) {
                      $auxGrupo = $value['grupo_permiso_id'];
                  ?>
                      <div class="row mb-2">
                        <div class="col-md-12">
                          <div class="alert fw-bold alert-info alert-solid py-2" role="alert"><?= $value['grupo_permiso_nombre'] ?></div>
                        </div>
                        <div class="row px-5">
                        <?php } ?>
                        <div class="col-12 col-sm-6 col-md-4">
                          <div class="form-check">
                            <input <?= ($value['permiso_estado'] === '2') ? 'disabled' : '' ?> class="form-check-input" name="permiso_<?= $value['permiso_id'] ?>" value="<?= $value['permiso_id'] ?>" id="permiso_<?= $value['permiso_id'] ?>" type="checkbox" value="">
                            <label class="form-check-label <?= ($value['permiso_estado'] === '2') ? 'text-decoration-line-through text-danger' : '' ?>" for="permiso_<?= $value['permiso_id'] ?>"><?= $value['permiso_nombre'] ?></label>
                          </div>
                        </div>
                        <?php
                        if (isset($data['lista_permisos_rol'][($key + 1)]['grupo_permiso_id']) && $auxGrupo !== $data['lista_permisos_rol'][($key + 1)]['grupo_permiso_id']) { ?>
                        </div>
                      </div>

                <?php }
                      }
                    } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>
<?php footerAdmin($data) ?>