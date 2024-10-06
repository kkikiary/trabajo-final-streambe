<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - CATARSIS</title>
    <link rel="stylesheet" href="../styles/stylesesion.css">
</head>
<body>
    <section id="register" class="container">
        <div class="box">
            <h2>Inicio de sesión</h2>
            <form id="loginForm" action="login_logica.php" method="post">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ingrese su nombre de usuario">
                
                <label for="password">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required placeholder="Ingrese su contraseña">
                
                <button type="submit">Iniciar sesión</button>
                <div id="error-message" style="color: red;"></div>
            </form>
        </div>
    </section>

    <!-- Incluir el archivo script.js -->
    <script src="../script.js"></script>
</body>
</html>
