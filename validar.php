<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

session_start();
$_SESSION['usuario']=$usuario;




$conexion=mysqli_connect("localhost","root","","tls");

$consulta="SELECT * FROM tblusuarios where Usuario='$usuario' and Contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);
//  $_SESSION['Usuario'] = $filas['Usuario'];

if($filas['Rol']==1){ //administrador
    header("location:perfil.php");
} elseif($filas['Rol']==2){ //coordinador
    header("location:homeCoord.php");
}
elseif($filas['Rol']==3){ //abogado
    header("location:homeAbo.php");
}
elseif($filas['Rol']==4){ //Secretario
    header("location:homeSec.php");
}
elseif($filas['Rol']==5){ //asesor
    header("location:homeAse.php");
}
else 
{
    header("location:login.php"); 
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>