<!-- responder.php -->
<?php
$conn = new mysqli('localhost', 'root', '', 'base_de_datos');
$id_publicacion = $_POST['id_publicacion'];
$id_usuario = 1; // ID del usuario que inicia sesión
$contenido = $_POST['contenido'];

$sql = "INSERT INTO respuestas (id_publicacion, id_usuario, contenido) VALUES ($id_publicacion, $id_usuario, '$contenido')";
$conn->query($sql);
header("Location: publicaciones.php?id_tema=" . $_POST['id_tema']);
?>
