<?php
class AnimoModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectAnimo()
    {
        $query = "SELECT * FROM estado_animo;";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertAnimo(string $name, string $descripcion, int $peso)
    {
        $query = "INSERT INTO `estado_animo` 
        ( `estadoan_nombre`, `estadoan_descripcion`, `estadoan_peso`) 
        VALUES (?, ?, ?);";
        $request = $this->insert($query, [$name, $descripcion, $peso], DB_ACCIDENTES);
        return $request;
    }
    public function deleteAnimo(int $id)
    {
        $query = "DELETE FROM `bd_accidentes`.`estado_animo` WHERE  `estadoan_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updateAnimo(
        int $id,
        string $name,
        string $descripcion,
        int $peso,
        int $estado
    ) {
        $query = "UPDATE `bd_accidentes`.`estado_animo` SET 
        `estadoan_nombre`=?, 
        `estadoan_descripcion`=?, 
        `estadoan_peso`=?, 
        `estadoan_estado`=? 
        WHERE  
        `estadoan_id`=?;";
        $request = $this->update($query, [$name, $descripcion, $peso, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
}
