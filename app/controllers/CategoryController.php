<?php
/**
 * Category Controller class
 */
class CategoryController extends Controller{
  
  public function __contstruct(){
    parent::__construct();
  }

  public function category(){

    $data = array();
    $table = "category";
    $category = $this->load->model("CatModel");
    $data['cat'] = $category->catlist($table);
    $this->load->view("category", $data);

  }
  

  public function catById($id=null){
    
    $data   = array();
    $table  = "category";
    $id     = $id;
    $category = $this->load->model('CatModel');
    $data['catbyid']  = $category->catById($table, $id);
    $this->load->view("catbyid", $data);

  }



  public function addCategory(){
    $this->load->view('addCategory');
  }

  public function insertCategory(){

    $table  = "category";

    $name   = $_POST['name'];
    $title  = $_POST['title'];

    $data = array(
      'name' => $name,
      'title' => $title
    );
    $category = $this->load->model('CatModel');
    $result = $category->insertCat($table, $data);

    $message = array();
    if ($result == 1) {
      $message['msg'] = "Category added success....";
    }else {
      $message['msg'] = "Category not added....";
    }


    $this->load->view('addCategory', $message);
  }

  public function updateCat(){

    $table  = "category";

    $id = $_POST['id'];
    $name   = $_POST['name'];
    $title  = $_POST['title'];

    $data = array(
      'name' => $name,
      'title' => $title
    );

    $cond = "id=$id";

    $category = $this->load->model('CatModel');

    $result =$category->catUpdate($table, $data, $cond);

    $message = array();
    if ($result == 1) {
      $message['msg'] = "Category update success....";
    }else {
      $message['msg'] = "Category not update....";
    }

    $this->load->view('updateCategory', $message);
  }


  public function deleteCatById($id = null){

    $table = "category";

    $id = "id=$id";

    $category = $this->load->model('CatModel');

    $category->deleteCatById($table, $id);
  }

  public function updateCategory(){

    $data   = array();
    $table  = "category";
    $id     = 9;
    $category = $this->load->model('CatModel');
    $data['catbyid']  = $category->catById($table, $id);

    $this->load->view('updateCategory', $data);
  }



}


?>