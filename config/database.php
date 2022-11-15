<?php

class Database {
    private $servername = "localhost";
    private $dbname = "myshop";
    private $username = "root";
    private $password = "";
    public $connection;

    public function __construct(){
   
    }

    public function getConnection(){
        $this->connection = null;
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->connection;
    }
}

$db = new Database();
$DbConnection = $db->getConnection();
?>