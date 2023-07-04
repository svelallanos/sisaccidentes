<?php
class PsicologicoModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectPsicologico()
    {
        $query = "SELECT * FROM `estado_psicologico`;";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertPsicologico(string $name, string $descripcion, int $peso)
    {
        $query = "INSERT INTO `bd_accidentes`.`estado_psicologico` 
        (`estadopsc_nombre`, `estadopsc_descripcion`, `estadopsc_peso`) 
        VALUES (?, ?, ?);";
        $request = $this->insert($query, [$name, $descripcion, $peso], DB_ACCIDENTES);
        return $request;
    }
    public function deletePsicologico(int $id)
    {
        $query = "DELETE FROM `estado_psicologico` WHERE  `estadopsc_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updatePsicologico(
        int $id,
        string $name,
        string $descripcion,
        int $peso,
        int $estado
    ) {
        $query = "UPDATE 
        `estado_psicologico` 
        SET `estadopsc_nombre`=?, 
        `estadopsc_descripcion`=?, 
        `estadopsc_peso`=?, 
        `estadopsc_estado`=? 
        WHERE  `estadopsc_id`=?;";
        $request = $this->update($query, [$name, $descripcion, $peso, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
}
