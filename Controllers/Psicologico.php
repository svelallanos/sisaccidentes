<?php
class Psicologico extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function psicologico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(13, true);
        $data['page_id'] = 13;
        $data['page_tag'] = "Estado Psicologico";
        $data['page_title'] = "Estado Psicologico";
        $data['page_name'] = "Estado Psicologico";
        $data['page_function_js'] = "psicologico/function_psicologico";
        $this->views->getView($this, "psicologico", $data);
    }
    public function getPsicologico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(13, true);

        $request = $this->model->selectPsicologico();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["estadopsc_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["estadopsc_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["estadopsc_id"] . '"
                                            data-name="' . $value["estadopsc_nombre"] . '"
                                            data-peso="' . $value["estadopsc_peso"] . '"
                                            data-description="' . $value["estadopsc_descripcion"] . '"                                            
                                            data-estado="' . $value["estadopsc_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["estadopsc_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function savePsicologico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(13, true);

        $txtName = $_POST["txtName"];
        $txtPeso = $_POST["txtPeso"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertPsicologico($txtName, $txtDescripcion, $txtPeso);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delPsicologico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(13, true);

        $id = $_POST["id"];
        $request = $this->model->deletePsicologico($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updPsicologico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(13, true);

        $request = $this->model->updatePsicologico($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"], $_POST["txtPesoUpdt"], $_POST["cbxEstadoUpdt"]);
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
