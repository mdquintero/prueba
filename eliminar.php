<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORRAR REGISTROS INSERTADOS</title>
</head>
<body>
    <h2>Eliminacion de registros</h2>
    <h3>Resultado de la operacion</h3>

    <?php
    include 'conexion.php';
    $cedula=$_GET['Cedula'];
    echo "Intenta borrar la cedula..." .$cedula;
    $consulta="DELETE FROM tblempleados WHERE cedula='$cedula'";

    if(mysqli_query($conn, $consulta)) {
        echo "... SE ELIMINO EL REGISTRO SATISFACTORIAMENTE";

    } else {
        echo"No se pudo eliminar el registro";
    }
    $conn ->close();
    echo '<p>Regresar a <a href="modificar.php">tabla</a></p>';

    ?>
</body>
</html>