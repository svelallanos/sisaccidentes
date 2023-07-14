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
    public function hlesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(21, true);
        $data['page_id'] = 21;
        $data['page_tag'] = "Historial Lesiones";
        $data['page_title'] = "Historial Lesiones";
        $data['page_name'] = "Historial Lesiones";
        $data['page_function_js'] = "lesiones/function_hlesiones";
        $data['accidentes'] = $this->model->selectAllAccidentes();
        $data['page_user'] = $this->model->selectUser();

        $this->views->getView($this, "hlesiones", $data);
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

            $dataLesiones[$key]['options'] = '<button class="btn btn-sm btn-icon btn-success __habilitar"><i class="feather-refresh-cw"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-primary __view" 
            data-accidentes_id = "' . $value['accidentes_id'] . '" 
            data-lesiones_nombre = "' . $value['lesiones_nombre'] . '" 
            data-lesiones_descripcion = "' . $value['lesiones_descripcion'] . '" 
            data-lesiones_peso = "' . $value['lesiones_peso'] . '" 
            ><i class="feather-eye"></i></button>';
            $dataLesiones[$key]['estado'] = '<span class="badge bg-danger">Inabilitado</span>';

            if ($value['lesiones_estado'] == 1) {
                $dataLesiones[$key]['options'] = '<button class="btn btn-sm btn-icon btn-warning __editar" 
                data-lesiones_id="' . $value['lesiones_id'] . '" 
                data-accidentes_id="' . $value['accidentes_id'] . '" 
                data-lesiones_nombre="' . $value['lesiones_nombre'] . '" 
                data-lesiones_descripcion="' . $value['lesiones_descripcion'] . '" 
                data-lesiones_peso="' . $value['lesiones_peso'] . '" 
                ><i class="feather-edit-3"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-danger __delete" data-lesiones_id = "' . $value['lesiones_id'] . '" data-lesiones_nombre = "' . $value['lesiones_nombre'] . '"><i class="feather-trash"></i></button>&nbsp;<button class="btn btn-sm btn-icon btn-primary __view" 
                data-accidentes_id = "' . $value['accidentes_id'] . '" 
                data-lesiones_nombre = "' . $value['lesiones_nombre'] . '" 
                data-lesiones_descripcion = "' . $value['lesiones_descripcion'] . '" 
                data-lesiones_peso = "' . $value['lesiones_peso'] . '" 
                ><i class="feather-eye"></i></button>';

                $dataLesiones[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
            }
        }

        json($dataLesiones);
    }
    public function getHLesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(21, true);
        $request = $this->model->selectHLesiones();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["hlesiones_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        json($request);
    }
    public function saveLesiones()
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

    public function updateLesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE ACTUALIZAR LA LESION',
            'value' => 'error',
        ];

        $updateData = $this->model->updateLesiones(
            $_POST['elesiones_id'],
            $_POST['eaccidentes_id'],
            $_POST['elesiones_nombre'],
            $_POST['elesiones_descripcion'],
            $_POST['elesiones_peso']
        );

        if ($updateData) {
            $return = [
                'status' => true,
                'message' => 'LESION ACTUALIZADA CORRECTAMENTE',
                'value' => 'success',
            ];
        }

        json($return);
    }

    public function deleteLesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE ELIMINAR LA LESION',
            'value' => 'error',
        ];

        $deleteData = $this->model->deleteLesiones($_POST['lesiones_id']);

        if ($deleteData) {
            $return = [
                'status' => true,
                'message' => 'LESION ELIMINADA CORRECTAMENTE',
                'value' => 'success',
            ];
        }

        json($return);
    }
    public function delHLesion()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(21, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE ELIMINAR LA LESION',
            'value' => 'error',
        ];
        $deleteData = $this->model->deleteHLesion($_POST['id']);
        if ($deleteData) {
            $return = [
                'status' => true,
                'message' => 'LESION ELIMINADA CORRECTAMENTE',
                'value' => 'success',
            ];
        }

        json($return);
    }
    public function getLesion()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(21, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE ELIMINAR LA LESION',
            'value' => 'error',
        ];

        $request = $this->model->selectLesion($_POST['id']);
        $cadena = null;
        $cadena .= ' <option value="" disabled selected>Seleccione una opcion</option>';
        foreach ($request as $key => $value) {
            $cadena .= "<option value='" . $value["lesiones_id"] . "' >" . $value["lesiones_nombre"] . "</option>";
        }

        echo ($cadena);
    }
    public function saveHLesion()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(21, true);

        $return = [
            'status' => false,
            'message' => 'ERROR AL MOMENTO DE GUARDAR LA LESION',
            'value' => 'error'
        ];



        $saveData = $this->model->insertHLesion(
            $_POST['cbxLesiones'],
            $_POST['cbxUser']
        );

        if ($saveData > 0) {
            $return = [
                'status' => true,
                'message' => 'LESION  GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
}
