<!-- categorias.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías del Foro</title>
</head>
<body>
    <h1>Categorías</h1>
    <ul>
        <?php
        // Conexión a la base de datos
        $conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');

        // Consulta categorías
        $sql = "SELECT * FROM categorias";
        $result = $conn->query($sql);

        // Mostrar categorías
        while($categoria = $result->fetch_assoc()) {
            echo "<li><a href='temas.php?id_categoria=" . $categoria['id'] . "'>" . $categoria['nombre_categoria'] . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>
