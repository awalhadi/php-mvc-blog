<?php

/**
 * LoginModel class
 */
class LoginModel extends Model{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function userControl($table, $username, $password){
        $sql    = "SELECT * FROM $table WHERE username =? AND password =?";
        return $this->db->loginValidate($sql, $username, $password);
    }

    public function getUserData($table, $username, $password)
    {
        $sql = "SELECT * FROM $table WHERE username =? AND password =?";
        return $this->db->selectUserdata($sql, $username, $password);
    }

}

?>