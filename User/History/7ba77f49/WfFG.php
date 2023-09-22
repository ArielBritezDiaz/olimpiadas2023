<?php
    include("conexionDB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Médica</title>
</head>
<body>
    <?php

    if(isset($_GET['id_enfermero'])) {
        $l = $_GET['id_enfermero'];
        echo $l;
    }

    ?>
</body>
</html>