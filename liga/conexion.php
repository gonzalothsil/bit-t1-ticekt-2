<?php
$conexion = new mysqli("localhost", "root", "", "liga");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
