<?php
class ActividadesModel extends Mysql
{
  function __construct()
  {
    parent::__construct();
  }
  public function selectActividades()
  {
    $query = "SELECT  * FROM `actividades`";
    $request = $this->select_all($query, [], DB_ACCIDENTES);
    return $request;
  }
  public function insertActividades(string $name, string $descripcion, int $peso)
  {
    $query = "INSERT INTO `bd_accidentes`.`actividades` (`cargo_id`, `actividades_nombre`, `actividades_descripcion`, `actividades_peso`) VALUES (1, ?, ?, ?);";
    $request = $this->insert($query, [$name, $descripcion, $peso], DB_ACCIDENTES);
    return $request;
  }
  public function deleteActividades(int $id)
  {
    $query = "DELETE FROM `actividades` WHERE  `actividades_id`=?;";
    $request = $this->delete($query, [$id], DB_ACCIDENTES);
    return $request;
  }
  public function updateActividades(
    int $id,
    string $name,
    string $descripcion,
    int $peso,
    int $estado
  ) {
    $query = "UPDATE `actividades` 
    SET 
    `actividades_nombre`=?, 
    `actividades_descripcion`=?, 
    `actividades_peso`=?, 
    `actividades_estado`=?
    WHERE  
    `actividades_id`=?";
    $request = $this->update($query, [$name, $descripcion, $peso, $estado, $id], DB_ACCIDENTES);
    return $request;
  }
}
