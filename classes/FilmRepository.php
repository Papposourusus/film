<?php

require_once 'Database.php';
require_once 'Film.php';

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
                $row['image']
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
                $row['image']
            );
        }
        return null;
    }

    public function create(Film $film) {
        $stmt = $this->conn->prepare("INSERT INTO films (title, description, duration, image) VALUES (:title, :description, :duration, :image)");
        $stmt->bindParam(":title", $film->title);
        $stmt->bindParam(":description", $film->description);
        $stmt->bindParam(":duration", $film->duration, PDO::PARAM_INT);
        $stmt->bindParam(":image", $film->image);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM films WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // Prípadne ďalšie metódy...
}
?>
