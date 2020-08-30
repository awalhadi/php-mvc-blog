<?php

/**
 * Main Database Connection class
 */
class Database extends PDO{
  
  public function __construct($dsn, $user, $pass){
    try {
      parent::__construct($dsn, $user, $pass);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    // parent::__construct($dsn, $user, $pass);

  }

  // fetch data 
  public function select($sql, $data = array(), $dataStyle = PDO::FETCH_ASSOC){

    $statement  = $this->prepare($sql);

    foreach ($data as $key => $value) {
      $statement->bindParam($key, $value);
    }

    $statement->execute();
    return $statement->fetchAll($dataStyle);

  }

  
// insert data
  public function insert($table, $data){

    $keys = implode(", ", array_keys($data));
    $values = ":" .implode(", :", array_keys($data));

    $sql = "INSERT INTO $table ($keys) VALUES ($values)";
    $statement  = $this->prepare($sql);

   foreach ($data as $k => &$val) {
     $statement->bindParam(':'.$k, $val);
   }

    return $statement->execute();
  }

// update table
  public function update($table, $data, $cond){
    
    $updateKeys = null;
    foreach ($data as $key => $value) {
      $updateKeys .= "$key=:$key,";
    }

    $updateKeys = rtrim($updateKeys, ",");

    // $sql = "UPDATE $table SET name=:name, table=:table WHERE id=2";
    $sql = "UPDATE $table SET $updateKeys WHERE $cond";

    $statement = $this->prepare($sql);

    foreach ($data as $k => &$val) {
      $statement->bindParam(':'.$k, $val);
    }

    return $statement->execute();

  }

  // delete data from table
  public function delete($table, $cond, $limit = 1){

    $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
    return $this->exec($sql);

  }

  public function loginValidate($sql, $username, $password){
    $statement = $this->prepare($sql);
    $statement->execute(array($username, $password));
    return $statement->rowCount();
  }

  // selected user data
  public function selectUserdata($sql, $username, $password)
  {
    $statement = $this->prepare($sql);
    $statement->execute(array($username, $password));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }


}


?>