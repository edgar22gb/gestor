<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/roles.php";
// session_start();


$matricula=$_POST["matricula"];
$rol=$_POST["rol"];

global $mysqli;

//nuevo metodo de inicio de sesion
$consulta_admin=$mysqli->query("SELECT *FROM usuarios where clave_usuario='$matricula' and rol='$rol'");

$fila=mysqli_fetch_array($consulta_admin);
if($fila["rol"]==1)
{
  session_start();
  $_SESSION["autenticado"]=true;
  $_SESSION["nombre"]=$fila[1];
   header("Location:../index2.php");
}
else
$consulta_estudiante=$mysqli->query("SELECT * FROM estudiantes WHERE matricula_estudiante ='$matricula'  and rol = '$rol'");
 $fila=mysqli_fetch_array($consulta_estudiante);
if($fila['rol']==2)
{
  session_start();
  $_SESSION["autenticado"]=true;
  $_SESSION["matricula"]=$fila[2];
  $_SESSION["id"]=$fila[0];
  $_SESSION["estudiante"]=array("ap"=>$fila[3],"am"=>$fila[4],"nom"=>$fila[5],"maes"=>$fila[23]);
  //$_SESSION["asignamateria"]=array("nomMat"=>$fila[1]);
   header("Location: ../vista/estudiantes/index.php");
}
else
$consulta_profesor=$mysqli->query("SELECT * FROM profesores WHERE clave_profesor ='$matricula'  and rol = '$rol'");
$fila=mysqli_fetch_array($consulta_profesor);
 if($fila['rol']==3)
{
  session_start();
  $_SESSION["autenticado"]=true;
  $_SESSION["clave_profesor"]=$fila[1];
  $_SESSION["id"]=$fila[0];
  $_SESSION["profesor"]=array("nomp"=>$fila[2]);
   header("Location:../vista/profesores/index.php");
}
else
{
   echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../sesiones/index.php' </script>";

}

/*$nr=mysqli_num_rows($consulta_estudiante);
  if($rol==1)
  {
    $consulta_admin=$mysqli->query("SELECT *FROM usuarios where clave_usuario='$matricula' and rol='$rol'");
    if($resultado=$consulta_admin)
    {
      while ($fila=$resultado->fetch_row())
      {
        session_start();
        $_SESSION["autenticado"]=true;
        $_SESSION["nombre"]=$fila[2];
        header("Location:../index2.php");
      }
      $resultado->close();
    }

    else
    {
      echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../sesiones/index.php' </script>";
    }
  }
  

  else if($rol==2)
  {
 
    $consulta_estudiante=$mysqli->query("SELECT * FROM estudiantes WHERE matricula_estudiante ='$matricula'  and rol = '$rol'");
  
  if ($resultado = $consulta_estudiante) 
  {

    obtener el array de objetos
    while ($fila = $resultado->fetch_row())
     {
        //printf ("%s (%s)\n", $fila[0], $fila[1]);
        
    session_start();
    $_SESSION["autenticado"]= true;
    $_SESSION["nombre"]=  $fila[4];
    header("Location: ../vista/estudiantes/index.php");
    }

    /* liberar el conjunto de resultados 
    $resultado->close();
  }
  else
  {
    echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../sesiones/index.php' </script>";
  }

  
  }
  
  else if($rol==3)
  {
    $consulta_profesor=$mysqli->query("SELECT * FROM profesores WHERE clave_profesor ='$matricula'  and rol = '$rol'");
    if($resultado=$consulta_profesor)
    {
      while ($fila=$resultado->fetch_row()) 
      {
       session_start();
       $_SESSION["autenticado"]=true;
       $_SESSION["nombre"]=$fila[2];
       header("Location:../vista/profesores/index.php");
      }
    }
    else
    {
      echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../sesiones/index.php' </script>";  
    }
  }
  else
  {
    echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= '../sesiones/index.php' </script>";
  }


//var_dump($matricula);





 /*$resultado_profesor = null;
 $resultado_alumno = null;


   global $mysqli;
    $resultado=$mysqli->query("SELECT id,rol from profesores  where id='".$id."' and rol='".$rol."'");
   return $resultado->fetch_object();
    

    global $mysqli;
    $resultado=$mysqli->query("SELECT * from estudiantes where matricula_estudiante =".$matricula and rol=?");
    $resultado->bind_param("i", $id);
    $resultado->bind_param("r", $rol);
    $resultado->execute();
    $sentencia = $resultado->get_result();
    return $sentencia->fetch_object();

var_dump($sentencia);

if (!$resultado_alumno || !$resultado_profesor)
 {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL: '". mysql_error()."'";
    exit;
}

$alumno=mysqli_fetch_array($resultado_alumno);
$profesor=mysqli_fetch_array($resultado_profesor);




if($alumno['id'] == $alumno)
{
    $_SESSION['id']= $alumno['id'];
  
    header("Location: ../vista/vista_alumno.php");
    exit();
}
else if($profesor['rol'] == $profesor)
 {
   $_SESSION['profesor']= $profesor['rol'];
   header("Location: ../vista/vista_profesor.php");
   exit();
}else 
{
 Si el usuario no se encuentra en ninguna de las dos tablas imprime el siguiente mensaje */
    //$mensajeaccesoincorrecto = "El usuario y la contraseña son incorrectos, por favor vuelva a introducirlos.";
  //echo $mensajeaccesoincorrecto;


//session_star();
?>