</div>
</div>

<?php printHTMLRequired() ?>
<?php printReloadPage() ?>

<script type="text/javascript">
  var base_url = '<?= base_url() ?>';
</script>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= media() ?>/js/general/sweetalert2@11.js?version=<?= getVersion() ?>"></script>
<script src="<?= media() ?>/js/general/all.js?version=<?= getVersion() ?>"></script>
<script src="<?= media() ?>/js/general/jquery-3.6.0.min.js?version=<?= getVersion() ?>"></script>
<script src="<?= media() ?>/js/general/jquery.dataTables.min.js?version=<?= getVersion() ?>"></script>
<script src="<?= media() ?>/js/general/dataTables.bootstrap5.min.js?version=<?= getVersion() ?>"></script>
<script src="<?= media() ?>/js/general/feather.min.js?version=<?= getVersion() ?>"></script>
<!-- <script src="<?= media() ?>/js/general/bootstrap.bundle.min.js"></script> -->
<script src="<?= media() ?>/js/general/simple-datatables.js"></script>
<script src="<?= media() ?>/js/general/axios.min.js?version=<?= getVersion() ?>"></script>

<!-- Template Main JS File -->
<!-- <script src="<?= media() ?>/js/general/main.js"></script> -->
<script src="<?= media() ?>/js/general/filerequired.js?version=<?= getVersion() ?>"></script>

<?php if (isset($data['page_function_js']) && !empty($data['page_function_js'])) { ?>
  <script src="<?= media() ?>/js/<?= $data['page_function_js'] ?>.js?version=<?= getVersion() ?>"></script>
<?php } ?>
<script src="<?= media() ?>/js/general/scripts.js"></script>

</body>

</html>