<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/profesores.php";
$randon=rand(0000,9999);
$clave_profesor= substr($_POST["curp"],0,4)."CUMMCE".$randon;
$profesores = new Profesores($clave_profesor,$_POST["nombre_profesor"],
$_POST["curp"],$_POST["direccion"],
$_POST["telefono_celular"],$_POST["correo_electronico"],$_POST["rol"]);

//var_dump($profesores);

if($profesores->guardar_profesor()==true)
{
    echo '<script>
	alert("Datos insertados correctamente")
	location.href="../vista/mostrar_profesores.php"
	</script>';
}
else{
    echo "<script>alert('Datos insertados incorrectamente')</script>";
}

