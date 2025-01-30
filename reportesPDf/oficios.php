<?php
$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 236]]);
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes.php";
include_once "../modelo/oficios.php";
include_once "../modelo/asigna_notas.php";
//include_once "../modelo/asigna_notas.php";
//$id=$_GET["id"];
//$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
$id_oficio=$_POST['id_oficio'];
//$estudiantes=Estudiantes::ObtenerUno($id_kardex);
//$estudiantes=Estudiantes::ObtenerUno($_POST["id_oficio"]);
$oficios=Oficios::obtenerUno($id_oficio);
$estudiantes=Estudiantes::ObtenerUno($_POST["id_oficio"]);
$asignacion = AsignaNotas::nota_alumno($id_oficio);
//$asignacion = AsignaNotas::nota_alumno($id_kardex);
//$asignacion = AsignaNotas::nota_alumno($id2);
//$id2=$_GET["id"];
//$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
//var_dump($estudiantes);
//$estudiantes= Estudiantes::obtenerlista($_POST["Semestre"]);
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
        text-align:justify;
        border: 1px solid #044B68;
        color:#03384F;
       
      }
   
      </style>
      
<body>

     
   
   <img class="img" src="../img/BANNERCUM.png">
    <p style="font-size:20px;margin-top:10px;">CENTRO UNIVERSITARIO MOCTEZUMA</p><br>
    <p style="text-align:right;font-size:16px;"><b>Dirección: Maestrias</p>
    <p style="text-align:right;font-size:16px;"><b>U.Admva: Control Escolar</p>
    <p style="text-align:right;font-size:16px;"><b>Oficio No:'.$oficios->numero_folio.'</p>
    <p style="text-align:right;font-size:16px;"><b><u>Asunto:'.$oficios->asunto.'</p>
    <p style="text-align:lefth;font-size:20px;">A QUIEN CORRESPONDA</p><br>
    <p style="text-align:justify;font-size:14px;">'.$oficios->descripcion.'con matricula &nbsp;<b>'.$estudiantes->matricula_estudiante.'&nbsp;</b>estuvo 
    inscrito en el ciclo escolar 2022-2023, como alumno regular del 1° año Grupo "A" en el turno matutino del presentete ciclo escolar
    2022-2023, el cual dío inició el 20 de agosto de 2022 y termino el 8 de julio del año 2023, CAUSANDO&nbsp;<b>'.$oficios->asunto.'</b> a partir del día 28 de marzo de 2023.
    &nbsp;siendo sus calificaciones las siguientes.<br><br>';
    foreach ($asignacion as $asigna)
    {
      $html.='
      <table style="width:100%">
      <thead>
      <tr>
      <td style="width:50%">'.$asigna["nombre_materia"].'</td>
      <td style="width:50%"><u><b>'.$asigna["nota_materia"].'</td>
      
      </tr>
      
      </thead>
      </table>
      ';
    }
    $html.='<br><br><p style="text-align:justify;font-size:14px;"> a solicitud del interesado(a) y para dicho tramite, se extiende la presente constancia, en Cd. Altamirano,Gro. a los 28 días del mes de marzo de 2023.<br><br>';
    $html.='<p style="text-align:center;font-size:20px;">ATENTAMENTE<br><br><br><br>J. Ruben Solorzano Carbajal<br>Rector del Centro Universitario Moctezuma.</p><br>
    
    ';
      
    
  
    $oficios->numero_folio;
    $mpdf->WriteHTML($html);
    $mpdf->Output("KARDEX.pdf","I");
?>