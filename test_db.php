<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cambia los valores según tu configuración en ProFreeHost
$servername = "127.0.0.1"; // O intenta con "localhost"
$username = "ezyro_37481443"; // O "ezyro_37481443@localhost"
$password = ""; // Deja vacío si no hay contraseña
$dbname = "ezyro_37481443_base_de_datos"; // Nombre de tu base de datos

// Crear conexión
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
echo "Conectado exitosamente a la base de datos: $dbname";
?>
