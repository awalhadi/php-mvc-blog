<?php

/**
 * Main Model class
 */
class Model{

  protected $db = array();

  public function __construct(){
    
    $dsn = 'mysql:dbname=db_mvc; host:localhost';
    $user = 'root';
    $pass = '';

    $this->db = new Database($dsn, $user, $pass);

  }
  
}

?>