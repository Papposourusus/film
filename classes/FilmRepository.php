<?php

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Film.php';

class FilmRepository {
    private $conn;
    
    public function __construct() {
        $this->conn = Database::getInstance()->conn;
    }
    
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM films");
        $stmt->execute();
        $films = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $films[] = new Film(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['duration'],
                $row['image'],
                $row['watched']  
            );
        }
        return $films;
    }
    
    public function get($id) {
        $stmt = $this->conn->prepare("SELECT * FROM films WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Film(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['duration'],
                $row['image'],
                $row['watched']
            );
        }
        return null;
    }
    
    public function create(Film $film) {
        $stmt = $this->conn->prepare("INSERT INTO films (title, description, duration, image, watched) VALUES (:title, :description, :duration, :image, :watched)");
        $stmt->bindParam(":title", $film->title);
        $stmt->bindParam(":description", $film->description);
        $stmt->bindParam(":duration", $film->duration, PDO::PARAM_INT);
        $stmt->bindParam(":image", $film->image);
        $defaultWatched = 0; 
        $stmt->bindParam(":watched", $defaultWatched, PDO::PARAM_INT);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM films WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
 


    
    public function updateWatched($id, $watched) {
        $stmt = $this->conn->prepare("UPDATE films SET watched = :watched WHERE id = :id");
        $stmt->bindParam(":watched", $watched, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
