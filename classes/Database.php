<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'film_marathon';
    private $username = 'root';
    private $password = '';
    public $conn;
    
    private static $instance = null;

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            $this->conn->exec("SET NAMES 'utf8'");
        } catch(PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }
    

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}
?>
