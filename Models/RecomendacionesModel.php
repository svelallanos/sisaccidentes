<?php
class RecomendacionesModel extends Mysql
{
    function __construct()
    {
        parent::__construct();
    }
    public function selectRecomendaciones()
    {
        $query = "SELECT  * FROM `recomendaciones`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function insertRecomendaciones(string $recomendacion, string $tipo)
    {
        $query = "INSERT INTO `bd_accidentes`.`recomendaciones` (`recomendacion`, `tipoRecomendacion`) VALUES (?, ?);";
        $request = $this->insert($query, [$recomendacion, $tipo], DB_ACCIDENTES);
        return $request;
    }
    public function deleteRecomendacion(int $id)
    {
        $query = "DELETE FROM `recomendaciones` WHERE  `idRecomendaciones`=?;";
        $request = $this->delete($query, [$id], DB_ACCIDENTES);
        return $request;
    }
    public function updateRecomendacion(
        int $id,
        string $name,
        string $estado
    ) {
        $query = "UPDATE `recomendaciones` SET 
        `recomendacion`=? , 
        `tipoRecomendacion`=? 
        WHERE  
        `idRecomendaciones`=?;";
        $request = $this->update($query, [$name, $estado, $id], DB_ACCIDENTES);
        return $request;
    }
}
