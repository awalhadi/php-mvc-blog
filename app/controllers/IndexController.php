<?php
/**
 * Default Controller
 */


class IndexController extends Controller{


  public function __construct(){
    parent::__construct();
  }

  public function Index(){
    // print_r("this is index controller");
    $this->home();
  }

  // Default view
  public function home(){
    $this->load->view("header");
    $data       = array();
    $PostTable  = "post";
    $CatTable   = "category";
    $post       = $this->load->model('PostModel');
    $category   = $this->load->model('CatModel');

    $data['catlist']  = $category->catlist($CatTable);    
    $this->load->view("navbar", $data); // load navbar and search item
    

    $data['posts'] = $post->getLatestPost($PostTable);
    $this->load->view("content", $data);


    $data['latestPost'] = $post->getlatest($PostTable);
    $this->load->view("sidebar", $data);
    $this->load->view("footer");
  }


  public function postDetails($id = null){

    $this->load->view("header");
    $data       = array();
    $PostTable  = "post";
    $CatTable   = "category";
    $post       = $this->load->model('PostModel');
    $category   = $this->load->model('CatModel');

    $data['catlist']  = $category->catlist($CatTable);    
    $this->load->view("navbar", $data); // load navbar and search item

    $data['postById'] = $post->getPostById($PostTable, $CatTable, $id);
    $this->load->view("detail", $data);


    $data['latestPost'] = $post->getlatest($PostTable);
    $this->load->view("sidebar", $data);

    $this->load->view("footer");

  }

  public function postByCat($id = null){
    $this->load->view("header");
    $data       = array();
    $postTable  = "post";
    $CatTable   = "category";
    $catPost    = $this->load->model('PostModel');
    $category   = $this->load->model('CatModel');

    $data['catlist']  = $category->catlist($CatTable);    
    $this->load->view("navbar", $data); // load navbar and search item
    

    $data['catbypost']  = $catPost->getCatByPost($postTable, $CatTable, $id);
    $this->load->view("catBypost", $data);


    $data['latestPost'] = $catPost->getlatest($postTable);
    $this->load->view("sidebar", $data);

    $this->load->view("footer");
  }

  public function search(){
    $this->load->view("header");
    $data       = array();

    $keyword    = $_REQUEST['keyword'];
    $cat_id     = $_REQUEST['cat'];

     if(empty($keyword) && $cat_id == 0){
      header("Location: ".BASE_URL."/IndexController/home");
    }
    
    $postTable  = "post";
    $CatTable   = "category";
    $post    = $this->load->model('PostModel');
    $category   = $this->load->model('CatModel');

    $data['catlist']  = $category->catlist($CatTable);    
    $this->load->view("navbar", $data); // load navbar and search item

    $data['search_result']  = $post->getSearchPost($postTable, $keyword, $cat_id);
    $this->load->view("searchpost", $data);


    $data['latestPost'] = $post->getlatest($postTable);
    $this->load->view("sidebar", $data);

    $this->load->view("footer");
  }
  


}


?>