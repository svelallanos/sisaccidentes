<?php
class Animo extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function animo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(11, true);
        $data['page_id'] = 11;
        $data['page_tag'] = "Animo";
        $data['page_title'] = "Animo";
        $data['page_name'] = "Animo";
        $data['page_function_js'] = "animo/function_animo";
        $this->views->getView($this, "animo", $data);
    }
    public function getAnimo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(11, true);

        $request = $this->model->selectAnimo();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["estadoan_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["estadoan_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["estadoan_id"] . '"
                                            data-name="' . $value["estadoan_nombre"] . '"
                                            data-peso="' . $value["estadoan_peso"] . '"
                                            data-description="' . $value["estadoan_descripcion"] . '"                                            
                                            data-estado="' . $value["estadoan_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["estadoan_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveAnimo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(11, true);

        $txtName = $_POST["txtName"];
        $txtPeso = $_POST["txtPeso"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertAnimo($txtName, $txtDescripcion, $txtPeso);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'ESTADO DE ANIMO ' . $txtName . ' GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delAnimo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(11, true);

        $id = $_POST["id"];
        $request = $this->model->deleteAnimo($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'ESTADO DE ANIMO  ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updAnimo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(11, true);

        $request = $this->model->updateAnimo($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"], $_POST["txtPesoUpdt"], $_POST["cbxEstadoUpdt"]);
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
