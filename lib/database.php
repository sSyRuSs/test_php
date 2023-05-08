<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../config/config.php');
?>

<?php
Class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

public function __construct(){
    $this->connectDB();
}

//MySQLi//

private function connectDB(){
    $this->link = new mysqli($this->host, $this->user, $this->pass, 
    $this->dbname);
   if(!$this->link){
     $this->error ="Connection fail".$this->link->connect_error;
    return false;
   }
}

public function select($query){
    $result = $this->link->query($query) or 
    die($this->link->error.__LINE__);
    if($result->num_rows > 0){
        return $result;
    }else{
        return false;
    }
}

public function insert($query){
    $insert_row = $this->link->query($query) or 
    die($this->link->error.__LINE__);
    if($insert_row){
        return $insert_row;
    }else{
        return false;
    }
}

public function update($query){
    $update_row = $this->link->query($query) or 
      die($this->link->error.__LINE__);
    if($update_row){
     return $update_row;
    } else {
     return false;
     }
  }

public function delete($query){
    $delete_row = $this->link->query($query) or 
    die($this->link->error.__LINE__);
    if($delete_row){
        return $delete_row;
    }else{
        return false;
    }
}


//PDO//
// private function connectDB(){
//     try {
//         $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
//         $this->link = new PDO($dsn, $this->user, $this->pass);
//         $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return true;
//     } catch (PDOException $e) {
//         $this->error = "Connection fail" . $e->getMessage();
//         return false;
//     }
// }

// public function select($query){
//     try {
//         $stmt = $this->link->prepare($query);
//         $stmt->execute();
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         if($result){
//             return $result;
//         } else {
//             return false;
//         }
//     } catch(PDOException $e) {
//         die("Error: " . $e->getMessage());
//     }
// }

// public function insert($query){
//     try {
//         $stmt = $this->link->prepare($query);
//         $stmt->execute();
//         $insert_row = $stmt->rowCount();
//         if($insert_row){
//             return $insert_row;
//         } else {
//             return false;
//         }
//     } catch(PDOException $e) {
//         die("Error: " . $e->getMessage());
//     }
// }

//   public function update($query){
//     try {
//         $stmt = $this->link->prepare($query);
//         $stmt->execute();
//         $update_row = $stmt->rowCount();
//         if($update_row){
//             return $update_row;
//         } else {
//             return false;
//         }
//     } catch(PDOException $e) {
//         die("Error: " . $e->getMessage());
//     }
// }

// public function delete($query){
//     try {
//         $stmt = $this->link->prepare($query);
//         $stmt->execute();
//         $delete_row = $stmt->rowCount();
//         if($delete_row){
//             return $delete_row;
//         } else {
//             return false;
//         }
//     } catch(PDOException $e) {
//         die("Error: " . $e->getMessage());
//     }
// }

}
