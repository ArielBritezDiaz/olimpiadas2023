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
    <form action="" method="POST">
        <input type="number" name="dni" placeholder="DNI">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="date" name="fecha_nacimiento">
        <input type="text" name="pais" placeholder="Pais">
        <input type="text" name="provincia" placeholder="Provincia">
        <input type="text" name="localidad" placeholder="Localidad">
        <input type="number" name="codigo_postal" placeholder="Codigo postal">
        <select name="sexo" required>
            <option disabled selected>Sexo</option>
            <option>Masculino</option>
            <option>Femenino</option>
        </select>
        <input type="number" name="telefono" placeholder="Telefono">
        <input type="email" name="correo_electronico" placeholder="Correo electronico">
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
        <div class="obra_social_hidden" id="obra_social_hidden">

        </div>
        <select name="vacunacion_completa" required>
            <option disabled selected>¿Vacunacion completa?</option>
            <option>No</option>
            <option>Si</option>
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
        <input type="search" name="enfermero" id="enfermero" placeholder="Buscar enfermero">
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <?php
        if(isset($_POST['enviar'])) {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $pais = $_POST['pais'];
            $provincia = $_POST['provincia'];
            $localidad = $_POST['localidad'];
            $codigo_postal = $_POST['codigo_postal'];
            $sexo = $_POST['sexo'];
            $telefono = $_POST['telefono'];
            $correo_electronico = $_POST['correo_electronico'];
            $nota = $_POST['nota'];
            $grupo_sanguineo = $_POST['grupo_sanguineo'];
            $obra_social = $_POST['nombre_obra_social'];
            $vacunacion_completa = $_POST['vacunacion_completa'];
            $medicamneto = $_POST['nombre_medicamento'];
            $nota_medica = $_POST['nota_medica'];
            $zona = $_POST['zona'];
            $enfermero = $_POST['enfermero'];

            

        }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">

    </script>
    <script>
        function obraSocialHidden() {
            const obraSocial = document.getElementById('obra_social');
            const opcion = obraSocial.value;

            if(opcion == "Si") {
                const obraSocialHidden = document.getElementById('obra_social_hidden');
                obraSocialHidden.innerHTML = `<input type="text" name="nombre_obra_social" placeholder="Nombre de obra social"></input>`;
            } else if(opcion == "No") {
                obraSocialHidden = ``;
            }
        }

        function medicamentoHidden() {
            const medicamento = document.getElementById('medicamento');
            const opcion = medicamento.value;

            if(opcion == "Si") {
                const medicamentoHidden = document.getElementById('medicamento_hidden');
                medicamentoHidden.innerHTML = `<input type="text" name="nombre_medicamento" placeholder="Nombre de medicamento">`;
            } else if(opcion == "No") {
                medicamentoHidden = ``;
            }
        }
        
        $('#').on('enviar', function(e) {
            e.preventDefault();

            let buscador = ${'input[name=enfermero"]'}.val();
            $.ajax({
                url: 'ajax.php',
                type: "POST",
                data: {
                    buscador: buscador
                },
                success: function(response) {
                    ${'hi'}
                }
            })
        })

    </script>

</body>
</html>