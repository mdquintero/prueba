<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>

<?php
// Conexión a la base de datos (necesitas proporcionar la información correcta)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdtls";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    
    // Recuperar los datos del usuario
    $sql = "SELECT id, codigo_empresa, name, Correo, telefono FROM tbl_usuarios WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codigo_empresa = $row["codigo_empresa"];
        $name = $row["name"];
        $Correo = $row["Correo"];
        $telefono = $row["telefono"];
    } else {
        echo "Usuario no encontrado.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $codigo_empresa = $_POST["codigo_empresa"];
    $name = $_POST["name"];
    $Correo = $_POST["Correo"];
    $telefono = $_POST["telefono"];
    
    // Actualizar los datos del usuario
    $sql = "UPDATE tbl_usuarios SET codigo_empresa = $codigo_empresa, name = '$name', Correo = '$Correo', telefono = $telefono WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar usuario: " . $conn->error;
    }
}
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Código de Empresa: <input type="text" name="codigo_empresa" value="<?php echo $codigo_empresa; ?>"><br>
    Nombre: <input type="text" name="name" value="<?php echo $name; ?>"><br>
    Correo: <input type="text" name="Correo" value="<?php echo $Correo; ?>"><br>
    Teléfono: <input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>
    <input type="submit" value="Guardar Cambios">
</form>

</body>
</html>
