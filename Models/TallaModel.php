<?php
class TallaModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectTalla()
    {
        $query = "SELECT * FROM epp AS e INNER JOIN talla AS t ON t.epp_id=e.epp_id";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertTalla(int $idEpp, string $descripcion, string $talla)
    {
        $query = "INSERT INTO `talla` (`epp_id`, `talla_nombre`, `talla_descripcion`) VALUES (?, ?, ?);";
        $request = $this->insert($query, [$idEpp, $descripcion, $talla], DB_ACCIDENTES);
        return $request;
    }
    public function deleteTalla(int $id)
    {
        $query = "DELETE FROM `talla` WHERE  `talla_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updateTalla(
        int $id,
        string $name,
        string $descripcion,
        int $estado
    ) {
        $query = "UPDATE `talla` 
        SET 
        `talla_nombre`=?, 
        `talla_descripcion`=?, 
        `talla_estado`=? 
        WHERE  
        `talla_id`=?;";
        $request = $this->update($query, [$name, $descripcion, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
    public function selectEpp()
    {
        $query = "SELECT * FROM epp;";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
}
