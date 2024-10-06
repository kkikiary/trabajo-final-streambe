<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATARSIS</title>
    <link rel="stylesheet" href="../styles/stylepag.css" />
</head>
<body>
    <header>
        <h1><a href="index.html">CATARSIS</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="temas.php">TEMAS</a></li>
                <li><a href="info.html">INFORMACIÓN</a></li>
            </ul>
        </nav>
    </header>

    <section id="content" class="container">
        <div id="forum">
            <h2>Foro</h2>

            <?php
            // Iniciar la sesión
            session_start();

            // Verificar si el usuario ha iniciado sesión
            if (!isset($_SESSION['nombre'])) {
                header("Location: inicio.php?error=Debes%20iniciar%20sesión%20para%20publicar");
                exit();
            }

            // Conexión a la base de datos
            $conn = new mysqli('localhost', 'root', '', 'base_de_datos');

            // Verificar conexión
            if ($conn->connect_error) {
                die("Error en la conexión: " . $conn->connect_error);
            }

            // Consulta categorías
            $sql = "SELECT * FROM categorias";
            $result = $conn->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Mostrar categorías con descripción y enlace a foro.php
                while ($categoria = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<h3>" . htmlspecialchars($categoria['nombre_categoria']) . "</h3>";
                    
                    // Mostrar descripción de la categoría
                    echo "<p>" . htmlspecialchars($categoria['descripcion']) . "</p>";

                    echo "<p><a href='foro.php?id_categoria=" . $categoria['id'] . "'>Ver más</a></p>";
                    echo "</div>";
                    echo "<hr>";
                }
            } else {
                echo "<p>No hay categorías disponibles.</p>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>

        <aside id="profiles">
            <h2>Profesionales</h2>
            <div class="profile">
                <h3>Dr. María Pérez</h3>
                <p><strong>Psicología Clínica</strong></p>
                <p>10 años trabajando en terapia cognitivo-conductual y manejo de la ansiedad...</p>
                <p><a href="profesionales.html">Ver perfil</a></p>
            </div>
            <div class="profile">
                <h3>Lic. Juan Rodríguez</h3>
                <p><strong>Psicoterapia Gestalt</strong></p>
                <p>8 años en terapia Gestalt, especializado en manejo de crisis emocionales...</p>
                <p><a href="profesionales.html">Ver perfil</a></p>
            </div>
        </aside>
    </section>
</body>
</html>
