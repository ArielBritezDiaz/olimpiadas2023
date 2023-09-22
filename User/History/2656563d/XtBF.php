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
    <form action="mostrarDatos.php" method="get">
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
        <input type="email" name="email" placeholder="Correo electronico">
        <input type="text" name="nota" placeholder="Nota">

        <h3>Datos medicos</h3>
        <select name="sanguineo" required>
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
        <select name="obra_social" required>
        <option disabled selected>¿Obra social?</option>
            <option>No</option>
            <option>Si</option>
        </select>
        <input type="text" name="obra" placeholder="Obra social"></input>
        <select name="vacunacion" required>
        <option disabled selected>¿Vacunacion completa?</option>
            <option>No</option>
            <option>Si</option>
        </select>
        <select name="medicamentos" required>
        <option disabled selected>¿Consume medicamentos?</option>
            <option>No</option>
            <option>Si</option>
        </select>
        <input type="text" name="cual" placeholder="¿Cual medicamento?">
        <input type="text" name="nota_medica" placeholder="Nota">
        <select name="zona" required>
        <option disabled selected>Zona</option>
            <option>Zona 1</option>
            <option>Zona 2</option>
            <option>Zona 3</option>
            <option>Zona 4</option>
        </select>
        <input type="search" name="enfermero" placeholder="Buscar enfermero">
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <?php
        
    ?>
</body>
</html>