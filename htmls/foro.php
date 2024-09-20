<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'base_de_datos');

// Verificar si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener el ID de la categoría desde la URL
$id_categoria = $_GET['id_categoria'];

// Consulta para obtener las publicaciones de la categoría seleccionada
$sql_publicaciones = "SELECT * FROM publicaciones WHERE id = $id_categoria";
$result_publicaciones = $conn->query($sql_publicaciones);

// Verificar si hay publicaciones
if ($result_publicaciones->num_rows > 0) {
    // Array para almacenar las publicaciones
    $publicaciones = [];
    while($publicacion = $result_publicaciones->fetch_assoc()) {
        $publicaciones[] = $publicacion;
    }
} else {
    echo "No se encontraron publicaciones para esta categoría.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro - CATARSIS</title>
    <link rel="stylesheet" href="../styles/styleforo.css" />
</head>
<body>
    <header>
        <h1><a href="index.html">CATARSIS</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="pagina.php">Atrás</a></li> <!-- Botón de 'Atrás' -->
            </ul>
        </nav>
    </header>

    <section id="content" class="container">
        <h2>Foro de Discusión</h2>

        <?php foreach ($publicaciones as $publicacion): ?>
            <div class="post">
                <div class="post-header">
                    <h3><?php echo htmlspecialchars($publicacion['nombre_usuario']); ?></h3>
                    <p>Fecha: <?php echo date("d/m/Y, H:i A", strtotime($publicacion['fecha'])); ?></p>
                </div>
                <div class="post-body">
                    <p><?php echo htmlspecialchars($publicacion['contenido']); ?></p>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </section>

    <?php
    // Cerrar conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
