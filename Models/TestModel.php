<?php

class TestModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertTest(int $id, string $descripcion, int $bajo, int $medio, int $alto, string $recomendaciones)
    {
        $query = "INSERT INTO `test` 
        (`usuarios_id`,`test_descripcion`, `test_bajo`, `test_medio`, `test_alto`, `test_recomendaciones`) 
        VALUES (?,?, ?, ?, ?, ?);";
        $request = $this->insert($query, [$id, $descripcion, $bajo, $medio, $alto, $recomendaciones], DB_ACCIDENTES);
        return $request;
    }
    public function selectHistorial(int $id)
    {
        $query = "SELECT*FROM test AS t WHERE t.usuarios_id='{$id}';";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function selectHistorialAll()
    {
        $query = "SELECT*FROM test AS t INNER JOIN usuarios AS u ON u.usuarios_id=t.usuarios_id;";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function selectTest(int $id)
    {
        $query = "SELECT*FROM test AS t WHERE t.test_id='{$id}';";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function genero()
    {
        $query = "SELECT * FROM `genero`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function academico()
    {
        $query = "SELECT * FROM `nivel_academico`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function fisico()
    {
        $query = "SELECT * FROM `estado_fisico`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function cargo()
    {
        $query = "SELECT * FROM `cargo`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function laboral()
    {
        $query = "SELECT * FROM `actividades`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function animo()
    {
        $query = "SELECT * FROM `estado_animo`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function psicologico()
    {
        $query = "SELECT * FROM `estado_psicologico`";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
    public function recomendaciones(string $tipo)
    {
        $query = "SELECT*FROM recomendaciones AS r WHERE r.tipoRecomendacion='{$tipo}'";
        $request = $this->select_all($query, [], DB_ACCIDENTES);
        return $request;
    }
}
