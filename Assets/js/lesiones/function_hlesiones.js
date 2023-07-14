var table;

$(document).ready(function () {
  loadTable();
  save();
  setTimeout(() => {
    eliminar();
    loadLesion();
  }, 1000);
});
document.addEventListener("click", () => {
  eliminar();
});
function loadTable() {
  table = $("#tb").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: languajeDefault,
    ajax: {
      url: base_url + "Lesiones/getHLesiones",
      dataSrc: "",
    },
    columns: [
      { data: "numero" },
      { data: "usuarios_nombres" },
      { data: "accidentes_nombre" },
      { data: "lesiones_nombre" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 5,
    Order: [[0, "desc"]],
    columnDefs: [
      {
        class: "col-1 text-center",
        targets: 0,
      },
      {
        class: "col-4",
        targets: 1,
      },
      {
        class: "col-4",
        targets: 2,
      },
      {
        class: "col-2 text-center",
        targets: 3,
      },
      {
        class: "col-1 text-center",
        targets: 4,
      },
    ],
  });
}

function save() {
  formS = $("#form_save").submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const request = axios.post(base_url + "Lesiones/saveHLesion", formData);

    request.then((res) => {
      if (Boolean(res.data.status)) {
        table.ajax.reload(() => cerrarLoadingModal());
        $("#modal_save").modal("hide");
        Toast.fire({
          icon: res.data.value,
          title: res.data.message,
        });
        setTimeout(() => {
          location.reload();
        }, 2000);
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
function eliminar() {
  $(document).on("click", ".__delete", function () {
    let dataid = $(this).attr("data-id");

    Swal.fire({
      title: "ELIMINAR HISTORIAL LESION",
      text: "¿Estas seguro de eliminar esta LESION, no podrás revertir esto?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ok",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        const formData = new FormData();
        formData.append("id", dataid);
        const request = axios.post(base_url + "Lesiones/delHLesion", formData);
        request.then((res) => {
          if (res.data.status) {
            Swal.fire("CORRECTO", res.data.msg, res.data.value);
            location.reload();
          } else {
            Swal.fire("ALERTA", res.data.msg, res.data.value);
          }
        });
        request.catch((error) => {
          console.log(error);
        });
      }
    });

    console.log(roles_id);
  });
}
function loadLesion() {
  let cbxAccidente = document.querySelector("#cbxAccidentes");
  cbxAccidente.addEventListener("change", () => {
    let dataid = cbxAccidente.value;
    const formData = new FormData();
    formData.append("id", dataid);
    const request = axios.post(base_url + "Lesiones/getLesion", formData);
    request.then((res) => {
      document.querySelector("#cbxLesiones").innerHTML = res.data;
    });
    request.catch((error) => {
      console.log(error);
    });
  });
}
