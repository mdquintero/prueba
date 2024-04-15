<?php
session_start();

include 'conexion.php';

// Verifica si el usuario ha cerrado sesión
if (!isset($_SESSION['nombre'])) {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit;
}

// Verifica si se ha pasado un ID válido por la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos del usuario a modificar
    $consulta_usuario = "SELECT codigo_empresa, name, Correo, telefono FROM tbl_usuarios WHERE id = ?";
    $stmt_usuario = $conn->prepare($consulta_usuario);
    $stmt_usuario->bind_param("i", $id);
    $stmt_usuario->execute();
    $result_usuario = $stmt_usuario->get_result();

    if ($result_usuario->num_rows == 1) {
        $row_usuario = $result_usuario->fetch_assoc();
        $codigo_empresa = $row_usuario['codigo_empresa'];
        $nombre = $row_usuario['name'];
        $correo = $row_usuario['Correo'];
        $telefono = $row_usuario['telefono'];
    } else {
        echo "No se encontró un usuario con el ID proporcionado. <a href='perfil.php'>Volver al perfil</a>";
        exit;
    }
} else {
    echo "ID de usuario no válido. <a href='perfil.php'>Volver al perfil</a>";
    exit;
}

// Verifica si se han enviado los datos del formulario de modificación
if (isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_password = $_POST['password'];
    $nuevo_correo = $_POST['correo'];
    $nuevo_telefono = $_POST['telefono'];

    // Realiza la lógica para actualizar el usuario en la base de datos
    $consulta_modificar = "UPDATE tbl_usuarios SET name = ?, password = ?, Correo = ?, telefono = ? WHERE id = ?";
    $stmt_modificar = $conn->prepare($consulta_modificar);
    $stmt_modificar->bind_param("ssssi", $nuevo_nombre, $nuevo_password, $nuevo_correo, $nuevo_telefono, $id);
    $stmt_modificar->execute();

    // Redirige de nuevo a la página de perfil después de modificar
    header("Location: tbl_usuarios.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Modificar Usuario</h2>
        <form action="modificar_usuario.php?id=<?php echo $id; ?>" method="post">
            <label for="codigo_empresa">Código de Empresa:</label>
            <input type="text" name="codigo_empresa" value="<?php echo $codigo_empresa; ?>" readonly><br><br>

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required><br><br>

            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" value="<?php echo $correo; ?>" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo $telefono; ?>" required><br><br>

            <input type="submit" value="Guardar Cambios">
        </form>
      
        <a href="tbl_usuarios.php">Volver a la tabla</a>
    </div>
</body>
</html>
