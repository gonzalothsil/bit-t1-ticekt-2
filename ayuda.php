<?php
session_start();
include("menu_bs.php");  // Incluimos el menú

// Título de la página de ayuda
echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-sm-12">';
echo '<h3>Sección de Ayuda</h3>';
echo '<p>Bienvenido a la sección de ayuda. Aquí encontrarás información útil para navegar por la plataforma.</p>';
echo '<p><strong>¿Cómo usar el sistema?</strong></p>';
echo '<ul>';
echo '<li><strong>Registro de usuario:</strong> Para registrarte, haz clic en "Registro" en el menú principal.</li>';
echo '<li><strong>Ingreso de libros:</strong> Ve a la sección "Libros" y agrega nuevos libros para que otros usuarios puedan consultarlos.</li>';
echo '<li><strong>Ver carteles:</strong> Haz clic en "Cartelera" para ver los carteles disponibles según las categorías.</li>';
echo '</ul>';
echo '<p><strong>Preguntas Frecuentes:</strong></p>';
echo '<ul>';
echo '<li><strong>¿Cómo puedo registrar un libro?</strong> - Ve a la sección "Libros" y agrega un nuevo libro desde allí.</li>';
echo '<li><strong>¿Cómo puedo ver las noticias de la biblioteca?</strong> - En la "Cartelera", puedes ver los carteles clasificados por categoría.</li>';
echo '<li><strong>¿Cómo contactar con soporte?</strong> - Puedes contactarnos desde el chat o enviar un correo electrónico.</li>';
echo '</ul>';

echo '<p>Si necesitas más ayuda, no dudes en contactarnos.</p>';
echo '</div>';
echo '</div>';
echo '</div>';
?>

