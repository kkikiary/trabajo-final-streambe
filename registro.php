<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Registro</title>
    </head>
    <body>
        <section>
            <form method="post" action="registrouC.php">
                <div class="FormIC">
                    <h1>Registro</h1>
                    <div class="eor-container">
                        <div class="usuario">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Usuario" name="Usuario" id="nombre" required/>
                        </div>
                        <div class="usuario">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Contraseña" name="Clave" id="contraseña" required/>
                        </div>
                        <div class="usuario">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" placeholder="Confirmar Contraseña" name="RClave" id="pass" required/>
                        </div>
                        <div class="usuario">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" placeholder="Correo Electronico" name="Correo" id="correo" required/>
                        </div>
                        <input type="submit" class="boton" id="registro-btn" value="Registrarse" name="registrarse">
                    </div>
                </div>
            </form>
        </section>
    </body>
    </html>