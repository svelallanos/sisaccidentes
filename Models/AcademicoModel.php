<?php
class AcademicoModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectAcademico()
    {
        $query = "SELECT  * FROM `nivel_academico`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertAcademico(string $name, string $descripcion, int $peso)
    {
        $query = "INSERT INTO `nivel_academico` (`nivel_nombre`, `nivel_descripcion`, `nivel_peso`) VALUES (?, ?, ?);";
        $request = $this->insert($query, [$name, $descripcion, $peso], DB_ACCIDENTES);
        return $request;
    }
    public function deleteAcademico(int $id)
    {
        $query = "DELETE FROM `nivel_academico` WHERE  `nivel_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updateAcademico(
        int $id,
        string $name,
        string $descripcion,
        int $peso,
        int $estado
    ) {
        $query = "UPDATE `nivel_academico` SET 
        `nivel_nombre`=?, 
        `nivel_descripcion`=?, 
        `nivel_peso`=?, 
        `nivel_estado`=? 
        WHERE  `nivel_id`=?;";
        $request = $this->update($query, [$name, $descripcion, $peso, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
}
