<?php
class Lesiones extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $data['page_id'] = 3;
        $data['page_tag'] = "Lesiones";
        $data['page_title'] = "Lesiones";
        $data['page_name'] = "Lesiones";
        $data['page_function_js'] = "lesiones/function_lesiones";
        $data['accidentes'] = $this->model->selectAllAccidentes();
        $this->views->getView($this, "lesiones", $data);
    }

    public function selectAllLesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $dataAccidentes = $this->model->selectAllAccidentes();
        $auxDataAccidentes = [];

        foreach ($dataAccidentes as $key => $value) {
            $auxDataAccidentes[$value['accidentes_id']] = $value['accidentes_nombre'];
        }

        $dataLesiones = $this->model->selectAllLesiones();
        foreach ($dataLesiones as $key => $value) {
            $dataLesiones[$key]['numero'] = $key + 1;
            $dataLesiones[$key]['accidentes_nombre'] = $auxDataAccidentes[$value['accidentes_id']];

            $dataLesiones[$key]['options'] = '<button class="btn btn-sm btn-icon btn-success __habilitar"><i class="feather-refresh-cw"></i></button>';
            $dataLesiones[$key]['estado'] = '<span class="badge bg-danger">Inabilitado</span>';

            if ($value['lesiones_estado'] == 1) {
                $dataLesiones[$key]['options'] = '<button class="btn btn-sm btn-icon btn-warning __editar"><i class="feather-edit-3"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-danger __delete"><i class="feather-trash"></i></button>';

                $dataLesiones[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
            }
        }

        json($dataLesiones);
    }

    function saveLesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE GUARDAR LA LESION',
            'value' => 'error'
        ];

        if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST)) {
            $return['message'] = 'ERROR EN ENVIAR LOS DATOS.';
            json($return);
        }

        $saveData = $this->model->insertLesiones(
            $_POST['accidentes_id'],
            $_POST['lesiones_nombre'],
            $_POST['lesiones_descripcion'],
            $_POST['lesiones_peso']
        );

        if ($saveData > 0) {
            $return = [
                'status' => true,
                'message' => 'LESION ' . $_POST['lesiones_nombre'] . ' GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
}
