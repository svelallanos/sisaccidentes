<?php
class Talla extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function talla()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(20, true);
        $data['page_id'] = 20;
        $data['page_tag'] = "Talla";
        $data['page_title'] = "Talla";
        $data['page_name'] = "Talla";
        $data['page_function_js'] = "talla/function_talla";
        $data['page_Epp'] = $this->model->selectEpp();
        $this->views->getView($this, "talla", $data);
    }
    public function getTalla()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(20, true);

        $request = $this->model->selectTalla();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["talla_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["talla_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["talla_id"] . '"
                                            data-name="' . $value["talla_nombre"] . '"
                                            data-description="' . $value["talla_descripcion"] . '"                                            
                                            data-estado="' . $value["talla_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["talla_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function saveTalla()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(20, true);

        $cbxEpp = $_POST["cbxEpp"];
        $txtTalla = $_POST["txtTalla"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $request = $this->model->insertTalla($cbxEpp, $txtDescripcion, $txtTalla);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delTalla()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(20, true);

        $id = $_POST["id"];
        $request = $this->model->deleteTalla($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function updTalla()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(20, true);

        $request = $this->model->updateTalla($_POST["id"], $_POST["txtNameUpd"], $_POST["txtDescripcionUdpt"],  $_POST["cbxEstadoUpdt"]);
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
