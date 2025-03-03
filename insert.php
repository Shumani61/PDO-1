<?php
require "connectie.php";

if (isset($_POST['knop'])) {
    $product_naam = $_POST ['product_naam'];
    $prijs_per_stuk = $_POST ['prijs_per_stuk'];
    $omschrijving = $_POST ['omschrijving'];

    $sql = "INSERT INTO Producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
    $result = $pdo->prepare($sql);
    $placeholders = [
        "product_naam" => $product_naam,
        "prijs_per_stuk" => $prijs_per_stuk,
        "omschrijving" => $omschrijving
    ];
    $result->execute($placeholders);
    if ($result) {
        echo "product toegevoegd";
    } else {
        echo "Er is een fout opgetreden";
        die();

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="Post">
    product<input type="text" name="product_naam" ><br>
    prijs per stuk<input type="text" name="prijs_per_stuk"><br>
    omschrijving    <input type="text" name="omschrijving"><br>
        <input type="submit" name="knop" value="submit"><br>
    </form>
</body>
</html>       