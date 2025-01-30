<?php
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



//ESTE HTML ES PARA LA CARGA ACADEMICA DEL ALUMNO

$html='
<style>

  body{
    margin:auto,auto,auto,auto;
    text-align:center;
    opacity: 0.5;
    
    
  }
  img
  {
    
  }

  div{
    margin-top:350px;
  }

  
  h2{
    text-align:center;
    color: #06357C;
    font-size:30px;
  }

  h4{
    text-align:lefth;
    color: #00659b;

  }
  p{
    font-family:sans-serif;
    font-size:14px;
    color:#00608e;
  }
  #table2
  {
  border: 2px; 
  text-align: left;
    
    
  }
  
  

  table{
    
    margin:auto,auto,auto,auto;
    width:100%;
    border-collapse: collapse;
    border: 1px solid ; 
    border-color:#03384F;
    font-style:normal;
    border-color:#03384F;


    
     
    
    
  }

  th{

    background-color: white;
    color: black;
    padding:4px;
    font-size:12px;
    color: black;
    border: 1px solid #044B68;
    text-align: center;
    
    

 
  }
  td{
    
    
    vertical-align: top;
    padding:12px;
    font-size:12px;
    text-align:center;
    border: 1px solid #044B68;
    color:black;
    
    
         
    
    
  }
  

  </style>

<body>

  
<div>

<img style="margin-top:-50px;"  class="img" src="../img/BANNERCUM.png">
   
    <h2>CARGA ACADEMICA</h2>
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
    <td colspan="5">'.$numero_semestre.'° SEMESTRE.</td>
    </tbody>
    

    
  </table>
  <br>
  
  
  '

  ;
  
    
    ;
    
    $html.='
    <table>
    <thead>
    
    <tr>
    <th style="width:50%">NOMBRE DE LA MATERIA</th>
    <th>NOMBRE DEL PROFESOR</th>
    
    </tr>
    </thead>
    </table>';
    
  $suma=0;
  $numMAte=0;
    foreach ($materias_asignadas as $materia)
  {
    $numMAte=count($materias_asignadas);
    $html.='
    <table style="width:100%">
    <thead>
    <tr>
    <td style="width:50%">'.$materia["nombre_materia"].'</td>
    
    <td>'.$materia["nombre_profesor"].'</td>
    </tr>
    </thead>
    </table>
    ';


  }
  

 

  /*  foreach ($materias_asignadas as $materia)
    {
      $html.='
      <table>
      <thead>
      <tr>
      
      
      <td style="text-align:right">'.$materia["nombre_profesor"].'</td>
      
      </tr>
      </thead>
      </table>';
    
    }

  */  
    

    //ESTE SERA EL HTML PARA GENERAR LA BOLETA DE CALIFICACIONES O KARDES
   
 /* $html='
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
        color: #06357C;
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
        color: #042558;
        padding:4px;
        font-size:12px;
        border: 1px solid #044B68;
        text-align: center;

      }
      td{
        
        
        vertical-align: top;
        padding:12px;
        font-size:12px;
        text-align:center;
        border: 1px solid #044B68;
        color:#03384F;
       
      }
   
      </style>

<body>

<div>
    <img class="#" src="../img/MEMBRETE.png">    
    <p>CENTRO UNIVERSIARIO MOCTEZUMA</p>
    <p>FRANCISCO  I. MADERO OTE #800, COL. ESQUIPULAS</p>
    <p>CD. ALTAMIRANO, GRO. TEL: 767-67-688-07-74</p>
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
    <th>A.PATERNO</th>
    <th>A.MATERNO</th>
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
    <td colspan="5">'.$estudiante->semestre.'° SEMESTRE</td>
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
    foreach ($asignacion as $asigna)
  {
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
    $html.='<h3 style="font-size:14px;margin-top:30px;">Calificación Parcial </h3><h3 style="font-size:14px;text-align:right;margin-right:150px">'.($suma)/4.;
  //$html.='<p>'.$numMaterias.'</p>';
    

    */

   $mpdf->WriteHTML($html);
   $mpdf->Output("HORARIO DE CLASES-"   .$estudiante->nombre_estudiante."-".$estudiante->apellido_paterno."-".$estudiante->apellido_materno.".pdf","I");
   ?>


    
   


   



    















