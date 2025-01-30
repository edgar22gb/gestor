
<?php
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L']);
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236]]);


$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: -35px -20em 0 -4.2em;" src ="../img/encabezado.png"/>
</div>');

$mpdf->SetHTMLFooter('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: 10px  -10em -2.6em -4.2em;" src ="../img/pie_pagina.png"/>
</div>');
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes.php";
$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
//var_dump($estudiantes);
//echo $_POST["Semestre"];

$html='
    <style>
    
      body{
        margin:auto,auto,auto,auto;
        text-align:center;
        opacity: 0.5;
  
      }
      .img
      {
        width:260px;height:100px;
        display: block;
        margin-left: 850px;
        margin-right: auto;
        
      }
      .img2
      {
        width:260px;height:100px;
      }


    
      div{
        margin-top:150px;
      }
    
      h2{
        text-align:center;
        color: black;
        font-size:16px;
      }
      h3{
        text-align:center;
        color: #blue;
        font-size:10px;
        text-align:left;
    
      }
      .alinear-derecha
      {
        float: left;
        width:120;
        height:90;
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
        font-size:12px;
        color:black;
        padding:-8px;
        
      }
     
      table{
        
        margin:auto,auto,auto,auto;
        width:100%;
        border-collapse: collapse;
        border: 1px solid ;
        border-color:black; 
    
      }
    
      th{
    
        background-color: white;
        color: black;
        padding:4px;
        font-size:30px;
        border: 1px solid black;
        text-align: center;

      }
      td{
        
        
        vertical-align: top;
        padding:20px;
        font-size:30px;
        text-align:lefth;
        border:  solid black;
        color:black;
       
      }
   
      </style>
      
<body>


    <br><br><br><h2>LISTA DE ASISTENCIA DEL '.$_POST["Semestre"].'°&nbsp;'.'SEMESTRE</h2>
    
    
    <p style="text-align:lefth;">Nombre del Profesor: ___________________________________________</p><br>
    <p style="text-align:lefth; margin-top:-10px;">Nombre de la Materia:___________________________________________</p><br>
    ';

     

    $html.='
    <table>
    <tr><th rowspan=2>NOMBRE DEL ALUMNO</th>
    <th colspan="53" rowspan="2">ASISTENCIAS</th>
    <th colspan="22">EVALUACIÓN</th>
    </tr>
    <tr>
    <th>ASISTENCIAS</th>
    <th>PARTICIPACIONES</th>
    <th>TAREAS</th>
    <th>EXAMEN</th>
    <th>CAL.FINAL</th>
    
    
    </tr>
    
    
    ';
  
      foreach ($estudiantes as $key=>$estudiante)
     {
        $html.='
    
    <thead>
    
    <tr>
    
    <td style="text-align:justify;">'.$estudiante["nombre_estudiante"].'&nbsp;'.$estudiante["apellido_paterno"].'&nbsp;'.$estudiante["apellido_materno"].'</td>
    <td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td><td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td><td></td><td></td><td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    
    </tr>

    </thead>
    ';
     }
        
     $html .= ' </table><br>';
     
     $html.='<p style="text-align:lefth; margin-left: 10px; font-size:14px;" >Nombre y firma del Docente:___________________________________________</p>';
     $html.='<p style="text-align:center; margin-left: 10px;font-size:20px; ">CRITERIOS A EVALUAR:</p>';
     $html.='<table>
     <tr>
     <th style="font-size:12px; ">Asistencia     
     </th>
     <th style="font-size:12px;">Tareas</th>
     <th style="font-size:12px;">Examen</th>
     <th style="font-size:12px;">Participacion</th></tr>
     </table>';
    
  
  
     
      //}
    
    
    

  $mpdf->WriteHTML($html);
  $mpdf->Output("LISTAS DE ASISTENCIA-".$_POST["Semestre"].'°'."Semestre".".pdf","I");
?>