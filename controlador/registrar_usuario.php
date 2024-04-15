<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST['Codigo']) and !empty($_POST['Correo']) and !empty($_POST['Usuario']) and !empty($_POST['Contraseña']) and !empty($_POST['Rol'])) {
        $codigo = $_POST["Codigo"];
        $correo = $_POST["Correo"];
        $usuario = $_POST["Usuario"];
        $contraseña = $_POST["Contraseña"];
        $rol = $_POST["Rol"];

        $consulta = $conexion->query("INSERT INTO tblusuarios(Codigo,Correo,Usuario,Contraseña,Rol) VALUES('$codigo','$correo','$usuario','$contraseña','$rol') ");
        if ($consulta == 1) {
            echo "<script type=\"text/javascript\">
                    alert('Usuario registrado exitosamente');
                    window.location.href = 'registro.php'; // Redirige a la página de registro
                 </script>";
        } else {
            echo "<script type=\"text/javascript\">
                    alert('Usuario NO registrado');
                    window.location.href = 'registro.php'; // Redirige a la página de registro
                 </script>";
        }
    } else {
        echo "<script type=\"text/javascript\">
                alert('Error al registrar');
                window.location.href = 'registro.php'; // Redirige a la página de registro
             </script>";
    }
}

?>
