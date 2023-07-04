<?php
class Fisico extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fisico()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(12, true);
        $data['page_id'] = 12;
        $data['page_tag'] = "Estado Fisico";
        $data['page_title'] = "Estado Fisico";
        $data['page_name'] = "Estado Fisico";
        $data['page_function_js'] = "fisico/function_fisico";
        $this->views->getView($this, "fisico", $data);
    }
    public function getFisico()
    {
        $request = $this->model->selectFisico();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["estadofs_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["estadofs_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["estadofs_id"] . '"
                                            data-name="' . $value["estadofs_nombre"] . '"
                                            data-peso="' . $value["estadofs_peso"] . '"
                                            data-description="' . $value["estadofs_decripcion"] . '"                                            
                                            data-estado="' . $value["estadofs_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["estadofs_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveFisico()
    {
        $txtName = $_POST["txtName"];
        $txtPeso = $_POST["txtPeso"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertFisico($txtName, $txtDescripcion, $txtPeso);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'ESTADO DE FISICO ' . $txtName . ' GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delFisico()
    {
        $id = $_POST["id"];
        $request = $this->model->deleteFisico($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'ESTADO DE FISICO  ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updFisico()
    {

        $request = $this->model->updateFisico($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"], $_POST["txtPesoUpdt"], $_POST["cbxEstadoUpdt"]);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'ESTADO DE ANIMO  ACTUALIZADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }
        echo json($return);
    }
}
