<!-- temas.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Temas</title>
</head>
<body>
    <h1>Temas</h1>

    <?php
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'base_de_datos');

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el ID de la categoría desde la URL
    $id_categoria = $_GET['id_categoria'];

    // Consulta para obtener los temas relacionados con la categoría seleccionada
    $sql = "SELECT * FROM temas WHERE id_categoria=$id_categoria";
    $result = $conn->query($sql);
    ?>

    <ul>
        <?php
        // Mostrar los temas
        while($tema = $result->fetch_assoc()) {
            echo "<li><a href='publicaciones.php?id_tema=" . $tema['id'] . "'>" . htmlspecialchars($tema['titulo']) . "</a></li>";
        }
        ?>
    </ul>

    <?php
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
