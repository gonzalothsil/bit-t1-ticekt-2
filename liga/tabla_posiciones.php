<?php include("conexion.php"); ?>

<h2>Tabla de Posiciones</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr style="background-color:#f2f2f2;">
        <th>Pos</th>
        <th>Equipo</th>
        <th>J</th>
        <th>G</th>
        <th>E</th>
        <th>P</th>
        <th>GF</th>
        <th>GC</th>
        <th>DIF</th>
        <th>PTS</th>
    </tr>
    <?php
    $tabla = $conexion->query("SELECT * FROM vista_tabla_posiciones ORDER BY PTS DESC, DIF DESC");
    $pos = 1;
    while ($row = $tabla->fetch_assoc()) {
        echo "<tr>
            <td>{$pos}</td>
            <td>{$row['equipo']}</td>
            <td>{$row['J']}</td>
            <td>{$row['G']}</td>
            <td>{$row['E']}</td>
            <td>{$row['P']}</td>
            <td>{$row['GF']}</td>
            <td>{$row['GC']}</td>
            <td>{$row['DIF']}</td>
            <td>{$row['PTS']}</td>
        </tr>";
        $pos++;
    }
    ?>
</table>
<br>
<a href="ingresar_resultado.php">Ingresar nuevo resultado</a>
