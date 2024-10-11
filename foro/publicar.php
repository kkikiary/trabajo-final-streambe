<?php
session_start(); // Iniciar sesión para obtener el ID del usuario

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    die("Error: Usuario no autenticado.");
}

$id_usuario = $_SESSION['id'];

// Conectar a la base de datos
$conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_tema = $conn->real_escape_string($_POST['id_tema']);
$contenido = $conn->real_escape_string($_POST['contenido']);

// Evitar inyección SQL usando consultas preparadas
$stmt = $conn->prepare("INSERT INTO publicaciones (id_tema, id_usuario, contenido) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $id_tema, $id_usuario, $contenido);

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    header("Location: publicaciones.php?id_tema=$id_tema&success=Publicación%20exitosa");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
