<?php
class Academico extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function academico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(14, true);
        $data['page_id'] = 14;
        $data['page_tag'] = "Estado Academico";
        $data['page_title'] = "Estado Academico";
        $data['page_name'] = "Estado Academico";
        $data['page_function_js'] = "academico/function_academico";
        $this->views->getView($this, "academico", $data);
    }
    public function getAcademico()
    {
        $request = $this->model->selectAcademico();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["nivel_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["nivel_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["nivel_id"] . '"
                                            data-name="' . $value["nivel_nombre"] . '"
                                            data-peso="' . $value["nivel_peso"] . '"
                                            data-description="' . $value["nivel_descripcion"] . '"                                            
                                            data-estado="' . $value["nivel_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["nivel_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveAcademico()
    {
        $txtName = $_POST["txtName"];
        $txtPeso = $_POST["txtPeso"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertAcademico($txtName, $txtDescripcion, $txtPeso);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delAcademico()
    {
        $id = $_POST["id"];
        $request = $this->model->deleteAcademico($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updAcademico()
    {

        $request = $this->model->updateAcademico($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"], $_POST["txtPesoUpdt"], $_POST["cbxEstadoUpdt"]);
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
