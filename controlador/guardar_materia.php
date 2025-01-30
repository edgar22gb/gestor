<?php

include_once "../modelo/materias.php";
include_once "../conexionBD/conexion.php";
// $materias = array("materia" => $_POST["nombre_materia"], "semestre" => $_POST["semestre"]);
$materias = new Materias($_POST["clave_materia"],$_POST["nombre_materia"],$_POST["numero_creditos"],$_POST["semestre"]);

if($materias->guardar()==true)
{
        echo '<script>
	alert("Materia Ingresada Correctamente")
	location.href="../vista/mostrar_materias.php"
	</script>';
}
else
{
        echo "<script>alert('Datos Actualizados incorrectamente')</script>";

}
/*$materias->guardar();
header("Location: mostrar_materias.php");
*/