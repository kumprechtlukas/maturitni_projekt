<?php
$conn = mysqli_connect("localhost", "root", "", "auta");

if (!$conn) {
    die("Chyba připojení k databázi: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>
