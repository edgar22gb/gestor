7859+<?php
 
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes.php";
include_once "../modelo/materias.php";
include_once "../modelo/nota.php";
include_once "../modelo/asigna_materias.php";
include_once "../modelo/asigna_notas.php";

$numero_semestre=$_POST["semestre"];  

//$css=file_get_contents('../bootstrap.min.css');
$id=$_GET["id"];
$estudiante= Estudiantes::obtenerUno($id);
$materias_asignadas=AsignaMaterias::obtener2($_GET["id"]);
$nombre=$estudiante->nombre_estudiante;


$asigna_notasmateria =AsignaNotas::mostrar_notas();
$materias = Materias::obtener();
$asignacion = AsignaNotas::nota_alumno($id,$numero_semestre);
//$numMaterias = $_POST["numMAte"];


$html='
    <style>
    
      body{
        margin:auto,auto,auto,auto;
        text-align:center;
        opacity: 0.5;
  
      }
     
    
      div{
        margin-top:350px;
      }
    
      h2{
        text-align:center;
        color: black;
        font-size:30px;
      }
      h3{
        text-align:center;
        color: #blue;
        font-size:10px;
        text-align:left;
    
      }
    
      h4{
        text-align:lefth;
        color: #00659b;
    
      }
      #table2
      {
      border: 2px; 
      text-align: left;
        
        
      }
      p{
        font-family:sans-serif;
        font-size:14px;
        color:#00608e;
      }
     
      table{
        
        margin:auto,auto,auto,auto;
        width:100%;
        border-collapse: collapse;
        border: 1px solid ;
        border-color:#03384F; 
    
      }
    
      th{
    
        background-color: white;
        color: black;
        padding:4px;
        font-size:12px;
        border: 1px solid #044B68;
        text-align: center;

      }
      td{
        
        
        vertical-align: top;
        padding:12px;
        font-size:14px;
        text-align:center;
        border: 1px solid #044B68;
        color:black;
        font-family:Arial;
       
      }
   
      </style>

<body>

<div>
    <img style="margin-top:-50px;"  class="img" src="../img/BANNERCUM.png">  
    
    <h2>BOLETA DE CALIFICACIONES</h2>
    <br>
    <table>
  <tr>
        <th rowspan="2">NOMBRE DEL ALUMNO (A):</th>
        <td>'.$estudiante->apellido_paterno.'</td>
        <td>'.$estudiante->apellido_materno.'</td>
        <td colspan="3">'.$estudiante->nombre_estudiante.'</td>
        </tr>
    
    ';
    $html.='
    <tr>
    <th>APELLIDO PATERNO</th>
    <th>APELLIDO MATERNO</th>
    <th colspan="3">NOMBRE(S)</th>
    </tr>
    <tr>
    <th>MAESTRIA</th>
    <td colspan="5">'.$estudiante->maestria_solicitada.'</td>
    </tr>
    <tr>
    <th>GENERACIÓN</th>
    <td colspan="5">'.$estudiante->generacion.'</td>
    </tr>
    <tr>
    <th>SEMESTRE</th>
    <td colspan="5">'.$numero_semestre.'° SEMESTRE</td>
    </tbody>
  </table>
  <BR>
    ';
    $html.='
    <table>
    <thead>
    <tr>
    <th style="width:50%">ASIGNATURA</th>
    <th>CALIFICACION</th>
    </tr>
    </thead>
    </table>';
      $suma = 0;
      $numMAte=0;
      
      
    foreach ($asignacion as $asigna)
  {
    $numMAte=count($asignacion);
     
      $suma += $asigna["nota_materia"];
    $html.='
    <table style="width:100%">
    <thead>
    <tr>
    <td style="width:50%">'.$asigna["nombre_materia"].'</td>
    <td style="width:50%"><u><b>'.$asigna["nota_materia"].'</td>
    
    </tr>
    
    </thead>
    </table>
    
    '
    
    ;

    
  }
    $html.='<h3 style="font-size:12px;margin-top:30px;">CALIFICACIÓN PARCIAL:</h3><br> ';
    $html.='<p style="font-size:14px; margin-top:-56px; margin-left:340px;color:#4A565B;">'.round($suma/$numMAte).'</p>';
  //$html.='<p>'.$numMaterias.'</p>';
    

    

   $mpdf->WriteHTML($html);
   $mpdf->Output("BOLETA DE CALIFICACIONES-"   .$estudiante->nombre_estudiante."-".$estudiante->apellido_paterno."-".$estudiante->apellido_materno.".pdf","I");
   ?>
