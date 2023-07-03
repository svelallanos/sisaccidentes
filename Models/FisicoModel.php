<?php
class FisicoModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectFisico()
    {
        $query = "SELECT  * FROM `estado_fisico`;";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertFisico(string $name, string $descripcion, int $peso)
    {
        $query = "INSERT INTO `bd_accidentes`.`estado_fisico` 
        (`estadofs_nombre`, `estadofs_decripcion`, `estadofs_peso`) 
        VALUES 
        (?, ?, ?);";
        $request = $this->insert($query, [$name, $descripcion, $peso], DB_ACCIDENTES);
        return $request;
    }
    public function deleteFisico(int $id)
    {
        $query = "DELETE FROM `estado_fisico` WHERE  `estadofs_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updateFisico(
        int $id,
        string $name,
        string $descripcion,
        int $peso,
        int $estado
    ) {
        $query = "UPDATE `estado_fisico` SET 
        `estadofs_nombre`=?,
        `estadofs_decripcion`=?, 
        `estadofs_peso`=?, 
        `estadofs_estado`=? WHERE  `estadofs_id`=?;";
        $request = $this->update($query, [$name, $descripcion, $peso, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
}
