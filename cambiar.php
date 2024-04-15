<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <title>Modificación</title>
</head>
<body>
<?php
include("conexion.php");

if (isset($_GET['Cedula']) && $_GET['Cedula'] !== "") {
    // Nos conectamos a la base de datos 
    $conn = mysqli_connect("localhost", "root", "", "tls");

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener la cédula de la URL
    $Cedula = mysqli_real_escape_string($conn, $_GET["Cedula"]);

    // Consulta SQL para obtener los datos existentes
    $consulta = "SELECT * FROM tblempleados WHERE Cedula='$Cedula'";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Mostrar los datos existentes en el formulario de modificación
        $datos = mysqli_fetch_assoc($resultado);
?>
        <h1>Modificación de Datos</h1>
        <form method="post" action="procesar_modificacion.php">
            <input type="hidden" name="Cedula" value="<?php echo $datos['Cedula']; ?>">
            <label for="FechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="FechaNacimiento" value="<?php echo $datos['FechaNacimiento']; ?>"><br>

            <label for="Nombres">Nombres:</label>
            <input type="text" name="Nombres" value="<?php echo $datos['Nombres']; ?>"><br>

            <label for="Apellidos">Apellidos:</label>
            <input type="text" name="Apellidos" value="<?php echo $datos['Apellidos']; ?>"><br>

            <label for="Direccion">Dirección:</label>
            <input type="text" name="Direccion" value="<?php echo $datos['Direccion']; ?>"><br>

            <label for="Telefono">Teléfono:</label>
            <input type="text" name="Telefono" value="<?php echo $datos['Telefono']; ?>"><br>

            <label for="NumeroTargetaProfesional">Número de Tarjeta Profesional:</label>
            <input type="text" name="NumeroTargetaProfesional" value="<?php echo $datos['NumeroTargetaProfesional']; ?>"><br>

            <input type="submit" name="submit" value="Guardar Cambios">
        </form>
<?php
    } else {
        echo "<p>No se enconntraron datos para la cédula proporcionada.</p>";
    }

    mysqli_close($conn);
} else {
    echo '<p>No se proporcionó una cédula válida en la URL.</p>';
}
?>
</body>
</html>