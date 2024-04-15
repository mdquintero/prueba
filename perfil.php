<?php
//seguridad de paginación
session_start();
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location:login.php");
    die();
}

// Configura los encabezados HTTP para evitar el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
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



<div id="">
    <?php

    
    // La verificación de sesión ya se ha realizado al comienzo del archivo
    // Si llegamos aquí, significa que el usuario ha iniciado sesión correctamente
    echo '<h2 id=bienvenida>¡Bienvenido! ' . $_SESSION['usuario'] . '</h2>';
    ?>

    <?php
    // Asegúrate de tener el campo "codigo_empresa" en la sesión y luego muéstralo
    if (isset($_SESSION['Codigo'])) {
        echo '<p>Codigo: ' . $_SESSION['Codigo'] . '</p>';
    }
    ?>

    <!-- Menú de despliegue (esquina superior derecha) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <div class="dropdown" style="position: absolute; top: 80px; right: 35px;">
        <button class="large material-icons">clear_all</button>
        <div id="myDropdown" class="dropdown-content">
            <ul>
                <!-- Agrega un botón para mostrar la información del perfil -->
                <li><button class="options" style="color: black;">Información del Perfil</button></li>

                <!-- Agrega un script para mostrar/ocultar la información del usuario al hacer clic en el botón -->
                <script>
                    document.querySelector('.options').addEventListener('click', function() {
                        var userInfo = document.getElementById('userInfo');
                        if (userInfo.style.display === 'none') {
                            userInfo.style.display = 'block';
                        } else {
                            userInfo.style.display = 'none';
                        }
                    });
                </script>

                <li><a class="options" href="cerrar_sesion.php">Cerrar Sesión</a></li>
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
        
    </ul>
</div>
