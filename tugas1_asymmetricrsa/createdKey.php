<?php
$config = [
    "private_key_bits" => 2048, // Panjang kunci
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
];

$res = openssl_pkey_new($config);

openssl_pkey_export($res, $privateKey);
file_put_contents('private.pem', $privateKey);

$publicKey = openssl_pkey_get_details($res)['key'];
file_put_contents('public.pem', $publicKey);

echo "Public dan private key berhasil dibuat!";
?>