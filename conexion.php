<?php
date_default_timezone_set('America/Argentina');
// Mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de conexión a la base de datos
$servername = "sql102.ezyro.com";
$username = "ezyro_37481443";
$dbname = "ezyro_37481443_base_de_datos";
$password = "8a4e5bcec97b1e";  // Asegúrate de que la contraseña sea la correcta

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Establecer la codificación de caracteres a UTF-8MB4
$conexion->set_charset("utf8mb4");


echo "Conexión exitosa";
?>
