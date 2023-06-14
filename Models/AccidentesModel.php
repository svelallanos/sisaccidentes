<?php

class AccidentesModel extends Mysql
{
  function __construct()
  {
    parent::__construct();
  }

  function selectsAccidentes()
  {
    $sql = 'SELECT * FROM accidentes';
    $result = $this->select_all($sql, array(), DB_ACCIDENTES);

    return $result;
  }
}
