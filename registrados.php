<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adición</title>
</head>
<body>
    <center><h2>*** EMPLEADOS REGISTRADOS ***</h2></center>

    <?php
    include 'conexion.php';

    if(isset($_POST['crear'])){
        $doc = mysqli_real_escape_string($conexion, $_REQUEST['Doc']);
        $fechaNacimiento = mysqli_real_escape_string($conexion, $_REQUEST['Fecha_N']);
        $nombres = mysqli_real_escape_string($conexion, $_REQUEST['Nom']);
        $apellidos = mysqli_real_escape_string($conexion, $_REQUEST['Ape']);
        $direccion = mysqli_real_escape_string($conexion, $_REQUEST['Dire']);
        $telefono = mysqli_real_escape_string($conexion, $_REQUEST['Tel']);
        $cargo = mysqli_real_escape_string($conexion, $_REQUEST['Car']);
        $numeroTarjetaProfesional = mysqli_real_escape_string($conexion, $_REQUEST['Ntp']);
        $cedula = mysqli_real_escape_string($conexion, $_REQUEST['Ced']);
        $codigoUsuario = mysqli_real_escape_string($conexion, $_REQUEST['Cod']);
        $sql = "INSERT INTO tblempleados (Codigo, Nombres, Apellidos, FechaNacimiento, Direccion, Telefono, Cargo, NumeroTargetaProfesional, Cedula, codigoUsuario) 
        VALUES ('$doc', '$nombres', '$apellidos','$fechaNacimiento', '$direccion', '$telefono', '$cargo', '$numeroTarjetaProfesional', '$cedula', '$codigoUsuario')";

        if(mysqli_query($conexion, $sql)) {
            echo "Registro Insertado Satisfactoriamente";
        } else {
            echo "E R R O R " . $sql . " " . mysqli_error($conexion);
        }

        $conexion->close();
    }
    
    if(isset($_POST['MOSTRAR'])){
        $consulta = "SELECT Codigo, FechaNacimiento, Nombres, Apellidos, Direccion, Telefono, NumeroTargetaProfesional, Cedula, codigoUsuario FROM tblempleados";
        $registros = mysqli_query($conexion, $consulta) or 
        die("Problemas en el select: " . mysqli_error($conexion));

        while($reg=mysqli_fetch_array($registros)) {
            echo "DOCUMENTO: " . $reg['Cedula'] . "<br>";
            echo "Fecha de Nacimiento: " . $reg['FechaNacimiento'] . "<br>";
            echo "Nombres del Empleado: " . $reg['Nombres'] . "<br>";
            echo "Apellidos del Empleado: " . $reg['Apellidos'] . "<br>";
            echo "Lugar: " . $reg['Direccion'] . "<br>";
            echo "Numero Telefonico: " . $reg['Telefono'] . "<br>";
            echo "Tarjeta Profesional: " . $reg['NumeroTargetaProfesional'] . "<br>";
            echo "<hr>";
        } 
    }
    echo '<p>Regresar a <a href="modificar.php">tabla</a></p>';
    ?>
    
</body>
</html>
