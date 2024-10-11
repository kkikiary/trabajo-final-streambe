<?php
session_start();
include_once('../conexion.php');

// Función para limpiar y validar los datos
function validar($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar y validar los datos de entrada
    $nombre = validar($_POST['nombre']);
    $correo = validar($_POST['correo']);
    // Cambiado 'contraseña' por 'pass'
    $pass = password_hash(validar($_POST['pass']), PASSWORD_DEFAULT);

    // Preparar la consulta usando sentencias preparadas
    $stmt = $conexion->prepare("INSERT INTO registro (nombre, pass, correo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $pass, $correo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Guardar el id del usuario registrado en la sesión
        $_SESSION['id'] = $stmt->insert_id;
        header('Location: inicio.php');
        exit();
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();
}
?>
