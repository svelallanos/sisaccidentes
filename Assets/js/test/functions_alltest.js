var dataTest;

$(document).ready(function () {
  cargarTest();
});
document.addEventListener("click", () => {});
function cargarTest() {
  dataTest = $("#tb_test").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: languajeDefault,
    ajax: {
      url: base_url + "Test/getHistorialAll",
      dataSrc: "",
    },
    columns: [
      { data: "numero" },
      { data: "usuarios_nombres" },
      { data: "test_descripcion" },
      { data: "test_bajo" },
      { data: "test_medio" },
      { data: "test_alto" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 5,
    Order: [[0, "ASC"]],
    columnDefs: [
      {
        class: "col-1 text-center",
        targets: 0,
      },
      {
        class: "col-2",
        targets: 1,
      },
      {
        class: "col-6",
        targets: 2,
      },
      {
        class: "col-1 text-center",
        targets: 3,
      },
      {
        class: "col-1 text-center",
        targets: 4,
      },
      {
        class: "col-1 text-center",
        targets: 5,
      },
    ],
  });
}
