<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../img/Logo2.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/1ef8c95a1f.js" crossorigin="anonymous"></script>
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div>
        <form method="post" action="login_logica.php" >
            <div>
                <h1> INICIO DE SESION </h1>
            </div>
                    <div>
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre" id="nombre" value="" required/>
                    </div>
                    <div>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="contraseña" placeholder="Contraseña" id="pass" value="" required/>
                    </div>
                    <div>
                        <input type="submit" name="registrarU" value="INICIAR SESION">
                    </div>
                </form>
            </div> 
</body>
</html>