<?php
$conexion= new mysqli('localhost','root','','miniproyecto');
if($conexion){
    // echo "conectado";
}else {
    echo "error de conexion";
}
?>