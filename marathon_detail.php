<?php
// marathon_detail.php

// Definujeme triedu pre filmový maratón
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

// Simulované dáta – rovnaké ako v index.php
$marathons = [
    new Marathon(1, 'Filmový maratón Akčné Filmy', '2025-05-10'),
    new Marathon(2, 'Kultové Klasiky na noc', '2025-06-15'),
    new Marathon(3, 'Sci-Fi Noc', '2025-07-20'),
];

// Získame parameter id z URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$selectedMarathon = null;

// Vyhľadáme maratón podľa id
if ($id !== null) {
    foreach ($marathons as $marathon) {
        if ($marathon->id === $id) {
            $selectedMarathon = $marathon;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detaily Maratóny</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Google Fonts pre moderný vzhľad -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Detaily Maratóny</h1>
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
        <?php if ($selectedMarathon): ?>
            <section>
                <h2><?php echo htmlspecialchars($selectedMarathon->name); ?></h2>
                <p><strong>Dátum maratónu:</strong> <?php echo htmlspecialchars($selectedMarathon->date); ?></p>
                <!-- Tu môžeš pridať ďalšie detaily: zoznam filmov, popis, miesto konania a pod. -->
            </section>
        <?php else: ?>
            <section>
                <p>Maratón s daným ID nebol nájdený.</p>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2025 Filmový Maratón systém</p>
    </footer>
</body>
</html>
