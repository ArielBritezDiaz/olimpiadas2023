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

            $enfermeroSelect = $_POST['enfermeroSelect'];

            $sqlBusqueda = "SELECT * FROM Enfermero WHERE id_enfermero = '$enfermeroSelect'";
            $sqlBusquedaQuery = mysqli_query($conexion, $sqlBusqueda);
            $registro = mysqli_fetch_assoc($sqlBusquedaQuery);

            $nombreEnfermero = $registro['nombre'];
            $apellidoEnfermero = $registro['apellido'];
            
            $datos = array(
                $dni = $_POST['dni'],
                $nombre = $_POST['nombre'],
                $apellido = $_POST['apellido'],
                $fecha_nacimiento = $_POST['fecha_nacimiento'],
                $pais = $_POST['pais'],
                $provincia = $_POST['provincia'],
                $localidad = $_POST['localidad'],
                $codigo_postal = $_POST['codigo_postal'],
                $sexo = $_POST['sexo'],
                $telefono = $_POST['telefono'],
                $correo_electronico = $_POST['correo_electronico'],
                $nota = $_POST['nota'],
                $grupo_sanguineo = $_POST['grupo_sanguineo'],
                $obra_social = $_POST['nombre_obra_social'],
                $vacunacion_completa = $_POST['vacunacion_completa'],
                $medicamento = $_POST['nombre_medicamento'],
                $nota_medica = $_POST['nota_medica'],
                $zona = $_POST['zona'],
                $informacionEnfermero = "$apellidoEnfermero, $nombreEnfermero"
            );

            $insertDatosPaciente = "INSERT INTO paciente(nombre, apellido, fecha_nacimiento, pais, provincia, localidad, codigo_postal, sexo, dni, telefono, correo_electronico, nota, grupo_sanguineo, obra_social, vacunacion_completa, medicamento, nota_medica, id_zona_fk, id_enfermero_fk) VALUES ()";

            ?>
                <div>
                    <?php
                        foreach($datos as $dato) {
                            echo "<p>". $dato ."</p>";
                        }
                    ?>
                </div>
            <?php
        }
    ?>
</body>
</html>