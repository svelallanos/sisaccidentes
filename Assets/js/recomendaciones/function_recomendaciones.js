var table;

$(document).ready(function () {
  loadTable();
  save();
  eliminar();
  update();
  setTimeout(() => {
    loadUpdate();
  }, 1000);
});
document.addEventListener("click", () => {
  loadUpdate();
  eliminar();
});
function loadTable() {
  table = $("#tb").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: languajeDefault,
    ajax: {
      url: base_url + "Recomendaciones/getRecomendaciones",
      dataSrc: "",
    },
    columns: [
      { data: "numero" },
      { data: "recomendacion" },
      { data: "tipoRecomendacion" },
      { data: "fechaCreacion" },
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
        class: "col-7",
        targets: 1,
      },
      {
        class: "col-1 text-center",
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

    const request = axios.post(
      base_url + "Recomendaciones/saveRecomendaciones",
      formData
    );

    request.then((res) => {
      if (Boolean(res.data.status)) {
        table.ajax.reload(() => cerrarLoadingModal());
        $("#modal_save").modal("hide");
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
function eliminar() {
  $(document).on("click", ".__delete", function () {
    let dataid = $(this).attr("data-id");

    Swal.fire({
      title: "ELIMINAR RECOMENDACION",
      text: "¿Estas seguro de eliminar esta recomendacion, no podrás revertir esto?",
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

        const request = axios.post(
          base_url + "Recomendaciones/delRecomendacion",
          formData
        );

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
function update() {
  $("#form_update").submit(function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    const request = axios.post(
      base_url + "Recomendaciones/updRecomendacion",
      formData
    );

    request.then((res) => {
      if (Boolean(res.data.status)) {
        table.ajax.reload(() => cerrarLoadingModal());
        $("#modal_update").modal("hide");
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
      let cbxDocumento = document.querySelector("#cbxEstadoUpdt");
      let attrIdDoc = element.getAttribute("data-estado");
      cbxDocumento[0].value = attrIdDoc;
      cbxDocumento[0].innerHTML = element.getAttribute("data-estado");
      cbxDocumento[0].selected = true;
      cbxDocumento[0].disabled = false;
      $("#modal_update").modal("show");
    });
  });
}
