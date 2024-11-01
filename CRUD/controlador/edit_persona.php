<?php
include "modelo/conexion.php";

// Validación de formulario vacío
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["dni"]) && !empty($_POST["ocupacion"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $ocupacion = $_POST["ocupacion"];

        $sql = $conn->prepare("UPDATE personas SET nombre=?, apellido=?, dni=?, ocupacion=? WHERE id=?");
        $sql->execute([$nombre, $apellido, $dni, $ocupacion, $id]);

        if ($sql->rowCount() > 0) {
            // Redirección a index.php si la actualización fue exitosa
            header("Location: index.php");
            exit(); // Importante: detener la ejecución del script después de la redirección
        } else {
            echo "<div class='alert alert-danger'>Error al actualizar</div>";
        }
    }
}
?>
