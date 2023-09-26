<?php
    include("conexionDB.php");
    $query = "SELECT * FROM Enfermero ORDER BY apellido ASC";
    $result = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha medica</title>
</head>
<body>
    <h1>Creacion de ficha medica</h1>
    <h3>Datos personales</h3>
    <form action="fichaMedica.php" method="POST" enctype="multipart/form-data">
        <input type="number" name="dni" placeholder="DNI">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="date" name="fecha_nacimiento">
        <input type="text" name="pais" placeholder="País">
        <input type="text" name="provincia" placeholder="Provincia">
        <input type="text" name="localidad" placeholder="Localidad">
        <input type="number" name="codigo_postal" min="0" max="9999" placeholder="Código postal">
        <select name="sexo" required>
            <option disabled selected>Sexo</option>
            <option>Masculino</option>
            <option>Femenino</option>
        </select>
        <input type="number" name="telefono" placeholder="Teléfono">
        <input type="email" name="correo_electronico" placeholder="Correo electrónico">
        <input type="text" name="nota" placeholder="Nota">

        <h3>Datos medicos</h3>
        <select name="grupo_sanguineo" required>
            <option disabled selected>Grupo sanguineo</option>
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>B-</option>
            <option>AB+</option>
            <option>AB-</option>
            <option>O+</option>
            <option>O-</option>
        </select>
        <select name="obra_social" id="obra_social" onchange="obraSocialHidden()" required>
            <option disabled selected>¿Obra social?</option>
            <option value="No">No</option>
            <option value="Si">Si</option>
        </select>
        <div class="obra_social_hidden" id="obra_social_hidden" value="">

        </div>
        <select name="vacunacion_completa" required>
            <option disabled selected>¿Vacunacion completa?</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
        <select name="medicamento" id="medicamento" onchange="medicamentoHidden()" required>
            <option disabled selected>¿Consume medicamentos?</option>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>
        <div class="medicamento_hidden" id="medicamento_hidden">

        </div>
        <input type="text" name="nota_medica" placeholder="Nota">
        <select name="zona" required>
            <option disabled selected>Zona</option>
            <option>Zona 1</option>
            <option>Zona 2</option>
            <option>Zona 3</option>
            <option>Zona 4</option>
        </select>
        <!--<input type="search" name="enfermero" id="enfermero" placeholder="Buscar enfermero">-->
        <select name="enfermeroSelect" class="selectpicker" id="enfermeroSelect">
            <option disabled selected>Selecciona un enfermero</option>
            <?php
                foreach($result as $row) {
                    echo "<option name='enfermero' value='".$row['id_enfermero']."'>".$row['apellido']. ' ' . $row['nombre']."</option>";
                }
            ?>
        </select>
        
        <div id="funciona" class="funciona">

        </div>
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <script>
        function obraSocialHidden() {
            const obraSocial = document.getElementById('obra_social');
            const opcion = obraSocial.value;

            if(opcion == "Si") {
                const obraSocialHidden = document.getElementById('obra_social_hidden');
                obraSocialHidden.innerHTML = `<input type="text" name="nombre_obra_social" value="" placeholder="Nombre de obra social"></input>`;
            } else if(opcion == "No") {
                const obraSocialHidden = document.getElementById('obra_social_hidden');
                obraSocialHidden.innerHTML = `<span type="text" name="nombre_obra_social" value=""></span>`;
            }
        }
    </script>
    <script>
        function medicamentoHidden() {
            const medicamento = document.getElementById('medicamento');
            const opcion = medicamento.value;

            if(opcion == "Si") {
                const medicamentoHidden = document.getElementById('medicamento_hidden');
                medicamentoHidden.innerHTML = `<input type="text" name="nombre_medicamento" placeholder="Nombre de medicamento">`;
            } else if(opcion == "No") {
                const medicamentoHidden = document.getElementById('medicamento_hidden');
                medicamentoHidden = `<input type="hidden" name="nombre_obra_social" value=""></input>`;
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $("#enfermeroSelect").chosen();
    </script>

</body>
</html>