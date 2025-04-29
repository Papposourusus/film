<?php


require_once 'classes/Database.php';
require_once 'classes/FilmRepository.php';


$filmRepo = new FilmRepository();
$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
   
        if ($_POST['action'] === 'add') {
            $title       = trim($_POST['title']);
            $description = trim($_POST['description']);
            $duration    = (int) $_POST['duration'];
            $image       = trim($_POST['image']);
            
            if ($title === '') {
                $message = 'Názov filmu je povinný!';
            } else {
                $film = new Film(null, $title, $description, $duration, $image);
                $newId = $filmRepo->create($film);
                $message = 'Film bol pridaný s ID: ' . $newId;
            }
        }
       
        else if ($_POST['action'] === 'delete') {
            $deleteId = (int) $_POST['film_id'];
            $filmRepo->delete($deleteId);
            $message = 'Film s ID ' . $deleteId . ' bol vymazaný.';
        }
    }
}


$films = $filmRepo->getAll();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa Filmov</title>
    <link rel="stylesheet" href="styles.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Správa Filmov</h1>
        <nav>
            <ul>
                <li><a href="index.php">Domov</a></li>
                
            </ul>
        </nav>
    </header>
    <main>
        <?php if ($message !== ''): ?>
            <div class="message">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <section class="film-add">
            <h2>Pridať nový film</h2>
            <form action="manage_films.php" method="post">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label for="title">Názov filmu:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Popis:</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Dĺžka (min):</label>
                    <input type="number" id="duration" name="duration" required>
                </div>
                <div class="form-group">
                    <label for="image">Cesta k obrázku:</label>
                    <input type="text" id="image" name="image" placeholder="uploads/film.jpg">
                </div>
                <button class="btn" type="submit">Pridať film</button>
            </form>
        </section>

      
       



        
    </main>
    <footer>
        <p>&copy; 2025 Filmový Maratón systém</p>
    </footer>
</body>
</html>
