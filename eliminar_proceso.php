<?php

if(!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conn->query("DELETE FROM tblprocesosjuridicos where NumeroProceso='$id'");
    if ($sql==1){
        echo "<div class='alert alert-success'>Registro eliminado correctamente</div>";
    } else{
        echo "<div class='alert alert-danger'>Error al eliminar el registro</div>";
    }
}

?>