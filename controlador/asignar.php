<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Asigna_materias.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/Semestres.php";
include_once  "../modelo/materias.php";
include_once  "../modelo/Profesores.php";


$materias=$_POST["id_asignar"];
$asigna_materias = new AsignaMaterias($_POST["id_estudiante"],$_POST["id_profesor"],$materias,$_POST["id_semestre"]);
//var_dump($asigna_materias);
// var_dump($asigna_materias);
//var_dump($asigna_materias);
//var_dump($nombre_estudiante);



if($asigna_materias->guardar() == true){
	echo '<script>
	alert("Datos insertados correctamente")
	location.href=" ../vista/mostrar_materias.php"
	</script>';
}else{
	echo "<script>alert('Datos insertados incorrectamente')</script>";
}
