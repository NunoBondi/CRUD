<?php

$host = "postgresdbapp01.postgres.database.azure.com";
$user = "postgre";
$password = "password-01";
$db = "registro";

try {
    $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Guardar el mensaje de error en una variable o manejarlo adecuadamente
    // Evitar enviar salida directa en este archivo
    // Por ejemplo, puedes lanzar una excepción que luego se capture en el archivo principal
    throw new Exception("Error de conexión: " . $e->getMessage());
}
