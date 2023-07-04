<?php

class CapacitacionesModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }

    // Select All
    function selectAllCapacitaciones()
    {
        $sql = 'SELECT * FROM capacitaciones ORDER BY capacitaciones_fechacreacion DESC';
        $result = $this->select_all($sql, array(), DB_ACCIDENTES);

        return $result;
    }

    // Select
    // Insert

    function insertCapacitaciones( string $capacitaciones_nombre, string $capacitaciones_descripcion, int $capacitaciones_peso)
    {
        $sql = 'INSERT INTO capacitaciones (capacitaciones_nombre, capacitaciones_descripcion, capacitaciones_peso) VALUES(:capacitaciones_nombre, :capacitaciones_descripcion, :capacitaciones_peso)';
        $arrData = [
            'capacitaciones_nombre' => $capacitaciones_nombre,
            'capacitaciones_descripcion' => $capacitaciones_descripcion,
            'capacitaciones_peso' => $capacitaciones_peso,
        ];
        $request = $this->insert($sql, $arrData, DB_ACCIDENTES);

        return $request;
    }

    // Update
    function updateCapacitaciones(int $capacitaciones_id, string $capacitaciones_nombre, string $capacitaciones_descripcion, int $capacitaciones_peso)
    {
        $sql = 'UPDATE capacitaciones SET capacitaciones_nombre = :capacitaciones_nombre, capacitaciones_descripcion = :capacitaciones_descripcion, capacitaciones_peso = :capacitaciones_peso 
        WHERE capacitaciones_id = :capacitaciones_id';

        $arrData = [
            'capacitaciones_nombre' => $capacitaciones_nombre,
            'capacitaciones_descripcion' => $capacitaciones_descripcion,
            'capacitaciones_peso' => $capacitaciones_peso,
            'capacitaciones_id' => $capacitaciones_id
        ];

        $request = $this->update($sql, $arrData, DB_ACCIDENTES);

        return $request;
    }

    // Delete
    function deleteCapacitaciones(int $capacitaciones_id)
    {
        $sql = "DELETE FROM capacitaciones 
        WHERE capacitaciones_id = :capacitaciones_id";
        $request = $this->delete($sql, ['capacitaciones_id' => $capacitaciones_id], DB_ACCIDENTES);

        return $request;
    }
}