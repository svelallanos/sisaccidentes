<?php

class Capacitaciones extends Controllers
{
    function __construct()
    {
        parent::__construct();
    }

    function capacitaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(15, true);
        $data['page_id'] = 15;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Capacitaciones - Sistema COBBA";
        $data['page_name'] = "Capacitaciones";
        $data['page_function_js'] = "capacitaciones/functions_capacitaciones";
        $this->views->getView($this, "capacitaciones", $data);
    }

    public function selectAllCapacitaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(15, true);

        $dataCapacitaciones = $this->model->selectAllCapacitaciones();
        foreach ($dataCapacitaciones as $key => $value) {
            $dataCapacitaciones[$key]['numero'] = $key + 1;

            $dataCapacitaciones[$key]['options'] = '<button class="btn btn-sm btn-icon btn-success __habilitar"><i class="feather-refresh-cw"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-primary __view" 
            data-capacitaciones_nombre = "' . $value['capacitaciones_nombre'] . '" 
            data-capacitaciones_descripcion = "' . $value['capacitaciones_descripcion'] . '" 
            data-capacitaciones_peso = "' . $value['capacitaciones_peso'] . '" 
            ><i class="feather-eye"></i></button>';
            $dataCapacitaciones[$key]['estado'] = '<span class="badge bg-danger">Inabilitado</span>';

            if ($value['capacitaciones_estado'] == 1) {
                $dataCapacitaciones[$key]['options'] = '<button class="btn btn-sm btn-icon btn-warning __editar" 
                data-capacitaciones_id="' . $value['capacitaciones_id'] . '" 
                data-capacitaciones_nombre="' . $value['capacitaciones_nombre'] . '" 
                data-capacitaciones_descripcion="' . $value['capacitaciones_descripcion'] . '" 
                data-capacitaciones_peso="' . $value['capacitaciones_peso'] . '" 
                ><i class="feather-edit-3"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-danger __delete" data-capacitaciones_id = "' . $value['capacitaciones_id'] . '" data-capacitaciones_nombre = "' . $value['capacitaciones_nombre'] . '"><i class="feather-trash"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-primary __view" 
                data-capacitaciones_nombre = "' . $value['capacitaciones_nombre'] . '" 
                data-capacitaciones_descripcion = "' . $value['capacitaciones_descripcion'] . '" 
                data-capacitaciones_peso = "' . $value['capacitaciones_peso'] . '" 
                ><i class="feather-eye"></i></button>';

                $dataCapacitaciones[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
            }
        }

        json($dataCapacitaciones);
    }

    function saveCapacitaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(15, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE GUARDAR LA CAPACITACIÓN',
            'value' => 'error'
        ];

        if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST)) {
            $return['message'] = 'ERROR EN ENVIAR LOS DATOS.';
            json($return);
        }

        $saveData = $this->model->insertCapacitaciones(
            $_POST['capacitaciones_nombre'],
            $_POST['capacitaciones_descripcion'],
            $_POST['capacitaciones_peso']
        );

        if ($saveData > 0) {
            $return = [
                'status' => true,
                'message' => 'CAPACITACIÓN ' . $_POST['capacitaciones_nombre'] . ' GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }

    function updateCapacitaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(15, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE ACTUALIZAR LA CAPACITACIÓN',
            'value' => 'error',
        ];

        $updateData = $this->model->updateCapacitaciones(
            $_POST['ecapacitaciones_id'],
            $_POST['ecapacitaciones_nombre'],
            $_POST['ecapacitaciones_descripcion'],
            $_POST['ecapacitaciones_peso']
        );

        if ($updateData) {
            $return = [
                'status' => true,
                'message' => 'CAPACITACIÓN ACTUALIZADA CORRECTAMENTE',
                'value' => 'success',
            ];
        }

        json($return);
    }

    function deleteCapacitaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE ELIMINAR LA CAPACITACIÓN',
            'value' => 'error',
        ];

        $deleteData = $this->model->deleteCapacitaciones($_POST['capacitaciones_id']);

        if ($deleteData) {
            $return = [
                'status' => true,
                'message' => 'CAPACITACIÓN ELIMINADA CORRECTAMENTE',
                'value' => 'success',
            ];
        }

        json($return);
    }
}
