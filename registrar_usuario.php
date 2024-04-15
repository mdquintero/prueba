<?php
session_start();

include 'conexion.php';

$nombre = $_POST['nombre'];
$password = $_POST['password'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$codigo_empresa = $_POST['codigo_empresa']; // Obtener el valor de "codigo_empresa"

$stmt = $conn->prepare("INSERT INTO tbl_usuarios (codigo_codigo_empresa, name, password, Correo, telefono) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("isssi", $codigo_empresa, $nombre, $password, $correo, $telefono);

if ($stmt->execute()) {
    // Registro exitoso, ahora vamos a obtener los datos del usuario registrado
    $stmt->close();

    // Consulta para obtener los datos recién registrados
    $consulta = "SELECT Correo, telefono FROM tbl_usuarios WHERE name = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo'] = $row['Correo'];
        $_SESSION['telefono'] = $row['telefono'];
        header("Location: perfil.php");
    } else {
        echo "Error al obtener los datos del usuario registrado. <a href='registro.php'>Volver al registro</a>";
    }
} else {
    echo "Error al registrar. <a href='registro.php'>Volver al registro</a>";
}

$stmt->close();
$conn->close();
?>
