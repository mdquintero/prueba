
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
<html>
<style>
        body {
            background-image: url('fondo_perfil.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
<head>
<link rel="Website Icon" type="png" href="logosolo.jpg">
    <title>Tabla de Usuarios</title>
</head>
<body>
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que deseas eliminar?");
            return respuesta
        }
    </script>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br>
    <div class="apartado"> 
    <?php


include "modelo/conexion.php";
include "controlador/eliminar_usuarios.php";

// Recuperar y mostrar los usuarios
$consulta = "SELECT u.Codigo, u.Correo, u.Usuario, u.Contraseña, r.Nombre FROM tblusuarios u JOIN tblroles r ON u.Rol = r.Codigo ";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Codigo</th><th>Usuario</th><th>Contraseña</th><th>Correo</th><th>Rol</th><th>Modificar</th><th>Eliminar</th></tr>";
    while ($datos = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $datos["Codigo"] . "</td>";
        echo "<td>" . $datos["Usuario"] . "</td>";
        echo "<td>" . $datos["Contraseña"] . "</td>";
        echo "<td>" . $datos["Correo"] . "</td>";
        echo "<td>" . $datos["Nombre"] . "</td>";
        echo "<td><a href='form_mod_usuario.php?id=" . $datos["Codigo"] . "'>Editar</a></td>";
        echo "<td><a onclick='return eliminar()' href='tbl_usuarios.php?id=" . $datos["Codigo"] . "'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron usuarios.";
}

$conexion->close();
?>
</div>
 <div class="button-container">
        <center><a href="registro.php">Registrar Nuevo</a></center>
    </div>
</div>
<?php

// Configura los encabezados HTTP para evitar el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
    
    <link rel="Website Icon" type="png" href="logosolo.jpg">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        document.addEventListener('click', function(event) {
  var dropdowns = document.getElementsByClassName('dropdown-content');
  var buttons = document.getElementsByClassName('dropbtn');
  var i;
  for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    var button = buttons[i];
    if (openDropdown.classList.contains('show') && event.target !== openDropdown && event.target !== button) {
      openDropdown.classList.remove('show');
    }
  }
});

document.getElementById('dropbtn').addEventListener('click', function() {
  document.getElementById('myDropdown').classList.toggle('show');
});

    </script>
</head>
<body>
<div class="">
    <!-- Reemplaza "tu-imagen.jpg" con la ruta de tu imagen -->
    <?php
    // Asegúrate de tener el campo "codigo" en la sesión y luego muéstralo
    if (isset($_SESSION['Codigo'])) {
        echo '<p>Codigo: ' . $_SESSION['Codigo'] . '</p>';
    }
    ?>

    <!-- Menú de despliegue (esquina superior derecha) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <div class="dropdown" style="position: absolute; top: 10px; right: 10px;">
    <button class="large material-icons">clear_all</button>
    <div id="myDropdown" class="dropdown-content">
        <ul>
            <!-- Botón para mostrar la información del perfil -->
            <button class="options">Información del Perfil</button>

            <!-- Script para mostrar/ocultar la información del usuario al hacer clic en el botón -->
            <script>
                document.querySelector('.options').addEventListener('click', function() {
                    var userInfo = document.getElementById('userInfo');
                    userInfo.style.display = (userInfo.style.display === 'none') ? 'block' : 'none';
                });
            </script>

            <!-- Enlace para cerrar sesión -->
            <a class="options" href="cerrar_sesion.php">Cerrar Sesión</a>
        </ul>
    </div>
</div>
</div>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div  class="sidebar">
<img class="logo" src="logosolo.jpg" alt="Logo de la empresa">
    <ul>
        <center><h2 input style="font-family: Felix Titling, sans-serif;">THE LEGAL SOLUTIONS SAS</h2></center>
       
        <br>
        <i class="material-icons">supervisor_account</i><a class="options" href="perfil.php">Inicio</a>
        <br>
        <i class="material-icons">supervisor_account</i><a class="options" href="tbl_usuarios.php">Tabla usuarios</a>
        <br>
        <i class="material-icons">find_in_page</i><a class="options" href="modificar.php">Empleados</a>
        <br>
        <i class="material-icons">folder_shared</i><a class="options" href="index3.php">Procesos Jurídicos</a>
        <br>
        </div>
    </ul>
</html>
