<?php


require_once 'classes/Database.php';
require_once 'classes/FilmRepository.php';


$filmRepo = new FilmRepository();


if (isset($_GET['film_id'])) {
    $filmId = (int) $_GET['film_id'];
    $film = $filmRepo->get($filmId);
} else {
    $films = $filmRepo->getAll();
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmové Filmy</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Google Fonts pre moderný vzhľad -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Filmový Marathón</h1>
        <nav>
            <ul>
                <li><a href="index.php">Domov</a></li>
                <li><a href="manage_films.php">Pridanie/Odstránenie Filmov</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if (isset($film) && $film !== null): ?>
         
            <section class="film-detail">
                <h2><?php echo htmlspecialchars($film->title); ?></h2>
                <img src="<?php echo htmlspecialchars($film->image); ?>" alt="Obrázok filmu <?php echo htmlspecialchars($film->title); ?>" class="film-image">
                <p><strong>Dĺžka:</strong> <?php echo htmlspecialchars($film->duration); ?> minút</p>
                <div class="film-description">
                    <h3>Popis:</h3>
                    <p><?php echo nl2br(htmlspecialchars($film->description)); ?></p>
                </div>
                <p>
                    <button class="btn" onclick="window.location.href='index.php'">Späť na zoznam filmov</button>
                </p>
            </section>
        <?php else: ?>
            
            <section class="film-list">
                <h2>Zoznam filmov</h2>
                <?php if (isset($films) && count($films) > 0): ?>
                    <ul>
                        <?php foreach ($films as $filmItem): ?>
                            <li>
                                <div class="film-info">
                                    <strong><?php echo htmlspecialchars($filmItem->title); ?></strong>
                                </div>
                                <div class="film-action">
                                    <button class="btn" onclick="window.location.href='index.php?film_id=<?php echo htmlspecialchars($filmItem->id); ?>'">
                                        Zobraziť detaily
                                    </button>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Žiadne filmy zatiaľ neboli pridané.</p>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Filmový Maratón systém</p>
    </footer>
</body>
</html>
