<?php
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'letter']);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'utf-8', [190, 236]]);
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
//ENCABEZADO DE ADMINISTRACIÓN
/*$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: -45px -20em 0 -4.2em;" src ="../img/ENCABEZADOS_ADMINISTRACIÓN.png"/>
</div>');
*/

//ENCABEZADO DE EDUCACIÓN
/*$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: -45px -20em 0 -4.2em;" src ="../img/ENCABEZADO_EDUCACION.png"/>
</div>');
*/
//ENCABEZADO DE NUTRICIÓN
$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: -45px -20em 0 -4.2em;" src ="../img/ENCABEZADO_NUTRICIÓN.png"/>
</div>');


//ENCABEZADO PREESCOLAR
/*$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: -45px -20em 0 -4.2em;" src ="../img/ENCABEZADOS_PREESCOLAR.png"/>
</div>');
*/
$mpdf->SetHTMLFooter('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: 10px  -10em -2.6em -4.2em;" src ="../img/pie_pagina.png"/>
</div>');


//$mpdf->SetWatermarkImage('../img/DIPLOMA_PREESCOLAR.png');
$mpdf->SetWatermarkImage('../img/DIPLOMA_LICENCIATURA.png');
$mpdf->showWatermarkImage = true;
$mpdf->watermarkImageAlpha = 1.5;



include_once "../conexionBD/conexion.php";
include_once "../modelo/Estudiantes.php";


$fechaActual = date('d-m-Y');
$dia_actual=date('d');
$mes_actual=array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
//$mes_actual=date('F');
$año_actual=date('Y');
$id_diploma=$_POST['id_diploma'];
//echo $id_constancia;
$estudiantes=Estudiantes::ObtenerUno($id_diploma);

$html='
    <style>
   

      body{
        margin:auto,auto,auto,auto;
        text-align:center;
        opacity: 0.5;
      }
      .img
      {
       
        display: block;
       
       
      }
      .img2
      {
        width:100px;height:80px;
        margin-left:380px;
        margin-right:10px;
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
        font-family:Arial;
        font-size:1em;
        line-heigth:2em
        color:black;
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
        font-size:35px;
        border: 1px solid #044B68;
        text-align: center;

      }
      td{
    
        vertical-align: top;
        padding:16px;
        font-size:40px;
        text-align:lefth;
        border: 1px solid #044B68;
        color:#03384F;
       
      }
      .grid-container
      {
        display: grid;
        grid-template-areas:
          "header header header header header header"
          "menu main main main right right"
          "menu footer footer footer footer footer";
        gap: 10px;
        
        padding: 10px;
        
      }
      
      .grid-container > div {
        background-color: rgba(245, 247, 248, 0.8);
        text-align: center;
        padding: 10px 0;
        font-size: 30px;
        
      }

   
      </style>
      
<body>

      
  <div class="grid-container">
  
  
  </div>
  
  <br><h4 style="text-align:center;font color:black;">OTORGA EL PRESENTE:</h4>
  <h2 style="font-size:50px; font-familiy:"";">D I P L O M A</h2>
  
  
  
  
  <p style="text-align:center;font-size:30px;">A:</b>
  </p>
  
  <p style="text-align:center;font-size:24px;"> &nbsp;<b><u>'.$estudiantes->nombre_estudiante.'&nbsp;'.$estudiantes->apellido_paterno.'&nbsp;'.$estudiantes->apellido_materno.'</b></u></p>

  <p style="text-align:center;font-size:18px;"><b>EN VIRTUD DE HABER CONCLUIDO SATISFACTORIAMENTE<br> SUS ESTUDIOS CORRESPONDIENTES<br> A LA LICENCIATURA EN  <b>'.$estudiantes->licenciatura_procedente.'.</b>
  </p><br>
  <p><b>DE LA GENERACIÓN</p><b>'.$estudiantes->generacion.'</b><br><br>
  
  <p><b>CD. ALTAMIRANO, GUERRERO A 12 de Julio de &nbsp;' .$año_actual.'</p><br><br>
  
 
  
  <table style="border:none">
  <tr>
  <td style="font-size:12px;text-align:center;border:none;"><p>_______________________________________________</p><p style="color:black;"><b>MC. J. RUBEN SOLORZANO CARBAJAL</b></p></td>
  
 
  </tr>
  <tr>
  <td style="font-size:12px;text-align:center;border:none"><p style="color:black;"><b>RECTOR</p></b></td>
  
  </tr>
  </table>';
  
  //PREESCOLAR
/*
  $html='
    <style>
   

      body{
        margin:auto,auto,auto,auto;
        text-align:center;
        opacity: 0.5;
      }
      .img
      {
       
        display: block;
       
       
      }
      .img2
      {
        width:100px;height:80px;
        margin-left:380px;
        margin-right:10px;
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
        font-family:Arial;
        font-size:1em;
        line-heigth:2em
        color:black;
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
        font-size:35px;
        border: 1px solid #044B68;
        text-align: center;

      }
      td{
    
        vertical-align: top;
        padding:16px;
        font-size:40px;
        text-align:lefth;
        border: 1px solid #044B68;
        color:#03384F;
       
      }
      .grid-container
      {
        display: grid;
        grid-template-areas:
          "header header header header header header"
          "menu main main main right right"
          "menu footer footer footer footer footer";
        gap: 10px;
        
        padding: 10px;
        
      }
      
      .grid-container > div {
        background-color: rgba(245, 247, 248, 0.8);
        text-align: center;
        padding: 10px 0;
        font-size: 30px;
        
      }

   
      </style>

<body>

      
  <div class="grid-container">
  
  
  </div>
  
  <br><h4 style="text-align:center;font color:black;">OTORGA EL PRESENTE:</h4>
  <h2 style="font-size:50px; font-familiy:"";">D  I  P  L  O  M  A</h2>
  
  
  
  
  <p style="text-align:center;font-size:30px;">A:</b>
  </p>
  
  <p style="text-align:center;font-size:24px;"> &nbsp;<b><u>'.$estudiantes->nombre_estudiante.'&nbsp;'.$estudiantes->apellido_paterno.'&nbsp;'.$estudiantes->apellido_materno.'</b></u></p>

  <p style="text-align:center;font-size:18px;"><b>POR HABER CONCLUIDO EXITOSAMENTE SU EDUCACIÓN PREESCOLAR <br> DE LA GENERACIÓN &nbsp;'.$estudiantes->generacion.'</b>
  </p><br>
  
  <p><b>CD. ALTAMIRANO, GUERRERO A 12 DE JULIO DE &nbsp;' .$año_actual.'</p><br><br>
  
 
  
  <table style="border:none">
  <tr>
  <td style="font-size:12px;text-align:center;border:none;"><p>_______________________________________________</p><p style="color:black;"><b>PSIC. INGRID JANET MARIANO HILARIO<br>MAESTRA DE GRUPO</b></br></p></td>
  <td style="font-size:12px;text-align:center;border:none;"><p>_______________________________________________</p><p style="color:black;"><b>MSP. SILVIA AGUSTIN MAGAÑA<br>DIRECTORA</b></br></p></td>
  
 
  </tr>
    </table>';*/
    $mpdf->WriteHTML($html);
    $mpdf->Output('DIPLOMA DE TERMINO-'.$estudiantes->nombre_estudiante.'-'.$estudiantes->licenciatura_procedente.".pdf","I");
?>

