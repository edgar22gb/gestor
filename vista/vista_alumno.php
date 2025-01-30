<?php
include_once "../encabezado_alumno.php";
session_start();
//var_dump($_SESSION["autenticado"]);

if(isset($_SESSION["autenticado"]))
{
    if($_SESSION["autenticado"]==true)
    {
        echo "<br><br><br>BIENVENIDO, TE HAS LOGUEADO COMO ALUMNO " .$_SESSION["nombre"]; //echo "te estas autenticando";


    }
    


}
else
    {
        header("Location: ../sesiones/index.php");
    }


?>
