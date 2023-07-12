var dataTest;

$(document).ready(function () {
  cargarTest();
  save();
  valorEdad();
  print();
});
document.addEventListener("click", () => {
  print();
});
function cargarTest() {
  dataTest = $("#tb_test").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: languajeDefault,
    ajax: {
      url: base_url + "Test/getHistorial",
      dataSrc: "",
    },
    columns: [
      { data: "numero" },
      { data: "test_descripcion" },
      { data: "test_bajo" },
      { data: "test_medio" },
      { data: "test_alto" },
      { data: "acciones" },
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
        class: "col-6",
        targets: 1,
      },
      {
        class: "col-1 text-center",
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
        class: "col-2 text-center",
        targets: 5,
      },
    ],
  });
}
function save() {
  form = $("#formTest").submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const request = axios.post(base_url + "Test/saveTest", formData);

    request.then((res) => {
      if (Boolean(res.data.status)) {
        Toast.fire({
          icon: res.data.value,
          title: res.data.message,
        });
        window.location.href = base_url + "test/resulttest";
      } else {
        Toast.fire({
          icon: res.data.value,
          title: res.data.message,
        });
      }
    });

    request.catch((error) => {
      Toast.fire({
        icon: res.data.value,
        title: error,
      });
    });
  });
}
function print() {
  $(document).on("click", "#btnPrint", function () {
    let dataid = $(this).attr("data-id");
    const formData = new FormData();
    formData.append("id", dataid);
    const request = axios.post(base_url + "Test/printTest", formData);
    request.then((res) => {
      if (res.data.status) {
        Swal.fire("CORRECTO", res.data.msg, res.data.value);
        window.location.href = base_url + "test/resulttest";
      } else {
        Swal.fire("ALERTA", res.data.msg, res.data.value);
      }
    });
    request.catch((error) => {
      console.log(error);
    });
  });
}
function valorEdad() {
  if (document.querySelector("#edad")) {
    const edad = document.querySelector("#edad");
    edad.addEventListener("change", () => {
      document.querySelector("#valEdad").innerHTML = edad.value;
    });
  }
}
