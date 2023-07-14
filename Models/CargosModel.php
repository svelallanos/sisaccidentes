<?php
class CargosModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectCargos()
    {
        $query = "SELECT  * FROM `cargo`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertCargo(string $name, string $descripcion)
    {
        $query = "INSERT INTO `cargo` (`cargo_nombre`, `cargo_descripcion`) VALUES (?, ?);";
        $request = $this->insert($query, [$name, $descripcion], DB_ACCIDENTES);
        return $request;
    }
    public function deleteCargo(int $id)
    {
        $query = "DELETE FROM `cargo` WHERE  `cargo_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updateCargo(
        int $id,
        string $name,
        string $descripcion,
        int $estado
    ) {
        $query = "UPDATE `cargo` 
        SET 
        `cargo_nombre`=?, 
        `cargo_descripcion`=?, 
        `cargo_estado`=? 
        WHERE  
        `cargo_id`=?;";
        $request = $this->update($query, [$name, $descripcion, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
}
