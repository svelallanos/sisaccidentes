var dataAccidentes;
let identificador;

$(document).ready(function () {
    cargarAccidentes();

    identificador = 1;

    $("#btn_add_mod").click(function(){
        $(".title_mod").html('AGREGAR ACCIDENTE');
        $("#btn_save_mod").html('Guardar');
        identificador = 1;

        clear_valores();

        $("#modal_accidentes").modal('show');
    });

    $(document).on('click', '.btn_editar_accidente', function(){

        let accidente_id = $(this).attr('accidente_id');
        let accidentes_nombre = $(this).attr('accidentes_nombre');
        let accidentes_descripcion = $(this).attr('accidentes_descripcion');
        identificador = 2;
        console.log(accidentes_nombre);

        clear_valores();
        
        $("#accidentes_id").val(accidente_id);
        $("#name_accidente").val(accidentes_nombre);
        $("#descripcion_accidente").html(accidentes_descripcion);

        $(".title_mod").html('ACTUALIZAR ACCIDENTE');
        $("#btn_save_mod").html('Actualizar');

        $("#modal_accidentes").modal('show');
    });

    $("#form_accidentes").submit(function(e){

        e.preventDefault();

        let datos = new FormData(this);

        datos.append('identificador', identificador);

        $.ajax({
            type: "POST",
            url: base_url + "accidentes/main_accidentes",
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false 

        }).done(function(data) {

            if (Boolean(data.status) === true) 
            {
                let clase = msgAlert(data.alert, data.message)

                $(".message_accidentes").html(clase);

                $("#modal_accidentes").modal('hide');

                clear_valores();

                cargarAccidentes();
            } 
            else 
            {
                if(parseInt(data.estado) === 1)
                {
                    let clase = msgAlert(data.alert, data.message)

                    $(".message_accidentes").html(clase);
                }
                else{
                    Swal.fire({
                        icon: data.alert,
                        title: data.title,
                        html: data.message
                    })
                }
                cerrarLoadingModal();
            }
            
        })
        .fail(function() {

            Swal.fire({
                icon: 'error',
                title: 'ERROR',
                html: 'Ocurrió un error desconocido'
            })

        });
    });

    $(document).on('click', '.btn_borrar_accidente', function(){

        let accidentes_id = $(this).attr('accidente_id');
        let accidentes_nombre = $(this).attr('accidentes_nombre');
        identificador = 3;

        Swal.fire({
            title: 'ACCIDENTES',
            html: "¿Está seguro de borrar el accidente <b>"+ accidentes_nombre +"</b>?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar'
          }).then((result) => {
            if (result.isConfirmed) 
            {
                let datos = {
                    accidentes_id, 
                    identificador
                }

                $.ajax({
                    type: "POST",
                    url: base_url + "accidentes/main_accidentes",
                    data: datos,
                    dataType: "json"
        
                }).done(function(data) {
        
                    if (Boolean(data.status) === true) 
                    {
                        let clase = msgAlert(data.alert, data.message)
        
                        $(".message_accidentes").html(clase);
        
                        $("#modal_accidentes").modal('hide');
        
                        clear_valores();
        
                        cargarAccidentes();
                    } 
                    else 
                    {
                        if(parseInt(data.estado) === 1)
                        {
                            let clase = msgAlert(data.alert, data.message)
        
                            $(".message_accidentes").html(clase);
                        }
                        else{
                            Swal.fire({
                                icon: data.alert,
                                title: data.title,
                                html: data.message
                            })
                        }
                        cerrarLoadingModal();
                    }
                    
                })
                .fail(function() {
        
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        html: 'Ocurrió un error desconocido'
                    })
        
                });
              
            }
        })
    });
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

function clear_valores()
{
    $("#accidentes_id").val('');
    $("#name_accidente").val('');
    $("#descripcion_accidente").html('');
}