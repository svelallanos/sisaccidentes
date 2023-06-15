<div id="layoutSidenav_nav">
  <nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu" style='background-image: url("<?= media() ?>/images/fondos/fondo_aside.png");'>
      <div class="nav accordion" id="accordionSidenav">
        <!-- Sidenav Menu Heading (Account)-->
        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
        <div class="sidenav-menu-heading d-sm-none">Account</div>
        <!-- Sidenav Link (Alerts)-->
        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
        <a class="nav-link d-sm-none" href="#!">
          <div class="nav-link-icon"><i data-feather="bell"></i></div>
          Alerts
          <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
        </a>
        <!-- Sidenav Link (Messages)-->
        <!-- * * Note: * * Visible only on and above the sm breakpoint-->
        <a class="nav-link d-sm-none" href="#!">
          <div class="nav-link-icon"><i data-feather="mail"></i></div>
          Messages
          <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
        </a>
        <!-- Boton de Inicio -->
        <a class="nav-link mt-3 bg-light fw-700" href="<?= base_url() ?>Inicio">
          <div class="nav-link-icon"><i class="feather-slack"></i></div>
          Inicio
        </a>
        <!-- Sidenav Menu Heading (Core)-->
        <?php if (verificarPermiso($data, 1) || verificarPermiso($data, 2) || verificarPermiso($data, 3) || verificarPermiso($data, 4)) { ?>
          <div class="sidenav-menu-heading pt-2">Panel Administrador</div>
          <!-- Sidenav Accordion (Dashboard)-->
          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
            <div class="nav-link-icon"><i class="feather-settings"></i></div>
            Configuraciones
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
              <?php if (verificarPermiso($data, 2)) { ?>
                <a class="nav-link" href="<?= base_url() ?>Usuarios">
                  Usuarios
                  <span class="badge bg-primary-soft text-primary ms-auto">Admin</span>
                </a>
              <?php } ?>
              <?php if (verificarPermiso($data, 1)) { ?>
                <a class="nav-link" href="<?= base_url() ?>Roles">
                  Roles
                  <span class="badge bg-primary-soft text-primary ms-auto">Admin</span>
                </a>
              <?php } ?>
              <?php if (verificarPermiso($data, 3)) { ?>
                <a class="nav-link" href="<?= base_url() ?>Usuarios/bloqueos">
                  Bloqueos
                  <span class="badge bg-primary-soft text-primary ms-auto">Admin</span>
                </a>
              <?php } ?>
              <?php if (verificarPermiso($data, 4)) { ?>
                <a class="nav-link" href="<?= base_url() ?>Usuarios/permisos_personalizados">
                  Permisos Personalizados
                  <span class="badge bg-primary-soft text-primary ms-auto">Admin</span>
                </a>
              <?php } ?>
            </nav>
          </div>
        <?php } ?>

        <?php if (verificarPermiso($data, 6) || verificarPermiso($data, 7)) { ?>
          <div class="sidenav-menu-heading">Adeli</div>
          <!-- Sidenav Accordion (Pages)-->
          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <div class="nav-link-icon"><i data-feather="grid"></i></div>
            Alimentar DB
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
              <?php if (verificarPermiso($data, 6)) { ?>
                <a class="nav-link" href="<?= base_url() ?>Accidentes">
                  Accidentes
                  <span class="badge bg-primary-soft text-primary ms-auto">Admin</span>
                </a>
              <?php } ?>
              <?php if (verificarPermiso($data, 7)) { ?>
                <a class="nav-link" href="<?= base_url() ?>Actividades">
                  Actividades
                  <span class="badge bg-primary-soft text-primary ms-auto">Admin</span>
                </a>
              <?php } ?>
            </nav>
          </div>
        <?php } ?>
        <?php if (verificarPermiso($data, 9) || verificarPermiso($data, 10)) { ?>
          <div class="sidenav-menu-heading">PANEL USUARIO</div>
          <?php if (verificarPermiso($data, 9)) { ?>
            <a class="nav-link" href="charts.html">
              <div class="nav-link-icon"><i class="feather-file-text"></i></div>
              Test Accidentes
            </a>
          <?php } ?>
          <?php if (verificarPermiso($data, 10)) { ?>
            <a class="nav-link" href="charts.html">
              <div class="nav-link-icon"><i class="feather-folder"></i></div>
              Historial Test
            </a>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
      <div class="sidenav-footer-content">
        <div class="sidenav-footer-subtitle text-success badge bg-success-soft mb-2">En Línea</div>
        <div class="sidenav-footer-title fw-700 text-body">Gestión: <span class="text-pink">2023 - 2026</span></div>
      </div>
    </div>
  </nav>
</div>