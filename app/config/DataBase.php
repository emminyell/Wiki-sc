<?php
namespace app\config;

use PDO;
use PDOException;

class DataBase {
    private $host = "127.0.0.1:3307";
    private $user = "root";
    private $password = "";
    private $database = "wiki";
    private $conn;

    private static $instance=null;

    private function __construct() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(){
        if (self::$instance===null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>