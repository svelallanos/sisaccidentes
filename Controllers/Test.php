<?php

class Test extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(9, true);
        $data['page_id'] = 9;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Test Accidentes - Sistema COBBA";
        $data['page_name'] = "Test de accidente";
        $data['page_function_js'] = "test/functions_test";
        $this->views->getView($this, "test", $data);
    }

    public function historial()
    {
        parent::verificarLogin(true);
        parent::verificarPermiso(9, true);
        $data['page_id'] = 9;
        $data['page_tag'] = "MDESV - Sistema COBBA";
        $data['page_title'] = ":. Historial de test de accidentes - Sistema COBBA";
        $data['page_name'] = "Historial de test de accidentes";
        $data['page_function_js'] = "test/functions_test";
        $this->views->getView($this, "historial", $data);
    }
}
