<?php

session_start();
require __DIR__ . '/db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 4) {
        $message = 'Enter a name, valid email and password of 4+ characters.';
    } else {
        try {
            $add = $database->prepare(
                'INSERT INTO users (name, email, password) VALUES (?, ?, ?)'
            );
            $add->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
            $message = 'Registration complete. You can now log in.';
        } catch (PDOException $error) {
            if ($error->getCode() === '23000') {
                $message = 'That email is already registered.';
            } else {
                throw $error;
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Campus Market</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="auth-box">
        <h1>Campus Market</h1>
        <h2>Register</h2>
        <?php if ($message !== ''): ?><p class="message"><?= htmlspecialchars($message) ?></p><?php endif; ?>
        <form method="post">
            <input name="name" placeholder="Your name" required>
            <input name="email" type="email" placeholder="Email" required>
            <input name="password" type="password" placeholder="Password" minlength="4" required>
            <button type="submit">Register</button>
        </form>
        <p>Already registered? <a href="login.php">Login</a></p>
    </section>
</body>
</html>
