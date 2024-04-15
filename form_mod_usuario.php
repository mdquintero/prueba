<?php
include "modelo/conexion.php";
$id=$_GET["id"];
$consulta=$conexion->query("SELECT * FROM tblusuarios WHERE Codigo=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container" id="modificar_usuario">
        <h2>Modificar Usuario</h2>
        <form  method="post">
            <?php
            include "controlador/modificar_usuarios.php";
            while($datos=$consulta->fetch_assoc()){?>
            <input type="hidden" name="id" value="<?=$_GET["id"] ?>">
                <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?=$datos["Usuario"] ?>" ><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="contraseña" ><br><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" value="<?=$datos["Correo"] ?>" ><br><br>

            <label for="rol">Rol:</label>
            <input type="text" name="rol" value="<?=$datos["Rol"] ?>" ><br><br>

            <input type="submit" value="Guardar Cambios" name="btnmodificar">
        </form>
      
        <a href="tbl_usuarios.php">Volver a la tabla</a>
    </div>
            <?php }  
            ?>
            
</body>
</html>