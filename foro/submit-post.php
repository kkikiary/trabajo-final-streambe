<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../htmls/foro.php?error=Debes%20iniciar%20sesión%20para%20publicar");
    exit();
}

// Obtener el id del usuario desde la sesión
$id_usuario = $_SESSION['id'];
$contenido = isset($_POST['contenido']) ? trim($_POST['contenido']) : '';
$id_categoria = isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : 1;

// Verificar que el contenido no esté vacío
if (!empty($contenido)) {
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'base_de_datos');

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Insertar la nueva publicación en la base de datos
    $sql = "INSERT INTO publicaciones (id_usuario, id_categoria, contenido, fecha) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', $id_usuario, $id_categoria, $contenido);

    if ($stmt->execute()) {
        // Redirigir a foro.php con un mensaje de éxito (a la carpeta htmls)
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
