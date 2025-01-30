<?php
include_once "conexion.php";
include_once "Profesores.php";
$profesores = new Profesores(null,null,null,null,null,null);



if($profesores->eliminarProfesor($_GET["id"])==true)
{
    echo '<script>
	alert("Datos eliminados Correctamente")
	location.href="vista/mostrar_profesores.php"
	</script>';
}
else
{
    echo "<script>alert('El dato no se puede eliminar')</script>";
}

//Materias::eliminar($_GET["id"]);
//header("Location:vista/mostrar_materias.php");
?>