<?php
if (extension_loaded('openssl')) {
    echo "Ekstensi OpenSSL aktif!";
} else {
    echo "Ekstensi OpenSSL tidak aktif. Periksa file php.ini Anda.";
}
?>