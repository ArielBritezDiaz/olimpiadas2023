<?php
    /* Conexión a DB */
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "centro_medico_db";

    $conexion = mysqli_connect($server, $user, $password, $db, 8080) or die("Error en conexión a DB");
?>