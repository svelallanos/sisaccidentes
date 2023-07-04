var dataCargo;
let identificador;

$(document).ready(function () {
    cargarCargo();

    identificador = 1;

    $("#btn_add_mod").click(function(){
        $(".title_mod").html('AGREGAR CARGO');
        $("#btn_save_mod").html('Guardar');
        identificador = 1;

        clear_valores();

        $("#modal_cargo").modal('show');
    });

    $(document).on('click', '.btn_editar_cargo', function(){

        let cargo_id = $(this).attr('cargo_id');
        let cargo_nombre = $(this).attr('cargo_nombre');
        let cargo_descripcion = $(this).attr('cargo_descripcion');
        identificador = 2;
        console.log(cargo_nombre);

        clear_valores();
        
        $("#cargo_id").val(cargo_id);
        $("#name_cargo").val(cargo_nombre);
        $("#descripcion_acargo").html(cargo_descripcion);

        $(".title_mod").html('ACTUALIZAR CARGO');
        $("#btn_save_mod").html('Actualizar');

        $("#modal_cargo").modal('show');
    });

    $("#form_cargo").submit(function(e){

        e.preventDefault();

        let datos = new FormData(this);

        datos.append('identificador', identificador);

        $.ajax({
            type: "POST",
            url: base_url + "cargo/main_cargo",
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false 

        }).done(function(data) {

            if (Boolean(data.status) === true) 
            {
                let clase = msgAlert(data.alert, data.message)

                $(".message_cargo").html(clase);

                $("#modal_cargo").modal('hide');

                clear_valores();

                cargarCaego();
            } 
            else 
            {
                if(parseInt(data.estado) === 1)
                {
                    let clase = msgAlert(data.alert, data.message)

                    $(".message_cargo").html(clase);
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

    $(document).on('click', '.btn_borrar_cargo', function(){

        let cargo_id = $(this).attr('cargo_id');
        let cargo_nombre = $(this).attr('cargo_nombre');
        identificador = 3;

        Swal.fire({
            title: 'CARGO',
            html: "¿Está seguro de borrar el cargo <b>"+ cargo_nombre +"</b>?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar'
          }).then((result) => {
            if (result.isConfirmed) 
            {
                let datos = {
                    cargo_id, 
                    identificador
                }

                $.ajax({
                    type: "POST",
                    url: base_url + "cargo/main_cargo",
                    data: datos,
                    dataType: "json"
        
                }).done(function(data) {
        
                    if (Boolean(data.status) === true) 
                    {
                        let clase = msgAlert(data.alert, data.message)
        
                        $(".message_cargo").html(clase);
        
                        $("#modal_cargo").modal('hide');
        
                        clear_valores();
        
                        cargarCaego();
                    } 
                    else 
                    {
                        if(parseInt(data.estado) === 1)
                        {
                            let clase = msgAlert(data.alert, data.message)
        
                            $(".message_cargo").html(clase);
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

function cargarCargo() {
    dataCargo = $('#lista_cargo').DataTable({
        aProcessing: true,
        aServerSide: true,
        language: languajeDefault,
        ajax: {
            url: base_url + "Cargo/selectsCargo",
            dataSrc: "",
        },
        columns: [
            { data: "numero" },
            { data: "cargo_nombre" },
            { data: "cargo_descripcion" },
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
    $("#cargo_id").val('');
    $("#name_cargo").val('');
    $("#descripcion_cargo").html('');
}