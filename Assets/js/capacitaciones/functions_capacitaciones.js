var dataCapacitaciones;

$(document).ready(function () {
    cargarLesiones();
    saveCapacitaciones();
    openModal();
    updateCapacitaciones();
    deleteCapacitaciones();
});

function cargarLesiones() {
    dataCapacitaciones = $('#tb_capacitaciones').DataTable({
        aProcessing: true,
        aServerSide: true,
        language: languajeDefault,
        ajax: {
            url: base_url + "Capacitaciones/selectAllCapacitaciones",
            dataSrc: "",
        },
        columns: [
            { data: "numero" },
            { data: "capacitaciones_nombre" },
            { data: "capacitaciones_descripcion" },
            { data: "capacitaciones_peso" },
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
                class: "col-4",
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
            }
        ],
    });
}

function saveCapacitaciones() {
    $('#form_capacitaciones').submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        abrirLoadingModal();
        const request = axios.post(base_url + 'Capacitaciones/saveCapacitaciones', formData);

        request.then(res => {
            if (Boolean(res.data.status)) {
                dataCapacitaciones.ajax.reload(() => cerrarLoadingModal());
                $('#modal_capacitaciones').modal('hide');

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
                icon: 'error',
                title: error
            })
        });
    });
}

function openModal() {
    $(document).on('click', '.__editar', function () {
        let capacitaciones_id = $(this).attr('data-capacitaciones_id');
        let capacitaciones_nombre = $(this).attr('data-capacitaciones_nombre');
        let capacitaciones_descripcion = $(this).attr('data-capacitaciones_descripcion');
        let capacitaciones_peso = $(this).attr('data-capacitaciones_peso');

        $('#ecapacitaciones_nombre').val(capacitaciones_nombre);
        $('#ecapacitaciones_descripcion').val(capacitaciones_descripcion);
        $('#ecapacitaciones_peso').val(capacitaciones_peso);
        $('#eform_capacitaciones').attr('data-capacitaciones_id', capacitaciones_id);

        $('#emodal_capacitaciones').modal('show');
    });

    $(document).on('click', '.__view', function () {
        let capacitaciones_nombre = $(this).attr('data-capacitaciones_nombre');
        let capacitaciones_descripcion = $(this).attr('data-capacitaciones_descripcion');
        let capacitaciones_peso = $(this).attr('data-capacitaciones_peso');

        $('#vcapacitaciones_nombre').val(capacitaciones_nombre);
        $('#vcapacitaciones_descripcion').val(capacitaciones_descripcion);
        $('#vcapacitaciones_peso').val(capacitaciones_peso);

        $('#vmodal_capacitaciones').modal('show');
    });
}

function updateCapacitaciones() {
    $('#eform_capacitaciones').submit(function (e) {
        e.preventDefault();

        let capacitaciones_id = $(this).attr('data-capacitaciones_id');

        abrirLoadingModal();
        const formData = new FormData(this);
        formData.append('ecapacitaciones_id', capacitaciones_id);
        const request = axios.post(base_url + 'Capacitaciones/updateCapacitaciones', formData);

        request.then(res => {
            if (Boolean(res.data.status)) {
                dataCapacitaciones.ajax.reload(() => cerrarLoadingModal());
                Toast.fire({
                    icon: res.data.value,
                    title: res.data.message
                });
                $('#emodal_capacitaciones').modal('hide');
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

function deleteCapacitaciones() {
    $(document).on('click', '.__delete', function () {
        let capacitaciones_id = $(this).attr('data-capacitaciones_id');
        let capacitaciones_nombre = $(this).attr('data-capacitaciones_nombre');

        Swal.fire({
            title: 'CAPACITACIONES',
            html: "¿Está seguro de eliminar la lesión <b>" + capacitaciones_nombre + "</b>?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData();
                formData.append('capacitaciones_id', capacitaciones_id);

                const request = axios.post(base_url + 'Capacitaciones/deleteCapacitaciones', formData);

                request.then(res => {
                    if (Boolean(res.data.status)) {
                        dataCapacitaciones.ajax.reload(() => cerrarLoadingModal());
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