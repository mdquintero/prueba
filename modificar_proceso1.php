<?php
if(!empty($_POST["btnmodificar"])){
    if(!empty($_POST["fechaIni"]) and !empty($_POST["fechaFin"]) and !empty($_POST["descripcion"])){

    $id=$_POST["id"];
    $fechaIni=$_POST["fechaIni"];
    $fechaFin=$_POST["fechaFin"];
    $descripcion=$_POST["descripcion"];
    $sql=$conn->query("UPDATE tblprocesosjuridicos SET FechaInicio='$fechaIni', FechaFin='$fechaFin', Descripcion='$descripcion' where NumeroProceso='$id' ");
        if($sql==1){
            header("location:index3.php");
        }else{
            echo "<div class='alert alert-danger'>Error al modificar el proceso</div>";
        }

    } else{
        echo "<div class='alert alert-warning'>Hay campos vacios</div>";
    }


}

?>