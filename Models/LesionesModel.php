<?php

class LesionesModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }

    // Select All

    function selectAllAccidentes()
    {
        $sql = 'SELECT * FROM accidentes ORDER BY accidentes_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    function selectAllLesiones()
    {
        $sql = 'SELECT * FROM lesiones ORDER BY lesiones_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    // Select
    // Insert

    function insertLesiones(int $accidentes_id, string $lesiones_nombre, string $lesiones_descripcion, int $lesiones_peso)
    {
        $sql = 'INSERT INTO lesiones (accidentes_id, lesiones_nombre, lesiones_descripcion, lesiones_peso) VALUES(:accidentes_id, :lesiones_nombre, :lesiones_descripcion, :lesiones_peso)';
        $arrData = [
            'accidentes_id' => $accidentes_id,
            'lesiones_nombre' => $lesiones_nombre,
            'lesiones_descripcion' => $lesiones_descripcion,
            'lesiones_peso' => $lesiones_peso,
        ];
        $request = $this->insert($sql, $arrData, DB_ACCIDENTES);

        return $request;
    }

    // Update
    function updateLesiones(int $lesiones_id, int $accidentes_id, string $lesiones_nombre, string $lesiones_descripcion, int $lesiones_peso)
    {
        $sql = 'UPDATE lesiones SET accidentes_id = :accidentes_id, lesiones_nombre = :lesiones_nombre, lesiones_descripcion = :lesiones_descripcion, lesiones_peso = :lesiones_peso 
        WHERE lesiones_id = :lesiones_id';

        $arrData = [
            'accidentes_id' => $accidentes_id,
            'lesiones_nombre' => $lesiones_nombre,
            'lesiones_descripcion' => $lesiones_descripcion,
            'lesiones_peso' => $lesiones_peso,
            'lesiones_id' => $lesiones_id
        ];

        $request = $this->update($sql, $arrData, DB_ACCIDENTES);

        return $request;
    }

    // Delete
    function deleteLesiones(int $lesiones_id)
    {
        $sql = "DELETE FROM lesiones 
        WHERE lesiones_id = :lesiones_id";
        $request = $this->delete($sql, ['lesiones_id' => $lesiones_id], DB_ACCIDENTES);

        return $request;
    }
}