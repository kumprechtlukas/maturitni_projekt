<?php
include "db.php";

$sql = "SELECT COUNT(*) AS pocet, AVG(price) AS prumerna_cena, AVG(engine_hp) AS prumerny_vykon,
        MIN(year) AS nejstarsi, MAX(year) AS nejnovejsi
        FROM vehicles";
$vysledek = mysqli_query($conn, $sql);
$stat = mysqli_fetch_assoc($vysledek);

$sql = "SELECT COUNT(*) AS pocet FROM brands";
$vysledek = mysqli_query($conn, $sql);
$znacky = mysqli_fetch_assoc($vysledek);

$sql = "SELECT COUNT(*) AS pocet FROM models";
$vysledek = mysqli_query($conn, $sql);
$modely = mysqli_fetch_assoc($vysledek);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Databáze aut</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.php">Úvod</a>
        <a href="seznam.php">Seznam aut</a>
    </nav>

    <h1>Databáze aut</h1>
    <p>
        Aplikace zobrazuje data z datasetu Car Features and MSRP z webu Kaggle.
        Dataset obsahuje informace o autech prodávaných v USA v letech
        <?php echo $stat["nejstarsi"]; ?>–<?php echo $stat["nejnovejsi"]; ?>.
    </p>

    <h2>Základní statistiky</h2>
    <div class="statistiky">
        <div class="box">
            <p>Počet aut</p>
            <strong><?php echo $stat["pocet"]; ?></strong>
        </div>
        <div class="box">
            <p>Počet značek</p>
            <strong><?php echo $znacky["pocet"]; ?></strong>
        </div>
        <div class="box">
            <p>Počet modelů</p>
            <strong><?php echo $modely["pocet"]; ?></strong>
        </div>
        <div class="box">
            <p>Průměrná cena</p>
            <strong><?php echo round($stat["prumerna_cena"]); ?> USD</strong>
        </div>
        <div class="box">
            <p>Průměrný výkon</p>
            <strong><?php echo round($stat["prumerny_vykon"]); ?> HP</strong>
        </div>
    </div>
</body>
</html>
