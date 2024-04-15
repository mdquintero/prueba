<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Captura</title>
    <style>
        body {
            background-image: url('fondo_perfil.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>
</head>
<body>
    <div class="container" id="empleados">
    <br><br>
    <center><h1>REGISTRO DE EMPLEADOS</h1></center>
    <form action="modificar.php" method="post">
        <ul>
            <tr>
                <center>Codigo</center>
                <td><input type="text" name="Doc" size="5"></td>
            </tr>
            <tr>
                <center>Fecha Nacimiento</center>
                <td><input type="date" name="Fecha_N" size="50"></td>
            </tr>
            <tr>
                <center>Nombres</center>
                <td><input type="text" name="Nom"></td>
            </tr>
            <tr>
                <center>Apellidos</center>
                <td><input type="text" name="Ape"></td>
            </tr>
            <tr>
                <center>Direccion</center>
                <td><input type="text" name="Dire"></td>
            </tr>
            <tr>
                <center>Telefono</center>
                <td><input type="text" name="Tel"></td>
            </tr>
            <tr>
                <center>Cargo</center>
                <td><input type="text" name="Car"></td>
            </tr>
            <tr>
                <center>Numero de Tarjeta Profesional</center>
                <td><input type="text" name="Ntp"></td>
            </tr>
            <tr>
                <center>Numero de documento</center>
                <td><input type="text" name="Ced"></td>
            </tr>
            <tr>
                <center>Usuario</center>
                <td><input type="text" name="Cod"></td>
            </tr>
            <tr>
                <br><br><br>
                <td colspan="2">
                    <input type="submit" value="REGISTRAR" name="crear">
                    <button><a href="modificar.php">MODIFICAR</a></button>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="reset" value="LIMPIAR">
                </td>
            </tr>
        </ul>
    </form>
    <br><br>
</div>
</body>
</html>