<?php

session_start();
if(isset($_SESSION["autenticado"]))
{
    if($_SESSION["autenticado"]==true)
    {
        echo "BIENVENIDO, TE HAS LOGUEADO COMO PROFESOR ".$_SESSION["nombre"]; //echo "te estas autenticando";


    }
    
}
else
    {
        header("Location: ../sesiones/index.php");
    }

?>



