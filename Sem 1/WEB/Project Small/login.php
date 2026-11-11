<?php

session_start();
require __DIR__ . '/db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $find = $database->prepare('SELECT id, name, password FROM users WHERE email = ?');
    $find->execute([$email]);
    $user = $find->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('Location: index.php');
        exit;
    }
    $message = 'Email or password is incorrect.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Campus Market</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="auth-box">
        <h1>Campus Market</h1>
        <h2>Login</h2>
        <?php if ($message !== ''): ?><p class="error"><?= htmlspecialchars($message) ?></p><?php endif; ?>
        <form method="post">
            <input name="email" type="email" placeholder="Email" required>
            <input name="password" type="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>New user? <a href="register.php">Create an account</a></p>
    </section>
</body>
</html>
