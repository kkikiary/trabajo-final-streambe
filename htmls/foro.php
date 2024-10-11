<?php
session_start();
date_default_timezone_set('America/Argentina');

// Verificar si el usuario está logueado, si no, redirigir
if (!isset($_SESSION['id'])) {
    header("Location: ../inicio_sesion/login_logica.php?error=Debes%20iniciar%20sesión");
    exit();
}

// Conectar a la base de datos
 $conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');
 $conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si 'id_categoria' está presente en la URL
$id_categoria = isset($_GET['id_categoria']) ? intval($_GET['id_categoria']) : 1;

// Consulta para obtener las publicaciones de la categoría seleccionada
$sql_publicaciones = "SELECT p.id, p.contenido, p.fecha, r.nombre 
                      FROM publicaciones p 
                      JOIN registro r ON p.id_usuario = r.id 
                      WHERE p.id_categoria = ? 
                      ORDER BY p.fecha DESC";
$stmt = $conn->prepare($sql_publicaciones);
$stmt->bind_param("i", $id_categoria);
$stmt->execute();
$result_publicaciones = $stmt->get_result();

// Array para almacenar las publicaciones
$publicaciones = [];
if ($result_publicaciones->num_rows > 0) {
    while ($publicacion = $result_publicaciones->fetch_assoc()) {
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
    <title>Foro</title>
    <link rel="stylesheet" href="../styles/styleforo.css" />
</head>
<body>

<header>
    <h1>Foro Dinámico</h1>
    <nav id="nav">
        <ul>
            <li><a href="../htmls/pagina.php">Atrás</a></li> <!-- Botón de 'Atrás' -->
        </ul>
    </nav>
</header>

<section id="content" class="container">
    <h2>Foro de Discusión</h2>

    <!-- Mostrar mensajes de éxito o error -->
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <!-- Botón para ir a escribir una publicación -->
    <!-- Botón para ir a escribir una publicación -->
<a href="escribir.php?id_categoria=<?php echo $id_categoria; ?>" style="color: black; font-size: 20px;">Escribir Publicación</a>



    <h3>Publicaciones Recientes</h3>

    <!-- Mostrar las publicaciones -->
    <?php foreach ($publicaciones as $publicacion): ?>
        <div class="post">
            <div class="post-header">
                <h3><?php echo htmlspecialchars($publicacion['nombre']); ?></h3>
                <p>Fecha: <?php echo date("d/m/Y, H:i A", strtotime($publicacion['fecha'])); ?></p>
            </div>
            <div class="post-body">
                <p><?php echo htmlspecialchars($publicacion['contenido']); ?></p>
            </div>

            <!-- Mostrar respuestas de la publicación -->
            <div class="responses">
                <h4>Respuestas:</h4>
                <?php
                // Consulta para obtener las respuestas de esta publicación
                $id_publicacion = $publicacion['id'];
                $sql_respuestas = "SELECT r.contenido, u.nombre, r.fecha 
                                   FROM respuestas r
                                   JOIN registro u ON r.id_usuario = u.id
                                   WHERE r.id_publicacion = ?";
                $stmt_respuestas = $conn->prepare($sql_respuestas);
                $stmt_respuestas->bind_param("i", $id_publicacion);
                $stmt_respuestas->execute();
                $result_respuestas = $stmt_respuestas->get_result();

                if ($result_respuestas->num_rows > 0) {
                    while ($respuesta = $result_respuestas->fetch_assoc()) {
                        echo "<div class='respuesta'>";
                        echo "<strong>" . htmlspecialchars($respuesta['nombre']) . ":</strong> ";
                        echo "<p>" . htmlspecialchars($respuesta['contenido']) . "</p>";
                        echo "<p>Fecha: " . date("d/m/Y, H:i A", strtotime($respuesta['fecha'])) . "</p>";
                        echo "</div><hr>";
                    }
                } else {
                    echo "No hay respuestas para esta publicación.";
                }
                ?>
            </div>

            <!-- Formulario para responder -->
            <!-- Formulario para responder -->
            <div class="respond-form">
                <form action="../foro/responder.php" method="POST">
                    <input type="hidden" name="id_publicacion" value="<?php echo $publicacion['id']; ?>">
                    <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
                    <textarea name="contenido" placeholder="Escribe tu respuesta" required></textarea>
                    <button type="submit">Responder</button>
                </form>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>

</section>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>
