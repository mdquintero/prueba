<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="Website Icon" type="png" href="logosolo.jpg">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            background-image: url('fondo_perfil.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
</head>
<body>
<center><div class="container" id="registro">
<h2 style="font-family: Felix Titling, sans-serif; ">REGISTRO DE Usuarios</h2>
<?php
        include "modelo/conexion.php";
        include "controlador/registrar_usuario.php";
        ?>
    <form  method="post">
        <label for="codigo">Código de usuario</label>
        <input type="text" name="Codigo"><br><br>

        <label for="nombre">Nombre de usuario</label>
        <input type="text" name="Usuario"><br><br>

        <label for="password">Contraseña</label>
        <input type="password" name="Contraseña"><br><br>

        <label for="correo">Correo electrónico</label>
        <input type="email" name="Correo"><br><br>

        <label for="rol">Rol</label>
        <input type="text" name="Rol"><br><br>

        <input type="submit" value="Registrar" name="btnregistrar">
    </form>
    <a href="tbl_usuarios.php">Volver a usuarios</a>
</div></center>
</body>
</html>
