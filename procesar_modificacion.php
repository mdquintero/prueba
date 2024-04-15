<?php
include("conexion.php");

if (isset($_POST['Cedula'], $_POST['FechaNacimiento'], $_POST['Nombres'], $_POST['Apellidos'], $_POST['Direccion'], $_POST['Telefono'], $_POST['NumeroTargetaProfesional'])) {
    // Nos conectamos a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "tls_v6");

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Escapar y obtener los datos del formulario
    $Cedula = mysqli_real_escape_string($conn, $_POST["Cedula"]);
    $FechaNacimiento = mysqli_real_escape_string($conn, $_POST["FechaNacimiento"]);
    $Nombres = mysqli_real_escape_string($conn, $_POST["Nombres"]);
    $Apellidos = mysqli_real_escape_string($conn, $_POST["Apellidos"]);
    $Direccion = mysqli_real_escape_string($conn, $_POST["Direccion"]);
    $Telefono = mysqli_real_escape_string($conn, $_POST["Telefono"]);
    $NumeroTargetaProfesional = mysqli_real_escape_string($conn, $_POST["NumeroTargetaProfesional"]);

    // Consulta SQL para actualizar el registro
    $consulta = "UPDATE tblempleados SET FechaNacimiento='$FechaNacimiento', Nombres='$Nombres', Apellidos='$Apellidos', Direccion='$Direccion', Telefono='$Telefono', NumeroTargetaProfesional='$NumeroTargetaProfesional' WHERE Cedula ='$Cedula'";

    if (mysqli_query($conn, $consulta)) {
        echo "<p>Registro actualizado.</p>";
    } else {
        echo "<p>No se pudo actualizar. Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
} else {
    echo '<p>No se indicó el registro que se desea modificar.</p>';
}

echo '<p>Regresar a <a href="modificar.php">listado</a></p>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    
</body>
</html>
