<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR</title>
    <style>
        body {
            background-image: url('fondo_perfil.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
</head>
<a id="btn-registrar-nuevo" href="empleados.php">Registrar Nuevo</a>
<div class="container" id="modificar">
    <?php
    include 'conexion.php';
    $consulta = "SELECT Cedula, FechaNacimiento, Nombres, Apellidos, Direccion, Telefono, Cargo, NumeroTargetaProfesional, Cedula, codigoUsuario FROM tblempleados";
    $registro = mysqli_query($conexion, $consulta) or die("Problemas en le select: " . mysqli_error($conn));
    ?>
    <div class="table-responsive" id modificacion>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>DOCUMENTO</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Nombres del Empleado</th>
                    <th>Apellidos del Empleado</th>
                    <th>Lugar</th>
                    <th>Numero Telefonico</th>
                    <th>Cargo</th>
                    <th>Tarjeta Profesional</th>
                    <th>Cedula</th>
                    <th>Codigo De Usuario</th>
                    <th>MODIFICA</th>
                    <th>ELIMINA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($reg = mysqli_fetch_array($registro)) {
                    echo '<tr>
                            <td>' . $reg['Cedula'] . '</td>
                            <td>' . $reg['FechaNacimiento'] . '</td>
                            <td>' . $reg['Nombres'] . '</td>
                            <td>' . $reg['Apellidos'] . '</td>
                            <td>' . $reg['Direccion'] . '</td>
                            <td>' . $reg['Telefono'] . '</td>
                            <td>' . $reg['Cargo'] . '</td>
                            <td>' . $reg['NumeroTargetaProfesional'] . '</td>
                            <td>' . $reg['Cedula'] . '</td>
                            <td>' . $reg['codigoUsuario'] . '</td>
                            <td> <a href="cambiar.php?Cedula=' . $reg['Cedula'] . '" class="btn btn-warning btn-sm">Modificar</a> </td>
                            <td> <a href="eliminar.php?Cedula=' . $reg['Cedula'] . '" class="btn btn-danger btn-sm">Eliminar</a> </td> 
                        </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <div class="sidebar">
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
    </div>
</div>
</body>
</html>
