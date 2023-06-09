<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0 text-white fs-4">
            <i class="fa fa-building text-primary me-3"></i>GRUPO COBBA E.I.R.L.
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-3 py-lg-0">
            <a href="<?= base_url() ?>" class="nav-item nav-link active">Inicio</a>
            <a href="<?= base_url() ?>Portalweb/nosotros" class="nav-item nav-link">Nosotros</a>
            <a href="service.html" class="nav-item nav-link">Servicios</a>
            <a href="service.html" class="nav-item nav-link">Contacto</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="appointment.html" class="dropdown-item">Appointment</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#modal_login" style="cursor:pointer;">Login&nbsp;<i class="fa-solid fa-right-to-bracket fa-beat-fade"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Modal -->
<div class="modal fade" id="modal_login" tabindex="-1" aria-labelledby="modal_loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="modal_loginLabel">Iniciar Sesión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                        <input type="text" placeholder="Ingrese usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                        <input type="password" placeholder="Ingrese su contraseña" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Acepto términos y condiciones</label>
                    </div>
                    <div class="mb-3 form-label">
                        <a href="#">Crear nueva cuenta.</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>