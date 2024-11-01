<?php
include "modelo/conexion.php"; // Asegúrate de que esto no genere salida

// Variable para almacenar mensajes
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnregistrar"])) {
    // Validaciones y consultas a la base de datos
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["ocupacion"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $ocupacion = $_POST["ocupacion"];

        $sql = $conn->prepare("INSERT INTO personas (nombre, apellido, dni, ocupacion) VALUES (?, ?, ?, ?)");
        $sql->execute([$nombre, $apellido, $dni, $ocupacion]);

        if ($sql) {
            $mensaje = "<div class='alert alert-success'>Registro agregado exitosamente</div>";

            // Redirigir después de procesar el formulario para evitar el reenvío
            echo "<script>location.href='index.php';</script>";
        } else {
            $mensaje = "<div class='alert alert-danger'>Error al agregar el registro</div>";
        }
    } else {
        $mensaje = "<div class='alert alert-warning'>Falta algún campo</div>";
    }
}
?>
