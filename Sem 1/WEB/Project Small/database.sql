CREATE DATABASE IF NOT EXISTS campify;
USE campify;

CREATE TABLE IF NOT EXISTS users (
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
);

INSERT INTO listings (title, description, price, seller) VALUES
('Calculus notes', 'Clean notes for first-year students.', 150, 'Ananya'),
('Study desk lamp', 'Small desk lamp in good condition.', 350, 'Rohan'),
('Python tutoring', 'One-hour beginner Python help.', 250, 'Priya');
