<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMBIO DE RESULTADO</title>
</head>
<body>
<h1 style="color: green; text-align:center;">CAMBIO DE DATOS POR REGISTRO</h1>

<?php
include 'funciones.php';
include 'conexionTls.php';

$Cedula=$_GET['Cedula'];


if ( isset($_GET['Cedula']) and $_GET['Cedula']<>"" ){

	$codigo = $_GET['Cedula'];

	// Nos conectamos:

		
        $consulta ="SELECT * FROM tblempleados WHERE Cedula ='$Cedula'";

		if ( $paquete = consultar($con, $consulta) ){
		
			// Aquí llamaremos a una función que muestre esos datos dentro de atributos value de un formulario
			$resultado = editar($paquete);
			echo $resultado;

		} else {

			echo "<p>No se encontraron datos</p>";
		
		}



} else {

	echo '<p>No se indico el registro que se desea modificar.</p>';

}

echo '<p>Regresar a <a href="modificar.php">listado</a></p>';



//


?>

<a href="formulario.php">IR A CONSULTAR</a>
</body>
</html>