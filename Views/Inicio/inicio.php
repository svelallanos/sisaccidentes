<?php headerAdmin($data) ?>
<main>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-5">
        <?= json($data['datosUserPortal']); ?>
    </div>
</main>

<?php footerAdmin($data) ?>