<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles.css">
        <script src="https://kit.fontawesome.com/1ef8c95a1f.js" crossorigin="anonymous"></script>
        <title>Registro</title>
    </head>
    <body>
        <section>
            <form method="post" action="registro_logic.php">
                <div>
                    <h1>Registro</h1>
                    <div>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="nombre" name="nombre" id="nombre" required/>
                        </div>
                        <div>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" required/>
                        </div>
                        <div>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Confirmar Contraseña" name="Ccontraseña" id="pass" required/>
                        </div>
                        <div>
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" placeholder="Correo Electronico" name="correo" id="correo" required/>
                        </div>
                        <input type="submit" value="Registrarse" name="registrarse">
                    </div>
                </div>
            </form>
        </section>
    </body>
    </html>