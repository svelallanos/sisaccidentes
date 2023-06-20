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
        parent::verificarPermiso(13, true);
        $data['page_id'] = 3;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Equipos de proteccion personal";
        // $data['page_css'] = "roles/roles";
        // $data['page_function_js'] = "roles/functions_roles";
        // $data['lista_roles'] = $this->model->selectsRoles();
        $this->views->getView($this, "epp", $data);
    }
}
