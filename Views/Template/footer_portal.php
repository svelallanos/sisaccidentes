    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-white mb-4 ">
                        <i class="fa fa-building text-primary me-3"></i>GRUPO COBBA E.I.R.L.

                    </h1>
                    <p>
                    El éxito consiste en ir de fracaso en fracaso sin perder el entusiasmo. 
                    Nadie está a salvo de las derrotas.
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-primary me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">DIRECCION</h4>
                    <p>
                        <i class="fa fa-map-marker-alt me-3"></i>R. MARISCAL CACERES NRO. 179 P.J. POETA JOSE GALVEZ BARRENE,
                         LIMA,LIMA,VILLA MARIA DEL TRIUNFO       
                    </p>
                    <p><i class="fa fa-phone-alt me-3"></i>+51 98889***</p>
                    <p><i class="fa fa-envelope me-3"></i>cobbadoris@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">ENLACES RAPIDOS</h4>
                    <a class="btn btn-link" href="<?= base_url() ?>Portalweb/nosotros">Sobre nosotros</a>
                    
                    <a class="btn btn-link" href="<?= base_url() ?>Portalweb/nosotros">Nuestros servicios</a>
                    <!--  <a class="btn btn-link" href="">Términos y condiciones</a>
                    <a class="btn btn-link" href="">Apoyo</a>
<a class="btn btn-link" href="">Contacta con nosotros </a>
                -->
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p> -->
                    <div class="position-relative mx-auto" style="max-width: 400px">
                       <!-- <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email" />
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                            SignUp
                        </button>
                    </div>
                </div> -->
            </div>
        </div>
       <!--  <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    
                    <!--    </div>
                 <!--   </div>
              <!--  </div>
          <!--  </div>-->
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php printHTMLRequired() ?>

    <script type="text/javascript">
        var base_url = '<?= base_url() ?>';
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= media() ?>/js/general/axios.min.js?version=<?= getVersion() ?>"></script>
    <script src="<?= media() ?>/portalweb/js/wow.js"></script>
    <script src="<?= media() ?>/portalweb/js/easing.js"></script>
    <script src="<?= media() ?>/portalweb/js/waypoints.min.js"></script>
    <script src="<?= media() ?>/portalweb/js/owl.carousel.js"></script>
    <script src="<?= media() ?>/js/general/sweetalert2@11.js?version=<?= getVersion() ?>"></script>
    <script src="<?= media() ?>/js/general/filerequired.js?version=<?= getVersion() ?>"></script>
    <!-- Template Javascript -->
    <script src="<?= media() ?>/portalweb/js/main.js"></script>


    <?php if (isset($data['page_array_js']) && !empty($data['page_array_js'])) {
        foreach ($data['page_array_js'] as $key => $value) { ?>
            <script src="<?= media() ?>/portalweb/js/<?= $value ?>.js?version=<?= getVersion() ?>"></script>
    <?php }
    } ?>

    <!-- Modal de alertas de sesion -->
    <?php getModal('modal_login', $data) ?>
    </body>

    </html>