<?php
if(!empty($_POST["btnmodificar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["contraseña"]) and !empty($_POST["correo"]) and !empty($_POST["rol"])){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $contraseña=$_POST["contraseña"];
        $correo=$_POST["correo"];
        $rol=$_POST["rol"];
        $consulta=$conexion->query("UPDATE tblusuarios SET Usuario='$nombre', Contraseña='$contraseña', Correo='$correo', Rol='$rol' WHERE Codigo='$id'");
        if($consulta==1){
            header("location:tbl_usuarios.php");
        }else{
            echo "Error al modificar el usuario";
        }
    }else{
        echo "campos vacios";
    }
}
    
?>