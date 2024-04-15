<?php
//seguridad de paginación
session_start();
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location:login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BIENVENIDO ASESOR</h1>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>