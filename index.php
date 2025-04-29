<?php


require_once 'classes/Database.php';
require_once 'classes/Film.php';
require_once 'classes/FilmRepository.php';

$filmRepo = new FilmRepository();
$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'updateWatched') {
    $filmId  = (int) $_POST['film_id'];
    $watched = isset($_POST['watched']) ? 1 : 0;
    $filmRepo->updateWatched($filmId, $watched);
    $message = 'Stav sledovania bol aktualizovaný.';
}


$films = $filmRepo->getAll();
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmové Filmy</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Filmový Marathón</h1>
        <nav>
            <ul>
                <li><a href="manage_films.php">Pridanie/Odstránenie Filmov</a></li>
               
            </ul>
        </nav>
    </header>
    <main>
        <?php if ($message !== ''): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
        <section class="film-list">
            <h2>Zoznam filmov</h2>
            <?php if (count($films) > 0): ?>
                <ul>
                    <?php foreach ($films as $filmItem): ?>
                        <li>
                            <div class="film-info">
                             
                                <strong><?php echo htmlspecialchars($filmItem->title); ?></strong>
                            </div>
                            <div class="film-action">
                                
                                <form action="index.php" method="post" style="display:inline;">
                                    <input type="hidden" name="action" value="updateWatched">
                                    <input type="hidden" name="film_id" value="<?php echo htmlspecialchars($filmItem->id); ?>">
                                    <label>
                                        <input type="checkbox" name="watched" <?php if ($filmItem->watched == 1) echo 'checked'; ?> onchange="this.form.submit();">
                                        Sledované
                                    </label>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Žiadne filmy zatiaľ neboli pridané.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Filmový Maratón systém</p>
    </footer>
</body>
</html>
