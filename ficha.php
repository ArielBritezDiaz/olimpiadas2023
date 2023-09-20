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
    <form action="#">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="number" name="dni" placeholder="DNI">
        <input type="date" name="nacimiento">
        <input type="text" name="pais" placeholder="Pais">
        <input type="text" name="provincia" placeholder="Provincia">
        <input type="text" name="localidad" placeholder="Localidad">
        <input type="number" name="postal" placeholder="Codigo postal">

        <h3>Datos medicos</h3>
        <select name="sanguineo">
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
        <select name="obra_social">
        <option disabled selected>¿Obra social?</option>
            <option>No</option>
            <option>Si</option>
        </select>
        <input type="text" name="obra" placeholder="Obra social"></input>
        <select name="vacunacion">
        <option disabled selected>¿Vacunacion completa?</option>
            <option>No</option>
            <option>Si</option>
        </select>
        <select name="medicamentos">
        <option disabled selected>¿Consume medicamentos?</option>
            <option>No</option>
            <option>Si</option>
        </select>
        <input type="text" name="cual" placeholder="¿Cual medicamento?">
    </form>
</body>
</html>