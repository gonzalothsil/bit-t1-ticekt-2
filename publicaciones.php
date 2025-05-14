<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $archivo = $_FILES['archivo']['name'];

    // Verificar que el archivo sea de tipo permitido (audio o video)
    if (in_array($tipo_archivo, ['audio/mpeg', 'audio/wav', 'video/mp4'])) {
        // Mover el archivo a una carpeta de subida
        move_uploaded_file($_FILES['archivo']['tmp_name'], "uploads/" . $archivo);

        Publicacion::insertar_publicacion($titulo, $descripcion, $tipo_archivo, $archivo);
        echo "Publicación cargada exitosamente.";
    } else {
        echo "Tipo de archivo no permitido.";
    }
}
?>

<form action="publicaciones.php" method="POST" enctype="multipart/form-data">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required>
    
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea>
    
    <label for="archivo">Archivo:</label>
    <input type="file" id="archivo" name="archivo" accept="audio/*, video/*" required>
    
    <button type="submit">Cargar Publicación</button>
</form>

<?php
include("menu_bs.php");
include_once("libreria/publicaciones.php"); // Asegúrate de incluir la lógica para obtener las publicaciones

// Obtener publicaciones desde la base de datos
$publicaciones = Publicacion::obtener_publicaciones();  // Método para obtener publicaciones, adaptado a tu sistema

echo '<div class="container-fluid">';

foreach ($publicaciones as $pub) {
    echo '<div class="row">';
    echo '<div class="col-sm-12">';
    
    // Mostrar título y descripción
    echo '<h3>' . $pub['titulo'] . '</h3>';
    echo '<p>' . $pub['descripcion'] . '</p>';

    // Verificar tipo de archivo y mostrar la vista previa adecuada
    if ($pub['tipo_archivo'] == 'audio') {
        // Vista previa para audios
        echo '<audio controls>';
        echo '<source src="uploads/' . $pub['archivo'] . '" type="audio/mpeg">';
        echo 'Tu navegador no soporta el reproductor de audio.';
        echo '</audio>';
    } elseif ($pub['tipo_archivo'] == 'video') {
        // Vista previa para videos
        echo '<video width="100%" controls>';
        echo '<source src="uploads/' . $pub['archivo'] . '" type="video/mp4">';
        echo 'Tu navegador no soporta el reproductor de video.';
        echo '</video>';
    } else {
        // Si no es un archivo de audio ni video, mostrar el archivo de otra forma (por ejemplo, imagen o enlace)
        echo '<p><strong>Archivo:</strong> <a href="uploads/' . $pub['archivo'] . '" target="_blank">Descargar</a></p>';
    }

    echo '</div>';
    echo '</div>';
}

echo '</div>';
?>
