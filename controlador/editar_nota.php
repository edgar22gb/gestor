<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes/edita_nota.php";
$notaestudiante=new EditaNotaAlumno($_POST["id_materia"],$_POST["nota_materia"]);
//var_dump($notaestudiante);
$notaresul=$notaestudiante->editar_nota();

if ($notaresul==true)
{
	//var_dump ($_POST["nota_materia"]);
//	var_dump($_POST["id_estudiante"]);

  echo '<script>
	alert("Datos Actualizados Correctamente")
	location.href="../vista/mostrar_estudiantes.php"
	</script>';

}
else
{
	echo "error";
}
?>
