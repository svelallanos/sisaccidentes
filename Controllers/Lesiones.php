<?php
class Lesiones extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $data['page_id'] = 3;
        $data['page_tag'] = "Lesiones";
        $data['page_title'] = "Lesiones";
        $data['page_name'] = "Lesiones";
        // $data['page_css'] = "roles/roles";
        $data['page_function_js'] = "lesiones/lesion";
        // $data['lista_roles'] = $this->model->selectsRoles();
        $this->views->getView($this, "lesiones", $data);
    }

    function getDataLesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

        $lesiones = $this->model->selectsAccidentes();

        foreach ($lesiones as $key => $value) {
            $lesiones[$key]['numero'] = $key + 1;
            $lesiones[$key]['options'] = '
            <button class="btn btn-sm btn-warning btn-icon btn_editar_lesion"
            lesiones_id="'.$value['lesiones_id'].'"
            lesiones_nombre="'.$value['lesiones_nombre'].'"
            lesiones_descripcion="'.$value['lesiones_descripcion'].'">
                <i class="feather-edit-3"></i>
            </button>

            <button class="btn btn-sm btn-danger btn-icon btn_borrar_lesion"
            lesiones_id="'.$value['lesiones_id'].'"
            lesiones_nombre="'.$value['lesiones_nombre'].'">
                <i class="feather-trash-2"></i>
            </button>';

            $lesiones[$key]['estado'] = '<span class="badge bg-danger">Inactivo</span>';

            if(intval($value['lesiones_estado']) === 1) {
                $lesiones[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
            }
            else if(intval($value['lesiones_estado']) === 0){
                $lesiones[$key]['options'] = '
                <button class="btn btn-sm btn-success btn-icon"
                lesiones_id="'.$value['lesiones_id'].'"
                lesiones_nombre="'.$value['lesiones_nombre'].'">
                    <i class="fas fa-sync-alt"></i>
                </button>';
            }
        }

        json($lesiones);
    }

    public function main_lesiones()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);

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

        $auxId          = ($identificador == 1) ? false : ((isset($_POST['lesiones_id']) ? false : true));
        $auxNombre      = ($identificador == 3) ? false : ((isset($_POST['lesiones_nombre']) ? false : true));
        $auxDescripcion = ($identificador == 3) ? false : ((isset($_POST['lesiones_descripcion']) ? false : true));

        if($auxId || $auxNombre || $auxDescripcion){
            $arrResp['message'] = 'ERROR AL OBTENER DATOS DE ACCIDENTES';
            json($arrResp);
        }

        $lesiones_id = ($identificador == 1) ? -1 : intval($_POST['lesiones_id']);
        $lesiones_nombre = ($identificador == 3) ? '0' : trim($_POST['lesiones_nombre']);
        $lesiones_descripcion = ($identificador == 3) ? '0' : trim($_POST['lesiones_descripcion']);

        if($lesiones_id != -1 && $lesiones_id == 0){
            $arrResp['message'] = 'OCURRIÓ UN ERROR AL OBTENER DATOS DE ACCIDENTE';
            json($arrResp);
        }
    
        if($lesiones_nombre != '0' && $lesiones_nombre == ''){
            $arrResp['message'] = 'El nombre de la lesión no puede ser vacía.';
            $arrResp['title'] = 'INCONVENIENTE LESIONES';
            $arrResp['alert'] = 'warning';
            json($arrResp);
        }

        if($lesiones_descripcion != '0' && $lesiones_descripcion == ''){
            $arrResp['message'] = 'La descripción no puede ser vacía.';
            $arrResp['title'] = 'INCONVENIENTE LESIONES';
            $arrResp['alert'] = 'warning';
            json($arrResp);
        }

        if($identificador != 3){
            //VERIFICAR EXISTENCIA DE NOMBRES DUPLICADOS.
            $existLesion = $this -> model -> getAccidenteById($lesiones_nombre, $lesiones_id);

            if($existLesion != false){
                $arrResp['message'] = 'El nombre de la lesión <b>'.$lesiones_nombre.'</b> ya está registrada ingrese uno diferente.';
                $arrResp['title'] = 'INCONVENIENTE LESIONES';
                $arrResp['alert'] = 'warning';
                json($arrResp);
            }
        }

        if($identificador == 1)
        {
            //AGREGAR NUEVA LESIÓN.
            $insert_accidente = $this -> model -> agregar_lesion($lesiones_nombre, $lesiones_descripcion);

            if($insert_accidente > 0)
            {
                $arrResp['message'] = 'Se agregó la lesión <b>'.$lesiones_nombre.'</b> correctamente.';
                $arrResp['alert'] = 'success';
                $arrResp['status'] = true;
            }
            else{
                $arrResp['message'] = 'Inconveniente al agregar lesión <b>'.$lesiones_nombre.'</b>.';
                $arrResp['estado'] = 1;
            }
        }
        else if($identificador == 2)
        {
            //ACTUALIZAR ACCIDENTE.
            $update_accidente = $this -> model -> actualizar_lesion($lesiones_nombre, $lesiones_descripcion, $lesiones_id);

            if($update_accidente != false)
            {
                $arrResp['message'] = 'Se actualizó la lesión <b>'.$lesiones_nombre.'</b> correctamente.';
                $arrResp['alert'] = 'success';
                $arrResp['status'] = true;
            }
            else{
                $arrResp['message'] = 'Inconveniente al actualizar la lesión <b>'.$lesiones_nombre.'</b>.';
                $arrResp['estado'] = 1; 
            }
        }
        else if($identificador == 3)
        {
            //BORRAR ACCIDENTE.
            $dataLesion = $this -> model -> getLesionByIdName($lesiones_id);
            $delete_accidente = $this -> model -> borrar_lesion($lesiones_id);

            if($delete_accidente != false){
               

                $arrResp['message'] = 'Se borró la lesión <b>'.$dataLesion['lesiones_nombre'].'</b> correctamente.';
                $arrResp['alert'] = 'success';
                $arrResp['status'] = true;
            }
            else{
                $arrResp['message'] = 'Inconveniente al borrar la lesión <b>'.$dataLesion['lesiones_nombre'].'</b>.';
                $arrResp['estado'] = 1; 
            }
        }

        json($arrResp);
    }
}