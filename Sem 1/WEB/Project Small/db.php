<?php

$database = new PDO(
    'mysql:host=localhost;dbname=campify;charset=utf8mb4',
    'root',
    ''
);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$database->exec(
    'CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    CREATE TABLE IF NOT EXISTS listings (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        title TEXT NOT NULL,
        description TEXT NOT NULL,
        price INTEGER NOT NULL,
        seller TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )'
);

$count = (int) $database->query('SELECT COUNT(*) FROM listings')->fetchColumn();
if ($count === 0) {
    $add = $database->prepare(
        'INSERT INTO listings (title, description, price, seller)
         VALUES (?, ?, ?, ?)'
    );
    $add->execute(['Calculus notes', 'Clean notes for first-year students.', 150, 'Ananya']);
    $add->execute(['Study desk lamp', 'Small desk lamp in good condition.', 350, 'Rohan']);
    $add->execute(['Python tutoring', 'One-hour beginner Python help.', 250, 'Priya']);
}
