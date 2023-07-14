<?php
class Cargos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cargos()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(8, true);
        $data['page_id'] = 8;
        $data['page_tag'] = "Cargos";
        $data['page_title'] = "Cargos";
        $data['page_name'] = "Cargos";
        $data['page_function_js'] = "cargos/function_cargos";
        $this->views->getView($this, "cargos", $data);
    }
    public function getCargos()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(8, true);

        $request = $this->model->selectCargos();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["cargo_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["cargo_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["cargo_id"] . '"
                                            data-name="' . $value["cargo_nombre"] . '"
                                            data-description="' . $value["cargo_descripcion"] . '"                                            
                                            data-estado="' . $value["cargo_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["cargo_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveCargos()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(14, true);

        $txtName = $_POST["txtName"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertCargo($txtName, $txtDescripcion);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delCargo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(8, true);

        $id = $_POST["id"];
        $request = $this->model->deleteCargo($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updCargo()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(8, true);

        $request = $this->model->updateCargo($_POST["idAnimo"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"], $_POST["cbxEstadoUpdt"]);
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
