<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Estudiantes.php";
$mensaje= "";
$randon=rand(0000,9999);
$matricula_estudiante= substr($_POST["curp"],0,4)."CUMMCE".$randon;

//$foto_estudiante=addcslashes(file_get_contents($_FILES["foto_estudiante"]["tmp_name"]));
//var_dump($matricula);

//$contenido_foto=addcslashes(file_get_contents($foto_estudiante));
//echo ($_FILES["foto"]["tmp_name"]);
//$foto=$_FILES["foto"]["name"];
/*$nombre_imagen=$_FILES["foto"]["name"];
$archivo=$_FILES["foto"]["tmp_name"];
$ruta="img";
$ruta=$ruta."/".$nombre_imagen;//img/foto1.jpg

move_uploaded_file($archivo,$ruta);

var_dump($ruta);
return;
*/
//$foto=$_FILES["foto"]["name"];


	
		if(empty($_POST["apellido_paterno"])=="" && empty($_POST["apellido_materno"])==""&& empty($_POST["edad"])==""&& empty($_POST["fecha_nacimiento"])==""
		&& empty($_POST["sexo"])==""&& empty($_POST["estado_civil"])==""&& empty($_POST["curp"])==""&& empty($_POST["lugar_nacimiento"])==""
		&& empty($_POST["lugar_nacimiento"])==""&& empty($_POST["estado"])==""&& empty($_POST["nacionalidad"])=="" && empty($_POST["calle"])==""
		&& empty($_POST["colonia"])=="" && empty($_POST["codigo_postal"])==""&& empty($_POST["municipio"])==""&& empty($_POST["ciudad"])==""
		&& empty($_POST["telefono_celular"])==""&& empty($_POST["licenciatura_procedente"])==""&& empty($_POST["universidad_procedente"])==""
		&& empty($_POST["maestria_solicitantada"])==""&& empty ($_POST["generacion"])==""&& empty($_POST["turno"])==""&& empty($_POST["grado"])==""
		&& empty($_POST["grupo"])==""&& empty($_POST["semestre"])==""&& empty($_POST["rol"])=="")
		{
			echo '<script>
				alert("Ingresa todos los campos")
				location.href="../vista/ficha_inscripción.php"
				</script>';
				return;
		}
		else
		{
			
	$nombre_imagen=$_FILES["foto"]["name"];
	$temporal=$_FILES["foto"]["tmp_name"];
	$carpeta="../img";
	$ruta=$carpeta.'/'.$nombre_imagen;
	move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);



$estudiantes = new Estudiantes($ruta,$matricula_estudiante,$_POST["apellido_paterno"],$_POST["apellido_materno"],$_POST["nombre_estudiante"],$_POST["edad"],$_POST["fecha_nacimiento"],$_POST["sexo"],
	$_POST["estado_civil"],$_POST["curp"],$_POST["lugar_nacimiento"],$_POST["estado"],$_POST["nacionalidad"],$_POST["calle"],$_POST["numero_exterior"],$_POST["colonia"],
	$_POST["codigo_postal"],$_POST["municipio"],$_POST["ciudad"],$_POST["telefono_celular"],$_POST["licenciatura_procedente"],$_POST["universidad_procedente"],
	$_POST["maestria_solicitada"],$_POST["generación"],$_POST["turno"],
	$_POST["grado"],$_POST["grupo"], $_POST["semestre"],$_POST["rol"]);

	
	
	

	if($estudiantes->guardar()==true)
	{
	echo '<script>
	alert("Datos ingresados Correctamente")
	location.href="../vista/mostrar_estudiantes.php"
	</script>';
	}


else
{
	echo '<script>alert
	("Datos insertados incorrectamente")
	location.href="vista/ficha_inscripcion.php"
	</script>';
	;
}
}
	




//var_dump($estudiantes);

//$estudiantes->guardar();
//header("Location: mostrar_estudiantes.php");
