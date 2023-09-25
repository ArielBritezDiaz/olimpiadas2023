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
        <a href="./nuevoPaciente.php">Paciente nuevo</a>
    </body>
</html>

<?php

    if(isset($_GET['enviar'])) {
        $dni = $_GET['dni'];
        //echo gettype($dni);
        settype($dni, "int");
        //echo gettype($dni);

        $sqlBusqueda = "SELECT * FROM Enfermero WHERE dni = $dni";
        $sqlBusquedaQuery = mysqli_query($conexion, $sqlBusqueda);
        $registro = mysqli_fetch_assoc($sqlBusquedaQuery);

        if(mysqli_num_rows($sqlBusquedaQuery) > 0) {
            $id_enfemero = $registro['id_enfermero'];
            header("location:fichaMedica.php?id_enfermero=$id_enfemero");
        }
    }

?>