    <?php
  session_start();
?>
<!DOCTYPE html >
<html lang="es">
<head>
<link rel="Website Icon" type="png" href="logosolo.jpg">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('fondo_I.png');
            /* Ajusta la imagen de fondo al tamaño de la pantalla */
            background-size: cover; 
            background-position: center;
        }
    </style>
</head>
<body>
    <center>
<div class="inicio">
    <img src="logo2.png" alt="Logo de tu sitio" class="logo5">
    <h2 style="font-family: Felix Titling, sans-serif; ">Inicio De Sesión</h2>
    
<!-- inicio del formulario -->
    <form action="validar.php" method="post">
        
        <center><label for="nombre" class="color-blanco" >Usuario</label></center>
        <center><input type="text" name="usuario" required><br><br></center>
        <center><label for="password" class="color-blanco">Contraseña</label></center>
        <center><input type="password" name="contraseña" required><br><br></center>
        <br>
        <center><button class="button"><span>Iniciar Sesión</span></button></center>

    </form>
    <br>
    <u><a href="#">¿Olvidaste la contraseña?</a></u>
    </center>
</div> 
</body>
</html>
