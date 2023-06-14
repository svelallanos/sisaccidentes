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
            $dataAccidentes[$key]['options'] = '<button class="btn btn-sm btn-warning btn-icon"><i class="feather-edit-3"></i></button>&nbsp;<button class="btn btn-sm btn-danger btn-icon"><i class="feather-trash-2"></i></button>';

            $dataAccidentes[$key]['estado'] = '<span class="badge bg-danger">Inactivo</span>';

            if(intval($value['accidentes_estado']) === 1) {
                $dataAccidentes[$key]['estado'] = '<span class="badge bg-success">Activo</span>';
            }
        }

        json($dataAccidentes);
    }
}
