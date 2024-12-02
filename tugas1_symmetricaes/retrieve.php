<?php
require 'config.php';
require 'enc_dec.php';

// Ambil semua data dari database
$stmt = $pdo->query("SELECT username, encrypted_data FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo "<b> Username: </b>" . htmlspecialchars($user['username']) . "<br>";
    echo "<b>Encrypted Data: </b>" . htmlspecialchars($user['encrypted_data']) . "<br>";
    echo "<b>Decrypted Data: </b>" . htmlspecialchars(decryptAES($user['encrypted_data'])) . "<br><br>";
}
?>