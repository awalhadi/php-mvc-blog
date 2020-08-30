<?php
/**
 * Post Model class
 */
class PostModel extends Model{

  public function __construct(){
    parent::__construct();
  }


  public function getAllPost($table){
    $sql = "select * from $table order by id desc";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getLatestPost($table){
    $sql = "select * from $table order by id desc limit 4";
    $result = $this->db->select($sql);
    return $result;
  }
  
  public function getPostById($PostTable, $CatTable, $id){
    $sql = "SELECT $PostTable.*, $CatTable.name FROM $PostTable
            INNER JOIN $CatTable
            ON $PostTable.cat = $CatTable.id 
            WHERE $PostTable.id = $id";
            
    $result = $this->db->select($sql);
    return $result;
  }

  public function getCatByPost($PostTable, $CatTable, $id){
    $sql = "SELECT $PostTable.*, $CatTable.name FROM $PostTable
            INNER JOIN $CatTable ON $PostTable.cat = $CatTable.id
            WHERE $CatTable.id = $id";

    $result = $this->db->select($sql);

    return $result;
  }


  public function getlatest($PostTable){
    $sql = "SELECT * FROM $PostTable ORDER BY id LIMIT 5";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getSearchPost($postTable, $keyword, $cat_id){

    if(isset($keyword) && !empty($keyword)){

      $sql = "SELECT * FROM $postTable WHERE title LIKE '%$keyword%' OR body LIKE '%$keyword%'";
      $result = $this->db->select($sql);

    }elseif (isset($cat_id)) {

      $sql = "SELECT * FROM $postTable WHERE cat = $cat_id";
      $result = $this->db->select($sql);

    }
    return $result;
  }

// post store new
  public function store_post($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  // update post
  public function updatePost($table, $data, $cond)
  {
    return $this->db->update($table, $data, $cond);
  }

  // delete post
  public function deletePost($table, $cond)
  {
    return $this->db->delete($table, $cond);
  }



  
}



?>