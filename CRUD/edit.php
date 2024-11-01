<?php
include "modelo/conexion.php";

// Procesar la edición antes de enviar cualquier salida HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "controlador/edit_persona.php";
}

// Obtener el ID desde la URL
$id = $_GET["id"];

// Obtener los datos de la persona a editar
$sql = $conn->query("SELECT * FROM personas WHERE id=$id");
$datos = $sql->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d66b87370d.js" crossorigin="anonymous"></script>
    <title>Editar</title>
</head>

<body class="bg-dark">
    <div class="container">
        <form class="col-4 p-3 m-auto border mt-4 bg-dark-subtle" method="post">
            <h4 class="text-center alert alert-secondary">Modificando Información</h4>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $datos->apellido ?>">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" value="<?= $datos->dni ?>">
            </div>
            <div class="mb-3">
                <label for="ocupacion" class="form-label">Ocupación</label>
                <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?= $datos->ocupacion ?>">
            </div>
            <input type="hidden" name="id" id="id" value="<?= $datos->id ?>">
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Guardar</button>
        </form>
    </div>
</body>

</html>
