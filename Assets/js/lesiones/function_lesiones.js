var dataLesiones;

$(document).ready(function () {
    cargarLesiones();
    saveLesiones();
});

function cargarLesiones() {
    dataLesiones = $('#tb_lesiones').DataTable({
        aProcessing: true,
        aServerSide: true,
        language: languajeDefault,
        ajax: {
            url: base_url + "lesiones/selectAllLesiones",
            dataSrc: "",
        },
        columns: [
            { data: "numero" },
            { data: "lesiones_nombre" },
            { data: "accidentes_nombre" },
            { data: "lesiones_peso" },
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
            }
        ],
    });
}

function saveLesiones() {
    $('#form_lesiones').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        const request = axios.post(base_url + 'Lesiones/saveLesiones', formData);

        request.then(res => {
            if (Boolean(res.data.status)) {
                dataLesiones.ajax.reload(() => cerrarLoadingModal());
                $('#modal_lesiones').modal('hide');

                Toast.fire({
                    icon: res.data.value,
                    title: res.data.message
                })
            } else {
                Toast.fire({
                    icon: res.data.value,
                    title: res.data.message
                })
            }
        });

        request.catch(error => {
            Toast.fire({
                icon: res.data.value,
                title: error
            })
        });
    });
}