<?php
require 'config.php';

$username = "john_doe";
$stmt = $pdo->prepare("SELECT encrypted_data FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Data tidak ditemukan untuk pengguna: $username");
}

$encryptedData = base64_decode($row['encrypted_data']);

$privateKey = file_get_contents('private.pem');

openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);

echo "Data asli: $decryptedData";
?>