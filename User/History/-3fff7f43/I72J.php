<?php
    include("conexionDB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha medica</title>
</head>
<body>
    <h1>Buscar paciente</h1>
    <form action="" method="GET">
        <input type="search" name="dni" placeholder="Buscar paciente por DNI">
        <input type="submit" value="Buscar" name="enviar">
    </form>
    <a href="./ficha.php">Paciente nuevo</a>
</body>
</html>

<?php

    if(isset($_GET['enviar'])) {
        echo 'hi';
        $dni = $_GET['dni'];
        //echo gettype($dni);
        settype($dni, "int");
        //echo gettype($dni);

        $sqlBusqueda = "SELECT * FROM Enfermero WHERE dni = '$dni'";
        $sqlBusquedaQuery = mysqli_query($conexion, $sqlBusqueda);
        echo $sqlBusquedaQuery;
    }

?>