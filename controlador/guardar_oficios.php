<?php

include_once "../modelo/oficios.php";
include_once "../conexionBD/conexion.php";
// $materias = array("materia" => $_POST["nombre_materia"], "semestre" => $_POST["semestre"]);
$oficios = new Oficios ($_POST["numero_folio"],intval($_POST["id_estudiante"]),$_POST["descripcion"],$_POST["asunto"]);
//var_dump ($oficios);
if($oficios->guardar_oficio()==true)
{
        echo '<script>
	alert("Oficio Ingresado Correctamente")
	location.href="../vista/mostrar_oficios.php"
	</script>';
}
else
{
        echo "<script>alert('Datos Ingresados incorrectamente')</script>";

}
/*$materias->guardar();
header("Location: mostrar_materias.php");
*/