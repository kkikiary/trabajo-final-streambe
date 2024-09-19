<?php
session_start();
include_once('../Conexion.php');

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['nombre']) && isset($_POST['contraseña'])) {

    $nombre = validate($_POST['nombre']);
    $contraseña = validate($_POST['contraseña']);

    if (empty($nombre)) {
        header("Location: inicio.php.php?error=El%20nombre%20es%20requerido");
        exit();
    } elseif (empty($contraseña)) {
        header("Location: inicio.php.php?error=La%20Contraseña%20es%20requerida");
        exit();
    } else {
        
        $Sql = "SELECT * FROM registro WHERE nombre = '$nombre'";
        $result = mysqli_query($conexion, $Sql);

        if (!$result) {
            echo "Error en la consulta SQL: " . mysqli_error($conexion);
            exit();
        }

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($contraseña, $row['contraseña'])) {
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['id'] = $row['id'];
                header("Location: foro.html"); 
                exit();
            } else {
                header("Location: inicio.php.php?error=El%20nombre%20o%20la%20contraseña%20son%20incorrectas");
                exit();
            }
        } else {
            header("Location: inicio.php.php?error=El%20nombre%20o%20la%20contraseña%20son%20incorrectas");
            exit();
        }
    }
} else {
    header("Location: inicio.php.php?error=El%20nombre%20o%20la%20contraseña%20son%20incorrectas");
    exit();
}
?>
