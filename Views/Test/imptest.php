<?php
$arrdata = $_SESSION["test"];

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= (isset($data['page_title']) ? $data['page_title'] : 'Sin nombre de página') ?></title>
    <link rel="icon" type="image/x-icon" href="<?= media() ?>/images/Insignia-MDESV.png?version=<?= getVersion() ?>" />

    <link href="<?= media() ?>/css/general/styles.css" rel="stylesheet" />
    <link href="<?= media() ?>/css/general/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="<?= media() ?>/css/general/feather.css" rel="stylesheet" />

    <link href="<?= media() ?>/css/general/style_customized.css?version=<?= getVersion() ?>" rel="stylesheet" />

    <?php if (isset($data['page_css']) && !empty($data['page_css'])) { ?>
        <link href="<?= media() ?>/css/<?= $data['page_css'] ?>.css?version=<?= getVersion() ?>" rel="stylesheet" />
    <?php } ?>
</head>
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
            <canvas id="myChart"></canvas>
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
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
$valores = $arrdata["resultValores"];
?>
<script src="<?= media() ?>/js/general/jquery-3.6.0.min.js?version=<?= getVersion() ?>"></script>
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
    $(document).ready(function() {
        setTimeout(() => {
            window.print();
        }, 1000);
    });
</script>