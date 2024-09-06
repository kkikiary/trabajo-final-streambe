<?php
session_start();
include_once('../Conexion.php');

function validar($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = validar($_POST['nombre']);
    $correo = validar($_POST['correo']);
    $contraseña = password_hash(validar($_POST['contraseña']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO registro (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";
    if (mysqli_query($conexion, $sql)) {
        $_SESSION['id'] = mysqli_insert_id($conexion);
        header('Location: registro.php');
        exit();
    }
}
?>
