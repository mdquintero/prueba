<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <style>
        body {
            background-image: url('fondo.jpg'); /* Cambia 'fondo.jpg' por la ruta de tu imagen de fondo */
            background-size: cover;
            background-attachment: fixed;
            color: black;
            font-family: Arial, sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto;
            width: 80%;
            text-align: center;
        }

        h1 {
            color: #000000; /* Amarillo */
        }

        p {
            font-size: 18px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFD700;
            color: black;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        a:hover {
            background-color: #FFA500; /* Amarillo más claro al pasar el mouse */
        }
    </style>
</head>
<body>
<div class="container">
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

    $id = $_GET["id"];

    // Eliminar el usuario
    $sql = "DELETE FROM tbl_usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Usuario eliminado con éxito.</h1>";
    } else {
        echo "<h1>Error al eliminar usuario:</h1><p>" . $conn->error . "</p>";
    }

    $conn->close();
    ?>
    <a href="tbl_usuarios.php">Volver a la tabla</a>
</div>
</body>
</html>
