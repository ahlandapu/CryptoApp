<?php
//define('ENCRYPTION_KEY', 'ASDFGH'); // Ganti dengan kunci rahasia Anda
define('ENCRYPTION_KEY', 'QWERTY');

function encryptAES($data) {
    $key = substr(hash('sha256', ENCRYPTION_KEY, true), 0, 32); // Menghasilkan kunci 256-bit
    $iv = openssl_random_pseudo_bytes(16); // Inisialisasi vektor 16 byte
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv); // Gabungkan encrypted data dan IV
}

function decryptAES($data) {
    $key = substr(hash('sha256', ENCRYPTION_KEY, true), 0, 32);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2); // Pisahkan encrypted data dan IV
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv);
}
?>