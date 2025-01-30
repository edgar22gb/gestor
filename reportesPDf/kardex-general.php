<?php
$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236]]);
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes.php";
include_once "../modelo/semestres.php";
include_once "../modelo/asigna_notas.php";
include_once "../modelo/materias.php";

//$id=$_GET["id"];
//$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
$id_kardex=$_POST['id_kardex'];
//$estudiantes=Estudiantes::ObtenerUno($id_kardex);
$estudiantes=Estudiantes::ObtenerUno($_POST["id_kardex"]);
$asignacion = AsignaNotas::nota_alumno($id_kardex,null);
//$creditos=Materias::total_creditos();
//$numero_creditos=Materias::total_creditos();
//$asignacion = AsignaNotas::nota_alumno($id2);
//$id2=$_GET["id"];
//$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
//var_dump($estudiantes);
//$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
//var_dump($estudiantes);
//echo $_POST["Semestre"];
$total_creditos=Materias::total_creditos();
$total_materias=Materias::total_materias();
//var_dump($numero_creditos);

$html='
    <style>
    
      body{
        margin:auto,auto,auto,auto;
        text-align:center;
        opacity: 0.5;
  
      }
      .img
      {
        width:100%;
        display: block;
        margin-top:-70px;

        
      }
      .img2
      {
       
      }


    
      div{
        margin-top:150px;
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
        font-size:10px;
        color:#00608e;
        padding:-8px;
        
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
        font-size:14px;
        border: 1px solid #044B68;
        text-align: center;

      }
      td{
        
        
        vertical-align: top;
        padding:16px;
        font-size:12px;
        text-align:center;
        border: 1px solid #044B68;
        color:#03384F;
       
      }
   
      </style>
      
<body>

     
   
   <img class="img" src="../img/BANNERCUM.png">
    <p style="font-size:20px;margin-top:10px;">CENTRO UNIVERSIARIO MOCTEZUMA</p>
    <h2>KARDEX DE CALIFICACIONES</h2>

    <table>
    <tr>
    <th>Matricula</th>
    <th>Nombre de Estudiante</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
   
    
    
    
   </tr>
   
   ';
  //$numcreditos=0;
  //$numcreditos+=$creditos;
 
  //$resultado=0;
  //$numcreditos+=$asigna["numero_creditos"];
  //$total_creditos+=$asigna["numero_creditos"]; 
  // $total_creditos=count($asignacion)  ;
  //$resultado=array_sum($asigna);
   $creditos_totales=89;
  

    
        $html.='
        <thead>
        <tr>
        <td>'.$estudiantes->matricula_estudiante.'</td>
        <td>'.$estudiantes->nombre_estudiante.'</td>
        <td>'.$estudiantes->apellido_paterno.'</td>
        <td>'.$estudiantes->apellido_materno.'</td>
        
      
        
        </tr>
        </thead>
       
        <tr><th>Maestria Solicitada</th>
        <td>'.$estudiantes->maestria_solicitada.'</td>
        <th>Creditos Cursados</th>
       <td>'.$total_creditos["total_creditos"].'</td>;
       
        </tr> 
        <tr>
        <th>Total de Materias</th>
        <td colspan="3">'.$total_materias["total_materias"].'</td>
        </tr>
        '
        
        ;
      //  $html.=' <td>'.$creditos['total_creditos'].'</td>';
        //$html.='<td>'.$numcreditos.'</td>';
        //$html.='<td>'.$numero_creditos.' de &nbsp;'.$creditos_totales.' </td>';
       
       
        //$html.='<td>'.round(($total_creditos)).'</td>';
        
        
    $html.='</table><br>';
    $html.='<table>
    <tr>
    <th>Clave Materia</th>
    <th>Nombre Materia</th>
    <th>Creditos</th>
    <th>Semestre</th>
    <th>Calificación</th>
    </tr>';
   
    
    foreach ($asignacion as $asigna)
    {
      $numMAte=count($asignacion);
     // $creditos=$asigna["numero_creditos"];
     // $numcreditos+=$asigna["numero_creditos"]; 
      $html.='
      <tr>
      <td >'.$asigna["clave_materia"].'</td>
      <td >'.$asigna["nombre_materia"].'</td>
      <td>'.$asigna["numero_creditos"].'</td>
      <td >'.$asigna["id_semestre"].'°Semestre</td>
      <td >'.$asigna["nota_materia"].'</td>
      </tr>
      ';
    }

    $html.='</table>'
   
    ;
  
   // $html.='<p style="font-size:14px; margin-top:-56px; margin-left:340px;color:#4A565B;">'. round(($total_creditos)/$total_creditos).'</p>';
    // $mpdf->SetHTMLFooter('<p> Este Kardex ampara 15 Asignaturas de un total de 15 del plan de estudios 2023-2024  ');
      

    $mpdf->WriteHTML($html);
    $mpdf->Output("KARDEX.pdf","I");
?>