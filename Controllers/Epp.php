<?php
class Epp extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function epp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(17, true);
        $data['page_id'] = 17;
        $data['page_tag'] = "EPP";
        $data['page_title'] = "EPP";
        $data['page_name'] = "EPP";
        $data['page_function_js'] = "epp/function_epp";
        $this->views->getView($this, "epp", $data);
    }
    public function hepp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(19, true);
        $data['page_id'] = 19;
        $data['page_tag'] = "Historial EPP";
        $data['page_title'] = "Historial EPP";
        $data['page_name'] = "Historial EPP";
        $data['page_function_js'] = "epp/function_hepp";
        $data['page_user'] = $this->model->selectUser();
        $data['page_epps'] = self::getEpps();
        $this->views->getView($this, "hepp", $data);
    }
    public function getEpp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(17, true);

        $request = $this->model->selectEpp();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;
            if ($value["epp_estado"]) {
                $val = '<span class="badge bg-success">Activo</span>';
            } else {
                $val = '<span class="badge bg-danger">Inactivo</span>';
            }
            $request[$key]["epp_estado"] = $val;
            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-warning __editar"
                                            data-id="' . $value["epp_id"] . '"
                                            data-name="' . $value["epp_nombre"] . '"
                                            data-peso="' . $value["epp_peso"] . '"
                                            data-description="' . $value["epp_descripcion"] . '"                                            
                                            data-estado="' . $value["epp_estado"] . '"                                            
                                            >
                                                <i class="feather-edit-3"></i>
                                            </button>
                                            &nbsp;
                                            <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["epp_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        echo json($request);
    }
    public function getHEpp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(19, true);
        $request = $this->model->selectHEpp();
        $cont = 1;
        foreach ($request as $key => $value) {
            $request[$key]["numero"] = $cont;


            $request[$key]["acciones"] = '  <button 
                                            class="btn btn-sm btn-icon btn-danger __delete"
                                            data-id="' . $value["hepp_id"] . '"
                                            >
                                                <i class="feather-trash"></i>
                                            </button>';
            $cont++;
        }
        json($request);
    }
    public function saveEpp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(17, true);

        $txtName = $_POST["txtName"];
        $txtPeso = $_POST["txtPeso"];
        $txtDescripcion = $_POST["txtDescripcion"];
        $txtCantidad = $_POST["txtCantidad"];
        $request = $this->model->insertEpp($txtName, $txtDescripcion, $txtPeso, $txtCantidad);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delEpp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(17, true);

        $id = $_POST["id"];
        $request = $this->model->deleteEpp($id);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO ELIMINADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
    public function delHEpp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(19, true);

        $id = $_POST["id"];
        $request = $this->model->deleteHEpp($id);
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
        parent::verificarLogin(true);
        parent::verificarPermiso(17, true);

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
    public function getEpps()
    {
        $request = $this->model->selectEpp();
        foreach ($request as $key => $value) {
            $arrTalla = $this->model->selectTalla($value["epp_id"]);
            $request[$key]["talla"] = $arrTalla;
        }
        return $request;
    }
    public function saveHEpp()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(19, true);

        $cbxUser = $_POST["cbxUser"];
        $cbxEpp = $_POST["cbxEpp"];
        $txtCantidad = $_POST["txtCantidad"];
        $request = $this->model->insertHEpp($cbxUser, $cbxEpp, $txtCantidad);
        if ($request) {
            $return = [
                'status' => true,
                'message' => 'REGISTRO: GUARDADO CORRECTAMENTE.',
                'value' => 'success'
            ];
        }

        json($return);
    }
}
