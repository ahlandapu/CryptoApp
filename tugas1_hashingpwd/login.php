<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHash = hash('sha256', $password);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password_hash = :password_hash");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password_hash', $passwordHash);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Login berhasil!";
    } else {
        echo "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>