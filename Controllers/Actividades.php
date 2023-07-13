<?php
class Actividades extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actividades()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(16, true);
        $data['page_id'] = 16;
        $data['page_tag'] = "Actividades";
        $data['page_title'] = "Actividades";
        $data['page_name'] = "Actividades";
        $data['page_function_js'] = "actividades/function_actividades";
        $this->views->getView($this, "actividades", $data);
    }
    public function getActividades()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(16, true);

        $request = $this->model->selectActividades();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["actividades_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["actividades_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["actividades_id"] . '"
                                            data-name="' . $value["actividades_nombre"] . '"
                                            data-peso="' . $value["actividades_peso"] . '"
                                            data-description="' . $value["actividades_descripcion"] . '"                                            
                                            data-estado="' . $value["actividades_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["actividades_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveActividades()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(16, true);

        $txtName = $_POST["txtName"];
        $txtPeso = $_POST["txtPeso"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertActividades($txtName, $txtDescripcion, $txtPeso);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delActividades()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(16, true);

        $id = $_POST["id"];
        $request = $this->model->deleteActividades($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updateActividades()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(16, true);

        $request = $this->model->updateActividades($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"], $_POST["txtPesoUpdt"], $_POST["cbxEstadoUpdt"]);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'ESTADO  ACTUALIZADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }
        echo json($return);
    }
}
