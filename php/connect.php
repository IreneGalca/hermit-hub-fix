
<?php
    //mysql://b6f8c423622d44:408986f1@us-cdbr-east-05.cleardb.net/heroku_5acd244748e9f5e?reconnect=true

    // Class Dao {
    //     private $host;
    //     private $user;
    //     private $pass;
    //     private $db;
    //     private $charset;

    //     public function connect(){
    //         $this->host = "127.0.0.1:3306";
    //         $this->user = "root";
    //         $this->pass = "";
    //         $this->db = "hermit-hub";
    //         $this->charset = "utf8mb4";

            
    //         try{
    //             //data source name
    //             $dsn = "mysql:host=".$this->host. ";db=".$this->db.";charset=".$this->charset;
    //             $pdo = new PDO($dsn, $this->user, $this->pass);
    //             return $pdo;

    //         }catch (PDOException $e){
    //             echo "Connection failed: ".$e->getMessage();
    //         }
    //     }
    // }


    //mysql://bf97f6dce3ca8f:b41d024b@us-cdbr-east-05.cleardb.net/heroku_4541ca0fb19daa6?reconnect=true
    $host = "127.0.0.1:3306";
    $user = "root";
    $pass = "";
    $db = "hermit-hub";

    $conn = mysqli_connect($host, $user, $pass, $db);

?>