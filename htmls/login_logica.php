<?php
session_start();
include_once('../Conexion.php');

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['nombre']) && isset($_POST['contraseña'])) {
    $nombre = validate($_POST['nombre']);
    $contraseña = validate($_POST['contraseña']);

    if (empty($nombre)) {
        header("Location: inicio.php?error=El%20nombre%20es%20requerido");
        exit();
    } elseif (empty($contraseña)) {
        header("Location: inicio.php?error=La%20Contraseña%20es%20requerida");
        exit();
    } else {
        $Sql = "SELECT * FROM registro WHERE nombre = ?";
        $stmt = $conexion->prepare($Sql);
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($contraseña, $row['contraseña'])) {
                // Aquí agregamos un var_dump para verificar la información de sesión
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['id'] = $row['id'];
                
                echo "Sesión iniciada correctamente. Nombre: " . $_SESSION['nombre'];
                echo "<br>ID de usuario: " . $_SESSION['id'];
                
                header("Location: pagina.php");
                exit();
            } else {
                header("Location: inicio.php?error=El%20nombre%20o%20la%20contraseña%20son%20incorrectas");
                exit();
            }
        } else {
            header("Location: inicio.php?error=El%20nombre%20o%20la%20contraseña%20son%20incorrectas");
            exit();
        }
    }
} else {
    header("Location: inicio.php?error=El%20nombre%20o%20la%20contraseña%20son%20incorrectas");
    exit();
}
