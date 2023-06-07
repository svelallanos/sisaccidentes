<?php

class Conexion
{
  private $portal;

  public function __construct()
  {
    // Conexion a la base de datos del portal de la municipalidad
    $conecctionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_PORTAL;

    try {
      $this->portal = new PDO($conecctionString, DB_USER, DB_PASSWORD);
      $this->portal->setAttribute(PDO::ATTR_ERRMODE,    PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      $this->portal = 'Error de conexión';
      echo "ERROR: " . $e->getMessage();
      die;
    }
  }

  public function conectPortal()
  {
    return $this->portal;
  }
}
