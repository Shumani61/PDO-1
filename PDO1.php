<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bedrag = $_POST['bedrag'];
    $personen = $_POST['personen'];
    $fooi = isset($_POST['fooi']) ? $_POST['fooi'] : 0;

    // error
    $errors = [];
    if ($bedrag <= 0) {
        $errors[] = "Het totaalbedrag moet groter zijn dan nul.";
    }
    if ($personen < 1) {
        $errors[] = "Het aantal personen moet minimaal 1 zijn.";
    }
    if ($fooi < 0) {
        $errors[] = "De fooi kan niet negatief zijn.";
    }

    if (empty($errors)) {
        $totaalMetFooi = $bedrag + $fooi;
        $aantalPerPersoon = $totaalMetFooi / $personen;

        echo "Resultaat:";
        echo "<p>Het totaalbedrag inclusief fooi is: €" . number_format($totaalMetFooi, 2) . "</p>";
        echo "<p>Elk persoon moet betalen: €" . number_format($aantalPerPersoon, 2) . "</p>";
    } else {
        echo "Fouten:";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
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
    <form method="POST">
        <input type="text" name="bedrag" placeholder="totaalbedrag" required> <br>
        <input type="text" name="personen" placeholder="aantal personen" required> <br>
        <input type="text" name="fooi" placeholder="fooi">
        <input type="submit" value="Bereken">
    </form>    
</body>
</html>