<?php
require "connectie.php";

if (isset($_POST['knop'])) {
    $product_naam = $_POST ['product_naam'];
    $prijs_per_stuk = $_POST ['prijs_per_stuk'];
    $omschrijving = $_POST ['omschrijving'];
    $product_code = $_GET ['product_code'];

    $sql = "UPDATE Producten SET product_naam= :product_naam, prijs_per_stuk= :prijs_per_stuk, omschrijving= :omschrijving WHERE product_code = :product_code";
    $result = $pdo->prepare($sql);
    $placeholders = [
        "product_naam" => $product_naam,
        "prijs_per_stuk" => $prijs_per_stuk,
        "omschrijving" => $omschrijving,
        "product_code" => $product_code
    ];
    $result->execute($placeholders);
    if ($result) {
        echo "Product aangepast!";
        header("Refresh:3; url = select.php");
    } else {
        echo "Er is een fout opgetreden!";
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
    <H2>Product aanpassen</H2>
<form method="POST">
    <input type="text" name="product_naam" placeholder="product_naam" required><br>
    <input type="text" name="prijs_per_stuk" placeholder="prijs_per_stuk" required><br>
    <input type="text" name="omschrijving" placeholder="omschrijving" required><br>
    <input type="submit" name="knop" value="submit"><br>
    </form>
</body>
</html>