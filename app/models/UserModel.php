<?php 

/**
 * UserModel class
 */

class UserModel extends Model
{
    public function __construct(){
        parent::__construct();
      }
    
    
      public function get_userlist($table){
        $sql = "select * from $table order by id desc";
        $result = $this->db->select($sql);
        return $result;
      }

      public function userById($table, $id){

        $sql = "select * from $table where id=:id";
        $data = array(':id'=> $id);
        return $this->db->select($sql, $data);
    
      }
      
      public function store_user($table, $data){
        return $this->db->insert($table, $data);
      }

      public function updateUser($table, $data, $cond)
      {
        return $this->db->update($table, $data, $cond);
      }

      public function deleteUser($table, $cond)
      {
        return $this->db->delete($table, $cond);
      }


}


?>