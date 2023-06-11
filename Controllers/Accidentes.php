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
        // $data['page_css'] = "roles/roles";
        // $data['page_function_js'] = "roles/functions_roles";
        // $data['lista_roles'] = $this->model->selectsRoles();

        $data['usuarios'] = $this->selectUsers();
        $this->views->getView($this, "accidentes", $data);
    }

    function selectUsers() {
        parent::verificarLogin(true);
        parent::verificarPermiso(6, true);

        $selectUser = $this->model->selectusers();

        return $selectUser;
    }
}
