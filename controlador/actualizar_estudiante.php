
<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes.php";


$nombre_imagen=$_FILES["foto"]["name"];
	$temporal=$_FILES["foto"]["tmp_name"];
	$carpeta="../img";
	$ruta=$carpeta.'/'.$nombre_imagen;
	move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

$estudiantes = new Estudiantes($ruta,$_POST["matricula_estudiante"],$_POST["apellido_paterno"], $_POST["apellido_materno"],
$_POST["nombre_estudiante"],$_POST["edad"],$_POST["fecha_nacimiento"],$_POST["sexo"],
$_POST["estado_civil"],$_POST["curp"], $_POST["lugar_nacimiento"],$_POST["estado"],
$_POST["nacionalidad"],$_POST["calle"],$_POST["numero_exterior"],
$_POST["colonia"],$_POST["codigo_postal"],$_POST["municipio"],$_POST["ciudad"],$_POST["telefono_celular"],
$_POST["licenciatura_procedente"],$_POST["universidad_procedente"],
$_POST["maestria_solicitada"],$_POST["generacion"],$_POST["turno"],$_POST["grado"],$_POST["grupo"],
$_POST["semestre"],$_POST["id"]);

//var_dump($estudiantes);

// $estudiantes->actualizar($_POST["id"]);


if($estudiantes->actualizar($_POST["id"])==true)
{
    echo '<script>
	alert("Datos Actualizados Correctamente")
	location.href="../vista/mostrar_estudiantes.php"
	</script>';
}
else
{
	echo "<script>alert('Datos Actualizados incorrectamente')</script>";
}
?>

