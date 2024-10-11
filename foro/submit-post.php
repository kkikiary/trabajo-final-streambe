
<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../htmls/foro.php?error=Debes%20iniciar%20sesión%20para%20publicar");
    exit();
}

// Establecer la zona horaria en Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Obtener el id del usuario desde la sesión
$id_usuario = $_SESSION['id'];
$contenido = isset($_POST['contenido']) ? trim($_POST['contenido']) : '';
$id_categoria = isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : 1;

// Verificar que el contenido no esté vacío
if (!empty($contenido)) {
    // Conexión a la base de datos
    $conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Establecer la codificación de caracteres a UTF-8MB4
    $conn->set_charset("utf8mb4");

    // Obtener la fecha actual desde PHP
    $fecha_actual = date('Y-m-d H:i:s');

    // Insertar la nueva publicación en la base de datos
    $sql = "INSERT INTO publicaciones (id_usuario, id_categoria, contenido, fecha) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiss', $id_usuario, $id_categoria, $contenido, $fecha_actual);

    if ($stmt->execute()) {
        // Redirigir a foro.php con un mensaje de éxito
        header("Location: ../htmls/foro.php?id_categoria=$id_categoria&success=Publicación%20realizada%20con%20éxito");
        exit();
    } else {
        // Redirigir a foro.php con un mensaje de error
        header("Location: ../htmls/foro.php?id_categoria=$id_categoria&error=Error%20al%20publicar%20el%20mensaje");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Si el contenido está vacío, redirigir con un mensaje de error
    header("Location: ../htmls/foro.php?id_categoria=$id_categoria&error=El%20contenido%20no%20puede%20estar%20vacío");
    exit();
}
?>
