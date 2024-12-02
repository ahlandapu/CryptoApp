<?php
require 'config.php';

$dataToEncrypt = "Ini adalah data sensitif!";
$username = "john_doe";

$publicKey = file_get_contents('public.pem');

openssl_public_encrypt($dataToEncrypt, $encryptedData, $publicKey);

$encryptedData = base64_encode($encryptedData);

$stmt = $pdo->prepare("INSERT INTO users (username, encrypted_data) VALUES (:username, :encrypted_data)");
$stmt->execute(['username' => $username, 'encrypted_data' => $encryptedData]);

echo "Data berhasil dienkripsi dan disimpan ke database!";
?>
