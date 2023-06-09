<?php

class Portalweb extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function portalweb()
    {
        $data['page_id'] = 50;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/index";
        $data['page_array_js'] = ['web/functions_index', 'web/functions_login'];
        $this->views->getView($this, "index", $data);
    }

    public function nosotros()
    {
        $data['page_id'] = 50;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/nosotros";
        $data['page_function_js'] = "web/functions_nosotros";
        $this->views->getView($this, "nosotros", $data);
    }
}
