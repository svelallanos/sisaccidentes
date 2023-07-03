var dataLesiones;

$(document).ready(function () {
    cargarLesiones();
    saveLesiones();
    openModal();
    updateLesiones();
    deleteLesiones();
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

        abrirLoadingModal();
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

function openModal() {
    $(document).on('click', '.__editar', function () {
        let lesiones_id = $(this).attr('data-lesiones_id');
        let accidentes_id = $(this).attr('data-accidentes_id');
        let lesiones_nombre = $(this).attr('data-lesiones_nombre');
        let lesiones_descripcion = $(this).attr('data-lesiones_descripcion');
        let lesiones_peso = $(this).attr('data-lesiones_peso');

        $('#elesiones_nombre').val(lesiones_nombre);
        $('#elesiones_descripcion').val(lesiones_descripcion);
        $('#elesiones_peso').val(lesiones_peso);
        $('#eaccidentes_id').val(accidentes_id);
        $('#eform_lesiones').attr('data-lesiones_id', lesiones_id);

        $('#emodal_lesiones').modal('show');
    });

    $(document).on('click', '.__view', function () {
        let accidentes_id = $(this).attr('data-accidentes_id');
        let lesiones_nombre = $(this).attr('data-lesiones_nombre');
        let lesiones_descripcion = $(this).attr('data-lesiones_descripcion');
        let lesiones_peso = $(this).attr('data-lesiones_peso');

        $('#vlesiones_nombre').val(lesiones_nombre);
        $('#vlesiones_descripcion').val(lesiones_descripcion);
        $('#vlesiones_peso').val(lesiones_peso);
        $('#vaccidentes_id').val(accidentes_id);

        $('#vmodal_lesiones').modal('show');
    });
}

function updateLesiones() {
    $('#eform_lesiones').submit(function (e) {
        e.preventDefault();

        let lesiones_id = $(this).attr('data-lesiones_id');

        abrirLoadingModal();
        const formData = new FormData(this);
        formData.append('elesiones_id', lesiones_id);
        const request = axios.post(base_url + 'Lesiones/updateLesiones', formData);

        request.then(res => {
            if (Boolean(res.data.status)) {
                dataLesiones.ajax.reload(() => cerrarLoadingModal());
                Toast.fire({
                    icon: res.data.value,
                    title: res.data.message
                });
                $('#emodal_lesiones').modal('hide');
            } else {
                cerrarLoadingModal();
                Toast.fire({
                    icon: res.data.value,
                    title: res.data.message
                });
            }
        });

        request.catch(error => {
            Toast.fire({
                icon: 'error',
                title: error
            });
        });

    });
}

function deleteLesiones() {
    $(document).on('click', '.__delete', function () {
        let lesiones_id = $(this).attr('data-lesiones_id');
        let lesiones_nombre = $(this).attr('data-lesiones_nombre');

        Swal.fire({
            title: 'LESIONES',
            html: "¿Está seguro de eliminar la lesión <b>" + lesiones_nombre + "</b>?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData();
                formData.append('lesiones_id', lesiones_id);

                const request = axios.post(base_url + 'Lesiones/deleteLesiones', formData);

                request.then(res => {
                    if (Boolean(res.data.status)) {
                        dataLesiones.ajax.reload(() => cerrarLoadingModal());
                        Toast.fire({
                            icon: res.data.value,
                            title: res.data.message
                        });
                    } else {
                        cerrarLoadingModal();
                        Toast.fire({
                            icon: res.data.value,
                            title: res.data.message
                        });
                    }
                });

                request.catch(error => {
                    Toast.fire({
                        icon: 'error',
                        title: error
                    });
                });
            }
        });
    });
}