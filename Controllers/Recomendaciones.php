<?php
class Recomendaciones extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function recomendaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(18, true);
        $data['page_id'] = 18;
        $data['page_tag'] = "Recomendaciones";
        $data['page_title'] = "Recomendaciones";
        $data['page_name'] = "Recomendaciones";
        $data['page_function_js'] = "recomendaciones/function_recomendaciones";
        $this->views->getView($this, "recomendaciones", $data);
    }
    public function getRecomendaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(14, true);

        $request = $this->model->selectRecomendaciones();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            $request[$key]["acciones"] = '<button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["idRecomendaciones"] . '"
                                            data-name="' . $value["recomendacion"] . '"                                           
                                            data-estado="' . $value["tipoRecomendacion"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["idRecomendaciones"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveRecomendaciones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(18, true);

        $recomendacion = $_POST["recomendacion"];
        $tipo = $_POST["tipo"];
        $request = $this->model->insertRecomendaciones($recomendacion, $tipo);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delRecomendacion()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(18, true);

        $id = $_POST["id"];
        $request = $this->model->deleteRecomendacion($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updRecomendacion()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(18, true);

        $request = $this->model->updateRecomendacion($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["cbxEstadoUpdt"]);
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
