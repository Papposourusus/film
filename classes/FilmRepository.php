<?php

require_once 'classes/Database.php';


class MarathonRepository {
    private $conn;
    
    public function __construct() {
        $this->conn = Database::getInstance()->conn;
    }
    
   
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM marathons");
        $stmt->execute();
        $marathons = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      
            $marathons[] = new Marathon($row['id'], $row['name'], $row['marathon_date']);
        }
        return $marathons;
    }
    

}
?>