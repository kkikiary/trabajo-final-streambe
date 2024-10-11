<?php
session_start();
date_default_timezone_set('America/Argentina');

// Forzar que la salida sea interpretada como UTF-8
header('Content-Type: text/html; charset=UTF-8');

// Verifica si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../htmls/foro.php?error=Debes%20iniciar%20sesión%20para%20escribir");
    exit();
}

// Obtener la categoría
$id_categoria = isset($_GET['id_categoria']) ? intval($_GET['id_categoria']) : 1;

// Conexión a la base de datos si es necesario
$conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');
$conn->set_charset("utf8mb4");

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// En este archivo no parece que uses la conexión directamente aquí, pero si fuera necesario
// ya tienes la conexión establecida con el charset correcto
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylepag.css">
    <title>Escribir Publicación</title>
</head>
<body>
    <h1>Escribir Publicación</h1>

    <!-- Formulario para escribir la publicación -->
    <form action="../foro/submit-post.php" method="POST">

        <!-- Enviar la categoría oculta -->
        <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
        <textarea name="contenido" placeholder="Escribe tu mensaje aquí" required></textarea><br>
        <button type="submit">Enviar</button>
    </form>

    <a href="../htmls/foro.php?id_categoria=<?php echo $id_categoria; ?>">Volver al Foro</a>
</body>
</html>
