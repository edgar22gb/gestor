<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/profesores.php";
$profesores = new Profesores($_POST["clave_profesor"], $_POST["nombre_profesor"],$_POST["curp"],$_POST["direccion"],$_POST["telefono_celular"],$_POST["correo_electronico"], $_POST["id"]);

//var_dump($profesores);
$profesores->actualizarprofesor($_POST["id"]);

if($profesores->actualizarprofesor($_POST["id"]) == true){
	echo '<script>
	alert("Datos Actualizados Correctamente")
	location.href="../vista/mostrar_profesores.php"
	</script>';
}else{
	echo "<script>alert('Datos Actualizados incorrectamente')</script>";
}

//$profesores->actualizarprofesor();
//header("Location: mostrar_profesores.php");