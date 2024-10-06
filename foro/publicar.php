<!-- publicar.php -->
<?php
session_start(); // Iniciar sesión para obtener el ID del usuario

// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '', 'base_de_datos');

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_tema = $_POST['id_tema'];
$id_usuario = $_SESSION['id_usuario']; // Obtener el ID del usuario desde la sesión
$contenido = $_POST['contenido'];

// Evitar inyección SQL usando consultas preparadas
$stmt = $conn->prepare("INSERT INTO publicaciones (id_tema, id_usuario, contenido) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $id_tema, $id_usuario, $contenido);

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    // Redirigir a la página de publicaciones si la inserción fue correcta
    header("Location: publicaciones.php?id_tema=$id_tema");
} else {
    echo "Error: " . $stmt->error; // Mostrar el error en caso de fallo
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
