<?php include("conexion.php"); ?>

<h2>Ingresar Resultado</h2>
<form method="POST">
    <label>Equipo Local:</label>
    <select name="equipo_local" required>
        <?php
        $equipos = $conexion->query("SELECT * FROM equipos");
        while ($row = $equipos->fetch_assoc()) {
            echo "<option value='{$row['id_equipo']}'>{$row['nombre']}</option>";
        }
        ?>
    </select>

    <label>Goles Local:</label>
    <input type="number" name="goles_local" required>

    <label>Equipo Visitante:</label>
    <select name="equipo_visitante" required>
        <?php
        $equipos->data_seek(0); // Reiniciar puntero
        while ($row = $equipos->fetch_assoc()) {
            echo "<option value='{$row['id_equipo']}'>{$row['nombre']}</option>";
        }
        ?>
    </select>

    <label>Goles Visitante:</label>
    <input type="number" name="goles_visitante" required>

    <br><br>
    <input type="submit" value="Guardar Resultado">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $local = $_POST["equipo_local"];
    $visitante = $_POST["equipo_visitante"];
    $g_local = $_POST["goles_local"];
    $g_visitante = $_POST["goles_visitante"];

    if ($local == $visitante) {
        echo "<p style='color:red;'>Un equipo no puede jugar contra sí mismo.</p>";
        exit;
    }

    $stmt = $conexion->prepare("INSERT INTO partidos (equipo_local, equipo_visitante, goles_local, goles_visitante, fecha, jugado) VALUES (?, ?, ?, ?, NOW(), TRUE)");
    $stmt->bind_param("iiii", $local, $visitante, $g_local, $g_visitante);
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Resultado guardado correctamente.</p>";
    } else {
        echo "<p style='color:red;'>Error al guardar el resultado.</p>";
    }
}
?>

<br>
<a href="tabla_posiciones.php">Ver Tabla de Posiciones</a>
