<?php


$conexion=mysqli_connect("localhost","root","","tls");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>