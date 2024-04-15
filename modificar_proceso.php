<?php
include "conexion.php";
$cod=$_GET["id"];

$sql=$conn->query("SELECT * FROM tblprocesosjuridicos WHERE NumeroProceso=$cod");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form class="col-4 p-3 m-auto" method="POST">
<h5 class="text-center alert alert-primary">Modificar proceso juridico</h5>
<input type="hidden" name="id" value="<?=$_GET["id"]?>">
<?php
    include "modificar_proceso1.php";
   while($datos=$sql->fetch_object()) { ?>
    <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Fecha de inicio de proceso</label>
    <input type="date" class="form-control" name="fechaIni" value="<?= $datos->FechaInicio ?>">
      </div>
    <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Fecha de cierre de proceso</label>
    <input type="date" class="form-control" name="fechaFin" value="<?= $datos->FechaFin ?>">
      </div>
    <div class="mb-1">
    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
    <input type="textarea" class="form-control" name="descripcion" value="<?= $datos->Descripcion ?>">
      </div>
<?php }
?>

<button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar proceso</button>
</form>
</body>
</html>