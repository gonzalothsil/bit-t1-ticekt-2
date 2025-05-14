<?php

// config.php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bio_tp';

$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer charset (opcional, pero recomendado)
$conn->set_charset("utf8");
?>
