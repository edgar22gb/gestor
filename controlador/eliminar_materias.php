<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Materias.php";
$materias = new Materias(null,null,null);



if($materias->eliminar($_GET["id"])==true)
{
    echo '<script>
	alert("Datos eliminados Correctamente")
	location.href="../vista/mostrar_materias.php"
	</script>';
}
else
{
    echo "<script>alert('Datos Actualizados incorrectamente')</script>";
}

//Materias::eliminar($_GET["id"]);
//header("Location:vista/mostrar_materias.php");
?>