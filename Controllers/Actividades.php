<?php
class Actividades extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actividades()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(7, true);
        $data['page_id'] = 3;
        $data['page_tag'] = "Actividades";
        $data['page_title'] = ":. Actividades ";
        $data['page_name'] = "Lista de Actividades";
        // $data['page_css'] = "roles/roles";
        // $data['page_function_js'] = "roles/functions_roles";
        // $data['lista_roles'] = $this->model->selectsRoles();
        $this->views->getView($this, "actividades", $data);
    }
}
