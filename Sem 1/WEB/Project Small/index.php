<?php

session_start();
require __DIR__ . '/db.php';

$message = '';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = (int) ($_POST['price'] ?? 0);
    $seller = trim($_POST['seller'] ?? '');

    if ($title === '' || $description === '' || $seller === '' || $price < 0) {
        $message = 'Please fill every field correctly.';
    } else {
        $add = $database->prepare(
            'INSERT INTO listings (title, description, price, seller)
             VALUES (?, ?, ?, ?)'
        );
        $add->execute([$title, $description, $price, $seller]);
        $message = 'Your listing was added.';
    }
}

$listings = $database
    ->query('SELECT title, description, price, seller FROM listings ORDER BY id DESC')
    ->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campus Market</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Campus Market</h1>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>.</p>
        <p><a class="header-link" href="logout.php">Log out</a></p>
    </header>

    <main>
        <section class="new-listing">
            <h2>Add a listing</h2>
            <?php if ($message !== ''): ?>
                <p class="message"><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
            <form method="post">
                <input name="title" placeholder="Title" required>
                <input name="price" type="number" min="0" placeholder="Price" required>
                <input name="seller" placeholder="Your name" required>
                <textarea name="description" placeholder="Short description" required></textarea>
                <button type="submit">Add listing</button>
            </form>
        </section>

        <section>
            <h2>Latest listings</h2>
            <input id="search" class="search" type="search" placeholder="Search listings">
            <div id="listings">
                <?php foreach ($listings as $listing): ?>
                    <article class="listing">
                        <h3><?= htmlspecialchars($listing['title']) ?></h3>
                        <p><?= htmlspecialchars($listing['description']) ?></p>
                        <strong>₹<?= htmlspecialchars($listing['price']) ?></strong>
                        <small>Posted by <?= htmlspecialchars($listing['seller']) ?></small>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>Local student marketplace</footer>
</body>
</html>
