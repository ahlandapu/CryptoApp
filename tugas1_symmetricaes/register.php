<?php
require 'config.php';
require 'enc_dec.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $data = $_POST['data'];

    $encrypted_data = encryptAES($data);

    $stmt = $pdo->prepare("INSERT INTO users (username, encrypted_data) VALUES (:username, :encrypted_data)");
    $stmt->execute(['username' => $username, 'encrypted_data' => $encrypted_data]);

    echo "Data berhasil disimpan!";
}
?>

<form method="post" action="register.php">
    <label>Username:</label>
    <input type="text" name="username" required>
    <br>
    <label>Data:</label>
    <input type="text" name="data" required>
    <br>
    <button type="submit">Simpan</button>
</form>
