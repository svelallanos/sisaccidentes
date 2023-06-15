<?php

class LesionesModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }

    function selectsAccidentes()
    {
        $sql = 'SELECT * FROM lesiones ORDER BY lesiones_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    public function getLesionesById(string $name_lesion, int $lesion_id)
    {
        $sql = "SELECT * FROM lesiones
        WHERE lesiones_nombre=:lesiones_nombre";

        $auxLesion = [
            'lesiones_nombre' => $name_lesion
        ];

        if($lesion_id != -1){
            $sql .= " AND lesiones_id NOT IN (:lesiones_id) ";
            $auxLesion = [
                'accidentes_nombre' => $name_lesion,
                'accidentes_id' => $lesion_id
            ];
        }

        return $this -> select($sql, $auxLesion, DB_ACCIDENTES);
    }

    public function getLesionByIdName(int $lesion_id)
    {
        $sql = "SELECT * FROM lesiones
        WHERE lesiones_id=:lesiones_id";

        $auxLesion = [
            'lesiones_id' => $lesion_id
        ];

        return $this -> select($sql, $auxLesion, DB_ACCIDENTES);
    }

    public function borrar_lesion(int $lesion_id, int $estado = 0)
    {
        $delete = "UPDATE lesiones
        SET lesiones_estado=:lesiones_estado
        WHERE lesiones_id=:lesiones_id";

        $auxLesion = [
            'lesiones_estado' => $estado,
            'lesiones_id' => $lesion_id
        ];

        return $this -> update($delete, $auxLesion, DB_ACCIDENTES);
    }

    public function actualizar_lesion(string $name_lesion, string $descripcion_lesion, int $lesion_id)
    {
        $update = "UPDATE lesiones
        SET lesiones_nombre=:lesiones_nombre, lesiones_descripcion=:lesiones_descripcion
        WHERE lesiones_id=:lesiones_id";

        $auxLesion = [
            'lesiones_nombre' => $name_lesion,
            'lesiones_descripcion' => $descripcion_lesion,
            'lesiones_id' => $lesion_id
        ];

        return $this -> update($update, $auxLesion, DB_ACCIDENTES);
    }

    public function agregar_accidente(string $name_lesion, string $descripcion_lesion)
    {
        $insert = "INSERT INTO lesiones (lesiones_nombre, lesiones_descripcion) VALUES (:lesiones_nombre, :lesiones_descripcion)";

        $auxLesion = [
            'lesiones_nombre' => $name_lesion,
            'lesiones_descripcion' => $descripcion_lesion
        ];

        return $this -> insert($insert, $auxLesion, DB_ACCIDENTES);
    }
}