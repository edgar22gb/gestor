<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Oficios.php";
$oficios = new Oficios($_POST["numero_folio"],$_POST["id_estudiante"],$_POST["descripcion"],$_POST["asunto"]);
$oficios->actualizarOficio($_POST["id"]);
var_dump($oficios);

if($oficios->actualizarOficio($_POST["id"])==true)
{
    echo '<script>
	alert("Datos Actualizados Correctamente")
	location.href="../vista/mostrar_oficios.php"
	</script>';
}
else
{
    echo "<script>alert('Datos Actualizados incorrectamente')</script>";
}
