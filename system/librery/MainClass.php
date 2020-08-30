<?php
/**
 * Main class
 */
class MainClass
{
  Public $url;
  Public $controllerName  = "IndexController";   //Default Cotroller name
  public $methodName      = "Index";   //Default Cotroller name
  public $contrrollerPath = "app/controllers/";
  public $controller;

  public function __construct(){
    $this->geturl();
    $this->loadController();
    $this->callMethod();
  }

  public function geturl(){
    $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
    if($this->url != NULL){
      $this->url = rtrim($this->url, "/");
      $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));

    }else{
      unset($this->url);
    }
  }

  public function loadController(){
    if (!isset($this->url[0])) { //if load url controller ($url[0]) not exist  
      include $this->contrrollerPath . $this->controllerName . ".php";
      
      $this->controller = new $this->controllerName(); // load default controller
      $this->controller->{$this->methodName}();
    }else {
      $this->controllerName = $this->url[0];
      $fileName = $this->contrrollerPath . $this->controllerName . ".php";

      // check controller path file exixt or not
      if (file_exists($fileName)) {
        include $fileName;

        // check controller class exist or not
        if (class_exists($this->controllerName)) {
          $this->controller = new $this->controllerName();
        }else {
          header("Location: ".BASE_URL);
        }
      }else {
        header("Location: ".BASE_URL);
      }
    }
  }

  public function callMethod(){
    // check parameter of method exist or not in url
    if(isset($this->url[2])){
      $this->methodName = $this->url[1];

      // check method exist or not
      if (method_exists($this->controller, $this->methodName)) {
        $this->controller->{$this->methodName}($this->url[2]);
      }else {
        header("Location: ".BASE_URL);
      }

      // check method exist or not in url
    }else {

      $this->methodName = $this->url[1];
      // check method exist or not
      if (method_exists($this->controller, $this->methodName)) {
        $this->controller->{$this->methodName}();
      } else {
        header("Location: ".BASE_URL);
      }
      
    }
  }



}


?>