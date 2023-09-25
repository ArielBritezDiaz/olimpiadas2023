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
            
            $dni = $_POST['dni'];
            settype($dni, "int");

            $fecha = $_POST['fecha_nacimiento'];
            $result = explode('-', $fecha);
            $date = $result[2];
            $month = $result[1];
            $year = $result[0];

            //$fecha_nacimiento_format = $date . '-' . $month . '-' . $year;
            
            $datos = array(
                $dni,
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
                $vacunacion_completa = $_POST['vacunacion_completa'],
                $nota_medica = $_POST['nota_medica'],
                $zona = $_POST['zona'],
                $informacionEnfermero = "$apellidoEnfermero, $nombreEnfermero"
            );

            if(strlen($_POST['nombre_obra_social']) > 0) {
                $obra_social = $_POST['nombre_obra_social'];
                array_push($datos, $obra_social);
            }
            $a = strlen($_POST['nombre_medicamento']);
            if($a > 0) {
                $medicamento = $_POST['nombre_medicamento'];
                array_push($datos, $medicamento);
            }

            // $insertDatosPaciente = "INSERT INTO paciente(nombre, apellido, fecha_nacimiento, pais, provincia, localidad, codigo_postal, sexo, dni, telefono, correo_electronico, nota, grupo_sanguineo, obra_social, vacunacion_completa, medicamento, nota_medica, id_zona_fk, id_enfermero_fk) VALUES ($_POST['nombre'], $_POST['apellido'], $_POST['fecha_nacimiento'], $_POST['pais'], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], )";

            ?>
                <div>
                    <?php
                        foreach($datos as $dato) {
                            echo "<p>". $dato ." (". gettype($dato) .")</p>";
                        }
                    ?>
                </div>
            <?php
        }
    ?>
</body>
</html>