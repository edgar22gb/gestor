<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Estudiantes.php";
$estudiantes=new Estudiantes(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null);
if($estudiantes->eliminar($_GET["id"])==true)
{
    echo '<script>
	alert("Estudiante eliminados Correctamente")
	location.href="../vista/mostrar_estudiantes.php"
	</script>';
}
else
{
    echo "<script>alert('El dato no se puede eliminar')</script>";
}
//Estudiantes::eliminar($_GET["id"]);
//header("Location: ../vista/mostrar_estudiantes.php");