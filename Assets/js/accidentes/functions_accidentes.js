var dataAccidentes;

$(document).ready(function () {
    cargarAccidentes();
});

function cargarAccidentes() {
    dataAccidentes = $('#lista_accidentes').DataTable({
        aProcessing: true,
        aServerSide: true,
        language: languajeDefault,
        ajax: {
            url: base_url + "Accidentes/selectsAccidentes",
            dataSrc: "",
        },
        columns: [
            { data: "numero" },
            { data: "accidentes_nombre" },
            { data: "accidentes_descripcion" },
            { data: "estado" },
            { data: "options" },
        ],
        resonsieve: "true",
        bDestroy: true,
        iDisplayLength: 10,
        Order: [[0, "desc"]],
        columnDefs: [
            {
                class: "col-1 text-center",
                targets: 0,
            },
            {
                class: "col-3",
                targets: 1,
            },
            {
                class: "col-5",
                targets: 2,
            },
            {
                class: "col-1 text-center",
                targets: 3,
            },
            {
                class: "col-2 text-center",
                targets: 4,
            }
        ],
    });
}