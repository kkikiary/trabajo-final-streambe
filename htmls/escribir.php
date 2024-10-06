<?php
session_start();

// Verifica si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../htmls/foro.php?error=Debes%20iniciar%20sesión%20para%20escribir");
    exit();
}

$id_categoria = isset($_GET['id_categoria']) ? intval($_GET['id_categoria']) : 1;  // Obtener la categoría
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
