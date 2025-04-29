<?php
// Definujeme jednoduchú triedu pre filmový maratón
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

// Vytvoríme pole s niekoľkými vzorovými maratóny
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
    <!-- Google Fonts pre moderný vzhľad -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Reset štýly */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: #f3f2f8;
            color: #333;
            line-height: 1.6;
        }
        header {
            background: linear-gradient(135deg, #7e57c2, #673ab7);
            padding: 20px 0;
            color: white;
            text-align: center;
        }
        header h1 {
            font-size: 2rem;
            letter-spacing: 1.5px;
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #d1c4e9;
        }
        main {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        section {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        section h2 {
            margin-bottom: 20px;
            color: #5e35b1;
        }
        ul.marathon-list {
            list-style: none;
        }
        ul.marathon-list li {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s ease;
        }
        ul.marathon-list li:hover {
            background: #f3e5f5;
        }
        ul.marathon-list li:last-child {
            border-bottom: none;
        }
        .marathon-info strong {
            font-size: 1.1rem;
            color: #4a148c;
        }
        .marathon-date {
            color: #6a1b9a;
        }
        .marathon-action a {
            background: #7e57c2;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        .marathon-action a:hover {
            background: #673ab7;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #eeeeee;
            margin-top: 40px;
            color: #555;
        }
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
