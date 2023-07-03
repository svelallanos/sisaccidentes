var dataAnimo;

$(document).ready(function () {
  cargarAnimo();
  saveAnimo();
  eliminarRol();
  updateAnimo();
  setTimeout(() => {
    loadUpdate();
  }, 1000);
});
document.addEventListener("click", () => {
  loadUpdate();
  eliminarRol();
});
function cargarAnimo() {
  dataAnimo = $("#tb_animo").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: languajeDefault,
    ajax: {
      url: base_url + "animo/getAnimo",
      dataSrc: "",
    },
    columns: [
      { data: "numero" },
      { data: "estadoan_nombre" },
      { data: "estadoan_descripcion" },
      { data: "estadoan_peso" },
      { data: "estadoan_estado" },
      { data: "acciones" },
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
        class: "col-3",
        targets: 2,
      },
      {
        class: "col-1 text-center",
        targets: 3,
      },
      {
        class: "col-2 text-center",
        targets: 4,
      },
      {
        class: "col-2 text-center",
        targets: 5,
      },
    ],
  });
}

function saveAnimo() {
  $("#form_animo").submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const request = axios.post(base_url + "Animo/saveAnimo", formData);

    request.then((res) => {
      if (Boolean(res.data.status)) {
        dataAnimo.ajax.reload(() => cerrarLoadingModal());
        $("#modal_animo").modal("hide");

        Toast.fire({
          icon: res.data.value,
          title: res.data.message,
        });
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
function eliminarRol() {
  $(document).on("click", ".__delete", function () {
    let dataid = $(this).attr("data-id");

    Swal.fire({
      title: "ELIMINAR ESTADO DE ANIMO",
      text: "¿Estas seguro de eliminar este estado de animo, no podrás revertir esto?",
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

        const request = axios.post(base_url + "Animo/delAnimo", formData);

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
function updateAnimo() {
  $("#form_update_animo").submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const request = axios.post(base_url + "Animo/updAnimo", formData);

    request.then((res) => {
      if (Boolean(res.data.status)) {
        dataAnimo.ajax.reload(() => cerrarLoadingModal());
        $("#modal_update_animo").modal("hide");
        Toast.fire({
          icon: res.data.value,
          title: res.data.message,
        });
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
function loadUpdate() {
  const btn = document.querySelectorAll(".__editar");
  btn.forEach((element) => {
    element.addEventListener("click", () => {
      document.querySelector("#idAnimo").value =
        element.getAttribute("data-id");
      document.querySelector("#txtNameUpd").value =
        element.getAttribute("data-name");
      document.querySelector("#txtPesoUpdt").value =
        element.getAttribute("data-peso");
      document.querySelector("#txtDescripcionUdpt").value =
        element.getAttribute("data-description");
      let cbxEstado = document.querySelector("#cbxEstadoUpdt");
      let attrStatus = element.getAttribute("data-estado");
      cbxEstado =
        attrStatus == 1
          ? (cbxEstado[2].selected = true)
          : (cbxEstado[1].selected = true);
      $("#modal_update_animo").modal("show");
    });
  });
}
