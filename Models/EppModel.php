<?php
class EppModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectEpp()
    {
        $query = "SELECT  * FROM `epp`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function selectHEpp()
    {
        $query = "SELECT  * FROM historial_epp AS he 
        INNER JOIN usuarios     AS u ON u.usuarios_id=he.user_id
        INNER JOIN talla        AS t ON t.talla_id=he.talla_id 
        INNER JOIN epp          AS e ON e.epp_id=t.epp_id";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertEpp(string $name, string $descripcion, int $peso, int $cantidad)
    {
        $query = "INSERT INTO 
        `epp` (`epp_nombre`, `epp_descripcion`, `epp_cantidad`, `epp_peso`) 
        VALUES (?,?,?,?);";
        $request = $this->insert($query, [$name, $descripcion, $cantidad, $peso], DB_ACCIDENTES);
        return $request;
    }
    public function insertHEpp(int $idUser, int $idTalla, int $cantidad)
    {
        $query = "INSERT INTO `historial_epp` (`talla_id`, `user_id`, `hepp_cantidad`) VALUES (?, ?,?);";
        $request = $this->insert($query, [$idTalla, $idUser, $cantidad], DB_ACCIDENTES);
        return $request;
    }
    public function deleteEpp(int $id)
    {
        $query = "DELETE FROM `epp` WHERE  `epp_id`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function deleteHEpp(int $id)
    {
        $query = "DELETE FROM `historial_epp` WHERE  `hepp_id`=?;";
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
    public function selectUser()
    {
        $query = "SELECT * FROM `usuarios`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function selectTalla(int $id)
    {
        $query = "SELECT*FROM talla AS t WHERE t.epp_id={$id}";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
}
