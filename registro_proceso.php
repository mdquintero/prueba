<?php
if(!empty($_POST["btnregistrar"])) {
    if(!empty($_POST["numero"]) and !empty($_POST["fechaIni"]) and !empty($_POST["fechaFin"]) and !empty($_POST["descripcion"]) ) {
    $numero=$_POST["numero"];
    $fechaIni=$_POST["fechaIni"];
    $fechaFin=$_POST["fechaFin"];
    $descripcion=$_POST["descripcion"];

    $sql=$conn->query("INSERT INTO tblprocesosjuridicos(Numeroproceso,FechaInicio,FechaFin,Descripcion)
    VALUES('$numero','$fechaIni','$fechaFin','$descripcion')");
    if($sql==1){
        echo '<div class="alert alert-success">Proceso registrado correctamente</div>';
    } else{
        echo '<div class="alert alert-danger">Error al registrar el proceso</div>';
    }
    } else{
        echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
    }
}
?>