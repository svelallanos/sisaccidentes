<?php

class Mysql extends Conexion
{
  private $strquery;
  private $arrvalues;

  function __construct()
  {
    $auxConexion = new Conexion();
    $this->conexionPortal = $auxConexion->conectPortal();
  }

  public function insert(string $query, array $arrvalues = array(), string $base = '')
  {
    $this->strquery = $query;
    $this->arrvalues = $arrvalues;

    if ($base == 'portal_mdesv') {
      $insert = $this->conexionPortal->prepare($this->strquery);
    } else {
      echo 'Base de datos no especificada.';
      die;
    }

    $lastInsert = $insert->execute($this->arrvalues);

    if ($lastInsert) {
      if ($base == 'portal_mdesv') {
        $lastInsert = $this->conexionPortal->lastInsertId();
      }
    } else {
      $lastInsert = 0;
    }

    $insert->closeCursor();
    return intval($lastInsert);
  }

  public function update(string $query, array $arrvalues = array(), string $base = '')
  {
    $this->strquery = $query;
    $this->arrvalues = $arrvalues;

    if ($base == 'portal_mdesv') {
      $update = $this->conexionPortal->prepare($this->strquery);
    } else {
      echo 'Base de datos no especificada.';
      die;
    }

    $res = $update->execute($this->arrvalues);
    $update->closeCursor();
    return $res;
  }

  public function select(string $query, array $arrvalues = array(), string $base = '')
  {
    $this->strquery = $query;
    $this->arrvalues = $arrvalues;

    if ($base == 'portal_mdesv') {
      $result = $this->conexionPortal->prepare($this->strquery);
    } else {
      echo 'Base de datos no especificada.';
      die;
    }

    $result->execute($this->arrvalues);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    $result->closeCursor();
    return $data;
  }

  public function select_all(string $query, array $arrvalues = array(), string $base = '')
  {
    $this->strquery = $query;
    $this->arrvalues = $arrvalues;

    if ($base == 'portal_mdesv') {
      $result = $this->conexionPortal->prepare($this->strquery);
    } else {
      echo 'Base de datos no especificada.';
      die;
    }

    $result->execute($this->arrvalues);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $result->closeCursor();
    return $data;
  }

  public function delete(string $query, array $arrvalues = array(), string $base = '')
  {
    $this->strquery = $query;
    $this->arrvalues = $arrvalues;

    if ($base == 'portal_mdesv') {
      $result = $this->conexionPortal->prepare($this->strquery);
    } else {
      echo 'Base de datos no especificada.';
      die;
    }

    $res = $result->execute($this->arrvalues);
    $result->closeCursor();
    return $res;
  }
}
