<?php headerAdmin($data);

$arrdata = $_SESSION["test"];

?>
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
            <div class="invoice-print p-5 bg-white">
                <div class="d-flex justify-content-between flex-row">
                    <div class="mb-4">
                        <div class="d-flex svg-illustration mb-3 gap-2">
                            <span class="app-brand-text demo text-body fw-bolder">SIS. COBBA</span>
                        </div>
                        <p class="mb-1"><span class="text-black fw-bold">Nombres y Apellidos : </span><?= $_SESSION['portal']['usuarios_nombres'] . ' ' . $_SESSION['portal']['usuarios_paterno'] . ' ' . ($_SESSION['portal']['usuarios_materno']) ?></p>
                    </div>
                    <div>
                        <h4>Resultado #<?= $arrdata["Id"] ?></h4>
                        <div class="mb-2">
                            <span>Fecha Generado:</span>
                            <span class="fw-semibold"><?= date("M d,Y") ?></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-between mb-4">
                    <div class="mx-auto w-50">
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-3">
                    <table class="table border-top m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
                                <th>Bajo</th>
                                <th>Medio</th>
                                <th>Alto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?= $arrdata["Descripcion"] ?></td>
                                <td><?= $arrdata["valHTML"]["Bajo"] ?></td>
                                <td><?= $arrdata["valHTML"]["Medio"] ?></td>
                                <td><?= $arrdata["valHTML"]["Alto"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3 class="fw-bold text-black">Recomendaciones a seguir</h3>
                        <br>
                        <?= $arrdata["recomendaciones"] ?>
                    </div>

                    <hr>
                    <div>
                        <a href="<?= base_url() ?>test/imptest" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Imprimir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
$valores = $arrdata["resultValores"];
?>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Bajo', 'Medio', 'Alto'],
            datasets: [{
                label: 'Indicadores de accidente',
                data: [<?= $valores["Bajo"] ?>, <?= $valores["Medio"] ?>, <?= $valores["Alto"] ?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?php footerAdmin($data);
getModal('modal_accidentes', $data);
?>