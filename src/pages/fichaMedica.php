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
            $id_enfemero = $_GET['id_enfermero'];
            
            $sqlBusqueda = "SELECT * FROM Enfermero WHERE id_enfermero = '$id_enfemero'";
            $sqlBusquedaQuery = mysqli_query($conexion, $sqlBusqueda);
            $registro = mysqli_fetch_assoc($sqlBusquedaQuery);

            ?>
            <h1>Ficha Médica</h1>
            <table border=1>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>País</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>Código Postal</th>
                    <th>Sexo</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Nota</th>
                </tr>
                <tr>
                    <?php 
                        echo '<td>'.$registro['nombre'].'</td>';
                        echo '<td>'.$registro['apellido'].'</td>';
                        echo '<td>'.$registro['fecha_nacimiento'].'</td>';
                        echo '<td>'.$registro['pais'].'</td>';
                        echo '<td>'.$registro['provincia'].'</td>';
                        echo '<td>'.$registro['localidad'].'</td>';
                        echo '<td>'.$registro['codigo_postal'].'</td>';
                        echo '<td>'.$registro['sexo'].'</td>';
                        echo '<td>'.$registro['dni'].'</td>';
                        echo '<td>'.$registro['telefono'].'</td>';
                        echo '<td>'.$registro['correo_electronico'].'</td>';
                        echo '<td>'.$registro['nota'].'</td>';
                    ?>
                </tr>            
            </table>
        <?php
        } else if(isset($_POST['enviar'])) {
            
        }
    ?>
</body>
</html>