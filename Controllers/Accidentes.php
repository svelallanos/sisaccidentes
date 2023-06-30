<?php
class Accidentes extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function accidentes()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(6, true);
        $data['page_id'] = 3;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Accidentes - Sistema COBBA";
        $data['page_name'] = "Lista de Accidentes";
        $data['page_function_js'] = "accidentes/functions_accidentes";
        $this->views->getView($this, "accidentes", $data);
    }

    function selectsAccidentes()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(6, true);

        $dataAccidentes = $this->model->selectsAccidentes();

        foreach ($dataAccidentes as $key => $value) {
            $dataAccidentes[$key]['numero'] = $key + 1;
            $dataAccidentes[$key]['options'] = '
            <button class="btn btn-sm btn-warning btn-icon btn_editar_accidente"
            accidente_id="'.$value['accidentes_id'].'"
            accidentes_nombre="'.$value['accidentes_nombre'].'"
            accidentes_descripcion="'.$value['accidentes_descripcion'].'">
                <i class="feather-edit-3"></i>
            </button>

            <button class="btn btn-sm btn-danger btn-icon btn_borrar_accidente"
            accidente_id="'.$value['accidentes_id'].'"
            accidentes_nombre="'.$value['accidentes_nombre'].'">
                <i class="feather-trash-2"></i>
            </button>';

            $dataAccidentes[$key]['estado'] = '<span class="badge bg-danger">Inactivo</span>';

            if(intval($value['accidentes_estado']) === 1) {
                $dataAccidentes[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
            }
            else if(intval($value['accidentes_estado']) === 0){
                $dataAccidentes[$key]['options'] = '
                <button class="btn btn-sm btn-success btn-icon __habilitar"
                accidente_id="'.$value['accidentes_id'].'"
                accidentes_nombre="'.$value['accidentes_nombre'].'">
                    <i class="fas fa-sync-alt"></i>
                </button>';
            }
        }

        json($dataAccidentes);
    }

    public function main_accidentes()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(6, true);

        $arrResp = [
            'message' => 'OCURRIÓ UN ERROR INESPERADO. COMUNÍQUESE CON EL ADMINISTRADOR',
            'status' => false,
            'title' => 'ERROR',
            'alert' => 'warning',
            'estado' => 0
        ];

        if($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST) || !isset($_POST['identificador'])){
            $arrResp['message'] = 'ERROR AL OBTENER DATOS';
            json($arrResp);
        }

        $identificador = intval($_POST['identificador']);

        if($identificador === 0){
            $arrResp['message'] = 'ERROR AL OBETENER DATOS DEL IDENTIFICADOR';
            json($arrResp);
        }

        $auxId          = ($identificador == 1) ? false : ((isset($_POST['accidentes_id']) ? false : true));
        $auxNombre      = ($identificador == 3) ? false : ((isset($_POST['name_accidente']) ? false : true));
        $auxDescripcion = ($identificador == 3) ? false : ((isset($_POST['descripcion_accidente']) ? false : true));

        if($auxId || $auxNombre || $auxDescripcion){
            $arrResp['message'] = 'ERROR AL OBTENER DATOS DE ACCIDENTES';
            json($arrResp);
        }

        $accidente_id = ($identificador == 1) ? -1 : intval($_POST['accidentes_id']);
        $name_accidente = ($identificador == 3) ? '0' : trim($_POST['name_accidente']);
        $descripcion_accidente = ($identificador == 3) ? '0' : trim($_POST['descripcion_accidente']);

        if($accidente_id != -1 && $accidente_id == 0){
            $arrResp['message'] = 'OCURRIÓ UN ERROR AL OBTENER DATOS DE ACCIDENTE';
            json($arrResp);
        }
    
        if($name_accidente != '0' && $name_accidente == ''){
            $arrResp['message'] = 'El nombre del accidente no puede ser vacío.';
            $arrResp['title'] = 'INCONVENIENTE ACCIDENTE';
            $arrResp['alert'] = 'warning';
            json($arrResp);
        }

        if($descripcion_accidente != '0' && $descripcion_accidente == ''){
            $arrResp['message'] = 'La descripción no puede ser vacía.';
            $arrResp['title'] = 'INCONVENIENTE ACCIDENTE';
            $arrResp['alert'] = 'warning';
            json($arrResp);
        }

        if($identificador != 3){
            //VERIFICAR EXISTENCIA DE NOMBRES DUPLICADOS.
            $existAccidente = $this -> model -> getAccidenteById($name_accidente, $accidente_id);

            if($existAccidente != false){
                $arrResp['message'] = 'El nombre de accidente <b>'.$name_accidente.'</b> ya está registrado ingrese uno diferente.';
                $arrResp['title'] = 'INCONVENIENTE ACCIDENTE';
                $arrResp['alert'] = 'warning';
                json($arrResp);
            }
        }

        if($identificador == 1)
        {
            //AGREGAR NUEVO ACCIDENTE.
            $insert_accidente = $this -> model -> agregar_accidente($name_accidente, $descripcion_accidente);

            if($insert_accidente > 0)
            {
                $arrResp['message'] = 'Se agregó el accidente <b>'.$name_accidente.'</b> correctamente.';
                $arrResp['alert'] = 'success';
                $arrResp['status'] = true;
            }
            else{
                $arrResp['message'] = 'Inconveniente al agregar el accidente <b>'.$name_accidente.'</b>.';
                $arrResp['estado'] = 1;
            }
        }
        else if($identificador == 2)
        {
            //ACTUALIZAR ACCIDENTE.
            $update_accidente = $this -> model -> actualizar_accidente($name_accidente, $descripcion_accidente, $accidente_id);

            if($update_accidente != false)
            {
                $arrResp['message'] = 'Se actualizó el accidente <b>'.$name_accidente.'</b> correctamente.';
                $arrResp['alert'] = 'success';
                $arrResp['status'] = true;
            }
            else{
                $arrResp['message'] = 'Inconveniente al actualizar el accidente <b>'.$name_accidente.'</b>.';
                $arrResp['estado'] = 1; 
            }
        }
        else if($identificador == 3)
        {
            //BORRAR ACCIDENTE.
            $dataAccidente = $this -> model -> getAccidenteByIdName($accidente_id);
            $delete_accidente = $this -> model -> borrar_accidente($accidente_id);

            if($delete_accidente != false){
               

                $arrResp['message'] = 'Se borró el accidente <b>'.$dataAccidente['accidentes_nombre'].'</b> correctamente.';
                $arrResp['alert'] = 'success';
                $arrResp['status'] = true;
            }
            else{
                $arrResp['message'] = 'Inconveniente al borrar el accidente <b>'.$dataAccidente['accidentes_nombre'].'</b>.';
                $arrResp['estado'] = 1; 
            }
        }

        json($arrResp);
    }

    public function updateAccidentes()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(6, true);

        $return = [
            'status' => false,
            'msg' => 'Error al momento habilitar el tipo de accidente.',
            'value' => 'error'
        ];

        if($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST)){
            json($return);
        }
        
        // Actualizamos

        $updateData = $this->model->updateAccidentes($_POST['accidente_id'], 1);

        if($updateData){
            $return = [
                'status' => true,
                'msg' => 'Accidente Habilitado.',
                'value' => 'success'
            ];
        }

        json($return);
    }
}
