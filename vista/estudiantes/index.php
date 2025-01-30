<?php

//include_once "../modelo/estudiantes.php";
//$estudiantes = Estudiantes::obtener();
//include_once "..modelo/asigna_materias.php";
include "../../modelo/estudiantes/estudiante.php";
include "../../conexionBD/conexion.php";
include_once "../../modelo/asigna_notas.php";


session_start();
$id=$_SESSION["id"];
$estudiante=Estudiante::obtenerEstudiante($id);
if(isset($_SESSION["autenticado"]))
{

    if($_SESSION["autenticado"]==true)
    {
       echo "BIENVENIDO&nbsp;<b><br>".$_SESSION["matricula"]."</b><br> TE HAS LOGUEADO COMO ALUMNO<br>"; //echo "te estas autenticando";


    }
    
}
else
    {
        header("Location: ../sesiones/index.php");
    }

?><br>
<a href="../../sesiones/validar_sesion.php">Cerrar Sesión</a>
<!DOCTYPE html>
<html lang="es">

<head>

<title>Vista Alumno</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>

</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4><?php echo $_SESSION["estudiante"]["nom"]?></h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Materias</a></li>
        <li><a href="#section2">Calificaciones</a></li>
        <li><a href="#section3"></a></li>
        <li><a href="#section3"></a></li>
      </ul>
      <br>
      
    </div>

    
    <div class="col-sm-9">
      
      <h2>
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Perfil de Alumno</button>
      <hr>
      
      <div class="panel panel-default" id="demo">
      <div class="panel-body">Datos del alumno
      <div class="col-md-3">

      </div>
      </div>
      <div class="col-xs-5 col-sm-6 col-lg-4">
      <h4>Matricula del Estudiante:<b><?php echo $_SESSION["matricula"]?></b></h4>
      <h4>Nombre del Estudiante:<b><?php echo $_SESSION["estudiante"]["ap"]?>&nbsp;<?php echo $_SESSION["estudiante"]["am"]?>&nbsp;<?php echo $_SESSION["estudiante"]["nom"]?></b></h4>
      <h4>Maestria Solicitada:<b><?php echo $_SESSION["estudiante"]["maes"]?></b></h4>
      </div>

      <div class="col-sm-8 col-sm-push-1">
      <img src="../../<?php echo substr($estudiante->foto_estudiante,3)?>" width="12%";  alt="">
  </div>
      </div>


      

      
      
      

    
  </div>

  
     <div id="section1" class="col-sm-9 " >
      <h2><small>Mis Materias</h2></small><hr>
      <table class=" table table-hover">
            <thead>
                <tr>
                    <th>Nombre de la Materia</th>
                    <th>Nombre del Profesor</th>
                   <th>Semestre</th>
                </tr>
            </thead>
            <tbody>
               <?php
               //$id=$_SESSION["matricula"];
               $id=$_SESSION["id"];
          //var_dump($id);
          $materiasestudiante=Estudiante::asignamateria($id);
                 //$materias_asignadas=AsignaMaterias::obtener2($id);
                 // var_dump($materias_asignadas);
                   //echo count($materias_asignadas);
          //       var_dump($materiasestudiante);
               foreach ($materiasestudiante as $materia)
                 { 
             
                ?>
                    <tr>
                        <td>
                    <?php echo  $materia["nombre_materia"] ?>
                        </td>
                        <td>
                         <?php echo  $materia["nombre_profesor"] ?>
                        </td>
                        <td><?php echo $materia["id_semestre"]?></td>
                    </tr>

                <?php }
              
                ?>
          
            </tbody>
        </table>
                 </div>

                 <div id="section2" class="col-sm-9">
                 <h2><small>Mis Notas</h2></small><hr>
                 <table class=" table table-hover">
            <thead>
                <tr>
                
                    <th>Clave de la materia</th>
                    <th>Nombre de la materia</th>
                     <th>Calificacion</th>
                     
                </tr>
            </thead>
            <tbody>
               <?php

               
               $id=$_SESSION["id"];
               $calificacionesestudiante=Estudiante::notas_asignadas($id);
               foreach($calificacionesestudiante as $notas)
              {
               ?>   
               <tr>
               <td><?php echo $notas["clave_materia"] ?></td>
               <td><?php echo $notas["nombre_materia"] ?></td>
               
              
               <td><?php echo $notas["nota_materia"] ?></td>
               
               </tr>
              
             

                <?php }
              
             ?>
                
          
            </tbody>
        </table>
                 </div>
                 </div>
              
                

 

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>

</html>