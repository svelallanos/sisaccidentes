<?php

class AccidentesModel extends Mysql
{
  function __construct()
  {
    parent::__construct();
  }

  function selectusers()
  {
    $sql = 'SELECT * FROM roles';
    $result = $this->select_all($sql, array(), DB_PORTAL);
    return $result;
  }
}
