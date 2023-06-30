<?php

class AccidentesModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }

    function selectsAccidentes()
    {
        $sql = 'SELECT * FROM accidentes ORDER BY accidentes_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    public function getAccidenteById(string $name_accidente, int $accidente_id)
    {
        $sql = "SELECT * FROM accidentes
        WHERE accidentes_nombre=:accidentes_nombre";

        $auxAccidente = [
            'accidentes_nombre' => $name_accidente
        ];

        if($accidente_id != -1){
            $sql .= " AND accidentes_id NOT IN (:accidentes_id) ";
            $auxAccidente = [
                'accidentes_nombre' => $name_accidente,
                'accidentes_id' => $accidente_id
            ];
        }

        return $this -> select($sql, $auxAccidente, DB_ACCIDENTES);
    }

    public function getAccidenteByIdName(int $accidente_id)
    {
        $sql = "SELECT * FROM accidentes
        WHERE accidentes_id=:accidentes_id";

        $auxAccidente = [
            'accidentes_id' => $accidente_id
        ];

        return $this -> select($sql, $auxAccidente, DB_ACCIDENTES);
    }

    public function borrar_accidente(int $accidente_id, int $estado = 0)
    {
        $delete = "UPDATE accidentes
        SET accidentes_estado=:accidentes_estado
        WHERE accidentes_id=:accidentes_id";

        $auxAccidente = [
            'accidentes_estado' => $estado,
            'accidentes_id' => $accidente_id
        ];

        return $this -> update($delete, $auxAccidente, DB_ACCIDENTES);
    }

    public function actualizar_accidente(string $name_accidente, string $descripcion_accidente, int $accidente_id)
    {
        $update = "UPDATE accidentes
        SET accidentes_nombre=:accidentes_nombre, accidentes_descripcion=:accidentes_descripcion
        WHERE accidentes_id=:accidentes_id";

        $auxAccidente = [
            'accidentes_nombre' => $name_accidente,
            'accidentes_descripcion' => $descripcion_accidente,
            'accidentes_id' => $accidente_id
        ];

        return $this -> update($update, $auxAccidente, DB_ACCIDENTES);
    }

    public function agregar_accidente(string $name_accidente, string $descripcion_accidente)
    {
        $insert = "INSERT INTO accidentes (accidentes_nombre, accidentes_descripcion) VALUES (:accidentes_nombre, :accidentes_descripcion)";

        $auxAccidente = [
            'accidentes_nombre' => $name_accidente,
            'accidentes_descripcion' => $descripcion_accidente
        ];

        return $this -> insert($insert, $auxAccidente, DB_ACCIDENTES);
    }

    public function updateAccidentes(int $accidentes_id, int $accidentes_estado)
    {
        $sql = "UPDATE accidentes SET accidentes_estado = :accidentes_estado
        WHERE accidentes_id = :accidentes_id";
        $request = $this->update($sql, ['accidentes_estado' => $accidentes_estado, 'accidentes_id' => $accidentes_id], DB_ACCIDENTES);

        return $request;
    }
}
