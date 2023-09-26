<?php
    include("conexionDB.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ficha medica</title>
        <link rel="stylesheet" href="../styles/busqueda.css">
    </head>
    <body>
        <nav class="nav">
            <img src="../resources/images/HMT.png" alt="">
            <ul>
                <li><a href="../index.html"></a>INICIO</li>
                <li><a href="../busqueda.php"></a>BUSCAR PACIENTE</li>
                <li><a href="../nuevoPaciente.php"></a>AÑADIR PACIENTE</li>
                <li>ADMINISTRAR USUARIOS</li>
                <li>REPORTES</li>
            </ul>
        </nav>
        <div class="content">
        <h1>Buscar paciente</h1>
        <form action="" method="GET">
            <div class="search">
            <input class="search2" type="search" name="dni" placeholder="Buscar paciente por DNI">
            </div>
            <input type="submit" value="🔍" name="enviar">
        </form>
        <a class="pacienteNuevo" href="./nuevoPaciente.php">Paciente nuevo</a>
        </div>
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