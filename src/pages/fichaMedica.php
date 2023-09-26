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

            $fecha_nacimiento_format = $date . '-' . $month . '-' . $year;
            $fecha_nacimiento_db = $_POST['fecha_nacimiento'];

            $codigo_postal = $_POST['codigo_postal'];
            settype($codigo_postal, "int");

            $telefono = $_POST['telefono'];
            settype($telefono, "int");

            $vacunacion_completa = $_POST['vacunacion_completa'];
            if($vacunacion_completa == "Si") {
                $vacunacion_completa = 1;
            } else {
                $vacunacion_completa = 0;
            }
                        
            $datos_db = array(
                $dni, //1
                $nombre = $_POST['nombre'], //2
                $apellido = $_POST['apellido'], //3
                $fecha_nacimiento_db, //4
                $pais = $_POST['pais'], //5
                $provincia = $_POST['provincia'], //6
                $localidad = $_POST['localidad'], //7
                $codigo_postal, //8
                $sexo = $_POST['sexo'], //9
                $telefono, //10
                $correo_electronico = $_POST['correo_electronico'], //11
                $nota = $_POST['nota'], //12
                $grupo_sanguineo = $_POST['grupo_sanguineo'], //13
                $vacunacion_completa, //14
                $nota_medica = $_POST['nota_medica'], //15
                $zona = $_POST['zona'], //16
                $enfermero_db = $registro['id_enfermero'] //17
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
                    $i=1;
                        foreach($datos_db as $dato) {
                            
                            echo "<p>". $i . " " .  $dato ." (". gettype($dato) .")</p>";
                            $i++;
                        }
                    ?>
                </div>
            <?php
        }
    ?>
</body>
</html>