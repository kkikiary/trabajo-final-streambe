<?php
session_start();
var_dump($_SESSION);
var_dump($id_publicacion, $contenido, $id);


// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    die("Error: Usuario no autenticado.");
}


// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'base_de_datos');

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si se han enviado los datos necesarios
if (isset($_POST['id_publicacion']) && isset($_POST['contenido']) && isset($_POST['id_categoria'])) {
    $id_publicacion = $_POST['id_publicacion'];
    $contenido = $_POST['contenido'];
    $id_categoria = $_POST['id_categoria'];

    // Insertar la respuesta en la base de datos
    $sql = "INSERT INTO respuestas (id_publicacion, contenido, id_usuario, fecha) 
            VALUES ('$id_publicacion', '$contenido', '$id', NOW())";
}
    if ($conn->query($sql) === TRUE) {
        echo "Respuesta insertada correctamente";
        header("Location: ../htmls/foro.php?id_categoria=$id_categoria");
        exit();
    } else {
        echo "Error al insertar la respuesta: " . $conn->error;
    }

// Cerrar conexión
$conn->close();
?>
