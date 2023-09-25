<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'info_paises_db';

    $conexionPaises = mysqli_connect($server, $user, $password, $db, 8080) or die('ERROR en conexión a paises_db');
?>