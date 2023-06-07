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
        $data['page_function_js'] = "web/functions_index";
        $this->views->getView($this, "index", $data);
    }

    public function historia()
    {
        $data['page_id'] = 51;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/historia";
        $data['page_function_js'] = "web/functions_historia";
        $this->views->getView($this, "historia", $data);
    }

    public function normatividad()
    {
        $data['page_id'] = 51;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/normatividad";
        $data['page_function_js'] = "web/functions_normatividad";
        $this->views->getView($this, "normatividad", $data);
    }

    public function funcionarios()
    {
        $data['page_id'] = 51;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/funcionarios";
        $data['page_function_js'] = "web/functions_funcionarios";

        $data['funcionarios'] = [
            0 => array(
                'funcionario_nombres' => 'Samuel',
                'funcionario_paterno' => 'Vela',
                'funcionario_materno' => 'Llanos',
                'funcionario_cargo' => 'Jefe de la Oficina de Informatica y Estadistica',
                'funcionario_perfil' => 'sin_foto.png',
                'funcionario_link_facebook' => 'https://www.facebook.com/',
                'funcionario_link_ig' => '',
                'funcionario_link_linkedln' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY',
                'funcionario_link_twitter' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY'
            ),
            1 => array(
                'funcionario_nombres' => 'Samuel',
                'funcionario_paterno' => 'Vela',
                'funcionario_materno' => 'Llanos',
                'funcionario_cargo' => 'Jefe de la Oficina de Informatica y Estadistica',
                'funcionario_perfil' => 'sin_foto.png',
                'funcionario_link_facebook' => 'https://www.facebook.com/',
                'funcionario_link_ig' => '',
                'funcionario_link_linkedln' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY',
                'funcionario_link_twitter' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY'
            ),
            2 => array(
                'funcionario_nombres' => 'Samuel',
                'funcionario_paterno' => 'Vela',
                'funcionario_materno' => 'Llanos',
                'funcionario_cargo' => 'Jefe de la Oficina de Informatica y Estadistica',
                'funcionario_perfil' => 'sin_foto.png',
                'funcionario_link_facebook' => 'https://www.facebook.com/',
                'funcionario_link_ig' => '',
                'funcionario_link_linkedln' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY',
                'funcionario_link_twitter' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY'
            ),
            3 => array(
                'funcionario_nombres' => 'Samuel',
                'funcionario_paterno' => 'Vela',
                'funcionario_materno' => 'Llanos',
                'funcionario_cargo' => 'Jefe de la Oficina de Informatica y Estadistica',
                'funcionario_perfil' => 'funcionarios_7.webp',
                'funcionario_link_facebook' => 'https://www.facebook.com/',
                'funcionario_link_ig' => '',
                'funcionario_link_linkedln' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY',
                'funcionario_link_twitter' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY'
            ),
            4 => array(
                'funcionario_nombres' => 'Samuel',
                'funcionario_paterno' => 'Vela',
                'funcionario_materno' => 'Llanos',
                'funcionario_cargo' => 'Jefe de la Oficina de Informatica y Estadistica',
                'funcionario_perfil' => 'sin_foto.png',
                'funcionario_link_facebook' => 'https://www.facebook.com/',
                'funcionario_link_ig' => '',
                'funcionario_link_linkedln' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY',
                'funcionario_link_twitter' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY'
            ),
            5 => array(
                'funcionario_nombres' => 'Samuel',
                'funcionario_paterno' => 'Vela',
                'funcionario_materno' => 'Llanos',
                'funcionario_cargo' => 'Jefe de la Oficina de Informatica y Estadistica',
                'funcionario_perfil' => 'funcionarios_7.webp',
                'funcionario_link_facebook' => 'https://www.facebook.com/',
                'funcionario_link_ig' => '',
                'funcionario_link_linkedln' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY',
                'funcionario_link_twitter' => 'https://www.youtube.com/watch?v=PWmJhh_qTSY'
            )
        ];
        // json($funciarios);





        $this->views->getView($this, "funcionarios", $data);
    }

    public function alcalde()
    {
        $data['page_id'] = 51;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/alcalde";
        // $data['page_function_js'] = "web/functions_funcionarios";
        $this->views->getView($this, "alcalde", $data);
    }

    // Normatividad

    public function resoluciones_alcaldia()
    {
        $data['page_id'] = 51;
        $data['page_tag'] = "MDESV - Sistema Caja";
        $data['page_title'] = ":. Roles - Sistema Caja";
        $data['page_name'] = "Lista de Roles";
        $data['page_css'] = "web/resoluciones_alcaldia";
        $data['page_function_js'] = "web/functions_res_alcaldia";
        $data['array_dataTable_css'] = ['jquery.dataTables.min', 'responsive.dataTables.min'];
        $data['array_dataTable_js'] = ['jquery.dataTables.min','dataTables.responsive.min'];
        $this->views->getView($this, "resoluciones_alcaldia", $data);
    }
}
