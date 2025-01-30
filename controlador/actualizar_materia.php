<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Materias.php";
$materias = new Materias($_POST["clave_materia"],$_POST["nombre_materia"],$_POST["numero_creditos"],$_POST["semestre"],$_POST["id"]);
$materias->actualizar($_POST["id"]);

if($materias->actualizar($_POST["id"])==true)
{
    echo '<script>
	alert("Datos Actualizados Correctamente")
	location.href="../vista/mostrar_materias.php"
	</script>';
}
else
{
    echo "<script>alert('Datos Actualizados incorrectamente')</script>";
}

