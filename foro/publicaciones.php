<!-- publicaciones.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicaciones</title>
</head>
<body>
    <h1>Publicaciones</h1>

    <?php
    // Conexión a la base de datos
    $conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');

    // Verificar si hay algún error en la conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Obtener el ID del tema desde la URL
    $id_tema = $_GET['id_tema'];

    // Consulta para obtener las publicaciones del tema seleccionado
    $sql = "SELECT * FROM publicaciones WHERE id_tema=$id_tema";
    $result = $conn->query($sql);
    ?>

    <ul>
        <?php
        // Mostrar las publicaciones
        while($publicacion = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($publicacion['contenido']) . " - Publicado por usuario ID: " . $publicacion['id_usuarios'] . "</li>";

            // Mostrar respuestas para cada publicación
            $id_publicacion = $publicacion['id'];
            $sql_respuestas = "SELECT * FROM respuestas WHERE id_publicacion=$id_publicacion";
            $respuestas = $conn->query($sql_respuestas);

            echo "<ul>";
            while ($respuesta = $respuestas->fetch_assoc()) {
                echo "<li>Respuesta: " . htmlspecialchars($respuesta['contenido']) . "</li>";
            }
            echo "</ul>";

            // Formulario para responder a la publicación
            echo "<form action='responder.php' method='POST'>
                    <input type='hidden' name='id_publicacion' value='$id_publicacion'>
                    <textarea name='contenido' required></textarea>
                    <button type='submit'>Responder</button>
                  </form>";
        }
        ?>
    </ul>

    <!-- Formulario para nueva publicación -->
    <h2>Nueva Publicación</h2>
    <form action="publicar.php" method="POST">
        <input type="hidden" name="id_tema" value="<?php echo $id_tema; ?>">
        <textarea name="contenido" required></textarea>
        <button type="submit">Publicar</button>
    </form>

    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
