<?php

include "modelo/conexion.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conn->query("DELETE from personas where id=$id ");

    if ($sql->rowCount() > 0) {
        echo "<div class='alert alert-success'>Dato eliminado correctamente</div>";
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar</div>";
    }
}