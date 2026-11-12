<?php
include "db.php";

$sql = "SELECT vehicles.id, brands.name AS znacka, models.name AS model, vehicles.year,
        vehicles.engine_hp, vehicles.transmission, vehicles.price
        FROM vehicles
        JOIN models ON vehicles.model_id = models.id
        JOIN brands ON models.brand_id = brands.id
        ORDER BY brands.name, models.name, vehicles.year
        LIMIT 100";
$vysledek = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Seznam aut</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="index.php">Úvod</a>
        <a href="seznam.php">Seznam aut</a>
    </nav>

    <h1>Seznam aut</h1>

    <table>
        <tr>
            <th>Značka</th>
            <th>Model</th>
            <th>Rok</th>
            <th>Výkon (HP)</th>
            <th>Převodovka</th>
            <th>Cena (USD)</th>
        </tr>
        <?php while ($auto = mysqli_fetch_assoc($vysledek)) { ?>
        <tr>
            <td><?php echo $auto["znacka"]; ?></td>
            <td><?php echo $auto["model"]; ?></td>
            <td><?php echo $auto["year"]; ?></td>
            <td><?php echo $auto["engine_hp"]; ?></td>
            <td><?php echo $auto["transmission"]; ?></td>
            <td><?php echo $auto["price"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
