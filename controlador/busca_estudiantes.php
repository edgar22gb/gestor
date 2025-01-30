<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Estudiantes.php";


if(!isset($_GET["enviar"]))
{
    $busqueda=$_GET["busqueda"];
    if(isset($_GET["busqueda"]))
    {
        $where="WHERE estudiantes.nombre_estudiante LIKE'%".$busqueda."%' OR apellido_paterno LIKE '%".$busqueda."%'
        OR matricula_estudiante LIKE '%".$busqueda."%'";
    }
}
?>

