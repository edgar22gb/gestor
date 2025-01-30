<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/asigna_materias.php";
include_once "../modelo/estudiantes.php";
include_once "../modelo/semestres.php";
include_once  "../modelo/materias.php";
include_once  "../modelo/profesores.php";
include_once "../modelo/asigna_notas.php";


$materias=$_POST["id_asignarnota"];
$asigna_notasmateria = new AsignaNotas($_POST["nombre_estudiante"],$_POST["nombre_profesor"],$_POST["Semestre"],$materias,$_POST["nota_materia"]);
//var_dump($asigna_notasmateria);
//var_dump($asigna_materias);
//var_dump($nombre_estudiante);
;


if($asigna_notasmateria->guardar_nota() == true){
	echo '<script>
	alert("Datos insertados correctamente")
	location.href="../vista/mostrar_materias.php"
	</script>';
}else{
	echo "<script>alert('Datos insertados incorrectamente')</script>";
}
