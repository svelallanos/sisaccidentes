var dataEpp;
let identificador;

$(document).ready(function () {
    cargarEpp();

    identificador = 1;

    $("#btn_add_mod").click(function(){
        $(".title_mod").html('AGREGAR epp');
        $("#btn_save_mod").html('Guardar');
        identificador = 1;

        clear_valores();

        $("#modal_epp").modal('show');
    });

    $(document).on('click', '.btn_editar_epp', function(){

        let epp_id = $(this).attr('aepp_id');
        let epp_nombre = $(this).attr('epp_nombre');
        let epp_descripcion = $(this).attr('epp_descripcion');
        identificador = 2;
        console.log(epp_nombre);

        clear_valores();
        
        $("#epp_id").val(epp_id);
        $("#name_epp").val(epp_nombre);
        $("#descripcion_epp").html(epp_descripcion);

        $(".title_mod").html('ACTUALIZAR epp');
        $("#btn_save_mod").html('Actualizar');

        $("#modal_epp").modal('show');
    });

    $("#form_epp").submit(function(e){

        e.preventDefault();

        let datos = new FormData(this);

        datos.append('identificador', identificador);

        $.ajax({
            type: "POST",
            url: base_url + "epp/main_epp",
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false 

        }).done(function(data) {

            if (Boolean(data.status) === true) 
            {
                let clase = msgAlert(data.alert, data.message)

                $(".message_epp").html(clase);

                $("#modal_epp").modal('hide');

                clear_valores();

                cargarepp();
            } 
            else 
            {
                if(parseInt(data.estado) === 1)
                {
                    let clase = msgAlert(data.alert, data.message)

                    $(".message_epp").html(clase);
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

    $(document).on('click', '.btn_borrar_epp', function(){

        let epp_id = $(this).attr('epp_id');
        let epp_nombre = $(this).attr('epp_nombre');
        identificador = 3;

        Swal.fire({
            title: 'epp',
            html: "¿Está seguro de borrar el epp <b>"+ epp_nombre +"</b>?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar'
          }).then((result) => {
            if (result.isConfirmed) 
            {
                let datos = {
                    epp_id, 
                    identificador
                }

                $.ajax({
                    type: "POST",
                    url: base_url + "epp/main_epp",
                    data: datos,
                    dataType: "json"
        
                }).done(function(data) {
        
                    if (Boolean(data.status) === true) 
                    {
                        let clase = msgAlert(data.alert, data.message)
        
                        $(".message_epp").html(clase);
        
                        $("#modal_epp").modal('hide');
        
                        clear_valores();
        
                        cargarEpp();
                    } 
                    else 
                    {
                        if(parseInt(data.estado) === 1)
                        {
                            let clase = msgAlert(data.alert, data.message)
        
                            $(".message_epp").html(clase);
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

function cargarEpp() {
    dataepp = $('#lista_epp').DataTable({
        aProcessing: true,
        aServerSide: true,
        language: languajeDefault,
        ajax: {
            url: base_url + "epp/selectsepp",
            dataSrc: "",
        },
        columns: [
            { data: "numero" },
            { data: "epp_nombre" },
            { data: "epp_descripcion" },
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
    $("#epp_id").val('');
    $("#name_epp").val('');
    $("#descripcion_epp").html('');
}