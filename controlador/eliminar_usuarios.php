<?php
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $consulta=$conexion->query("DELETE FROM tblusuarios WHERE Codigo=$id");
    if($consulta==1){
        echo 'Persona eliminada correctamente';
    }else{
        echo 'Error al eliminar';
    }
}


?>