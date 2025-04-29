<?php

class Marathon {
    public $id;
    public $name;
    public $date; 

    public function __construct($id, $name, $date) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
    }
}


$marathons = [
    new Marathon(1, 'Filmový maratón Akčné Filmy', '2025-05-10'),
    new Marathon(2, 'Kultové Klasiky na noc', '2025-06-15'),
    new Marathon(3, 'Sci-Fi Noc', '2025-07-20'),
];
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmové Maratóny</title>
    
    <link rel="stylesheet" href="styles.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Filmové Maratóny</h1>
        <nav>
            <ul>
                <li><a href="index.php">Domov</a></li>
                <li><a href="films.php">Filmy</a></li>
                <li><a href="marathons.php">Maratóny</a></li>
                <li><a href="add_marathon.php">Pridať Maratón</a></li>
                <li><a href="add_film.php">Pridať Film</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Aktuálne filmové maratóny</h2>
            <?php if (count($marathons) > 0): ?>
                <ul class="marathon-list">
                    <?php foreach ($marathons as $marathon): ?>
                        <li>
                            <div class="marathon-info">
                                <strong><?php echo htmlspecialchars($marathon->name); ?></strong>
                                <span class="marathon-date">&ndash; <?php echo htmlspecialchars($marathon->date); ?></span>
                            </div>
                            <div class="marathon-action">
                                <a href="marathon_detail.php?id=<?php echo htmlspecialchars($marathon->id); ?>">Zobraziť detaily</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Žiadne maratóny zatiaľ neboli pridané.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Filmový Maratón systém</p>
    </footer>
</body>
</html>
