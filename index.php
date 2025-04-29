<?php
// Definujeme jednoduchú triedu, ktorá reprezentuje filmový maratón
class Marathon {
    public $id;
    public $name;
    public $date; // dátum maratónu

    public function __construct($id, $name, $date) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
    }
}

// Vytvoríme pole s niekoľkými vzorovými maratónmi
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
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        header { background-color: #333; color: #fff; padding: 10px; }
        header h1 { margin: 0; }
        nav ul { list-style-type: none; margin: 0; padding: 0; }
        nav ul li { display: inline-block; margin-right: 15px; }
        nav ul li a { color: #fff; text-decoration: none; }
        main { padding: 20px; }
        footer { background-color: #f2f2f2; text-align: center; padding: 10px; }
    </style>
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
                <ul>
                    <?php foreach ($marathons as $marathon): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($marathon->name); ?></strong>
                            &ndash; <?php echo htmlspecialchars($marathon->date); ?>
                            <!-- Pre detaily môžeme neskôr vytvoriť stránku marathon_detail.php -->
                            <a href="marathon_detail.php?id=<?php echo htmlspecialchars($marathon->id); ?>">Zobraziť detaily</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Žiadne maratóny zatiaľ neboli pridané.</p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Filmový Maratón systém.</p>
    </footer>
</body>
</html>
