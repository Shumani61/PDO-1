<?php
require "connectie.php";


$Producten = $pdo->query("SELECT * FROM Producten");
$result = $Producten->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>info</title>
</head>
<body>

    

    <h2>Overzicht producten</h2>
<table class="table table-dark table-bordered border-primary">
        <tr>
            <th class="table-light">product_code</th>
            <th class="table-light">product_naam</th>
            <th class="table-light">prijs_per_stuk</th>
            <th class="table-light">omschrijving</th>
            <th class="table-light">Action</th>
        </tr>

       <?php
       foreach ($result as $Producten) {
           echo "<tr>";
           echo "<td>". $Producten['product_code']. "</td>";
           echo "<td>". $Producten['product_naam']. "</td>";
           echo "<td>". $Producten['prijs_per_stuk']. "</td>";
           echo "<td>". $Producten['omschrijving']. "</td>";
           echo "<td> <a href='update.php?product_code=".$Producten['product_code']."'>Edit</a> </td>";
           echo "</tr>";
       }
       ?>
    </table>
</body>
</html>