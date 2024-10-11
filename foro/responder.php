<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    header("Location: ../htmls/foro.php?error=Debes%20iniciar%20sesión%20para%20responder");
    exit();
}

// Establecer la zona horaria en Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Conectar a la base de datos
$conn = new mysqli('sql102.ezyro.com', 'ezyro_37481443', '8a4e5bcec97b1e', 'ezyro_37481443_base_de_datos');

// Establecer la codificación de caracteres a UTF-8MB4
$conn->set_charset("utf8mb4");

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $id_publicacion = intval($_POST['id_publicacion']);
    $id_categoria = intval($_POST['id_categoria']);
    $id_usuario = intval($_POST['id_usuario']);
    $contenido = $conn->real_escape_string(trim($_POST['contenido'])); // Protege contra SQL Injection

    // Obtener la fecha actual desde PHP
    $fecha_actual = date('Y-m-d H:i:s');

    // Consulta para insertar la respuesta en la base de datos
    $sql = "INSERT INTO respuestas (id_publicacion, id_usuario, contenido, fecha) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $id_publicacion, $id_usuario, $contenido, $fecha_actual);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        // Redirigir con mensaje de éxito
        header("Location: ../htmls/foro.php?id_categoria=$id_categoria&success=Respuesta%20enviada%20correctamente");
    } else {
        // Redirigir con mensaje de error
        header("Location: ../htmls/foro.php?id_categoria=$id_categoria&error=Error%20al%20enviar%20la%20respuesta");
    }
    
    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
