<?php
/**
 * Load view  class
 */
class Load{

  public function __construct(){
    #code
  }


  public function view($fileName, $data = false){

    if ($data == true) {
      extract($data);
    }
    include 'app/views/' .$fileName.'.php';

    // if (isset($path)) {
    //   include "app/views/" . $path . $fileName . ".php";
    // } else {
    // }
    
  }

  public function model($modelName){
    include 'app/models/' . $modelName . '.php';
    return new $modelName();
  }


  public function request()
  {
    include 'app/request/Request.php';
    return new Request();
  }



}


?>