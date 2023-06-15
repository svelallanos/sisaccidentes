var dataTest;

$(document).ready(function () {
    cargarTest();
});

function cargarTest() {
    dataTest = $('#tb_test').DataTable({
        language: languajeDefault
    });
}