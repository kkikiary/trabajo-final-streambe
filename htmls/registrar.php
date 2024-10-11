<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - CATARSIS</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <section id="register" class="container">
        <div class="box">
            <h2>Registro</h2>
            <form action="registro_logic.php" method="post">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ingrese su nombre de usuario">
                
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required placeholder="Ingrese su correo electrónico">
                
                <label for="password">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required placeholder="Ingrese su contraseña">
                
                <label for="confirm-password">Confirmar Contraseña:</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirme su contraseña">

                <button type="submit">Registrarse</button>
            </form>
        </div>
    </section>
</body>
</html>
