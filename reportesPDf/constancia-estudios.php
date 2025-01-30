<?php
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'letter']);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'utf-8', [190, 236]]);
$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
$mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: -35px -20em 0 -4.2em;" src ="../img/encabezado.png"/>
</div>');

$mpdf->SetHTMLFooter('
<div style="text-align: right; font-weight: bold;">
    <img style="margin: 10px  -10em -2.6em -4.2em;" src ="../img/pie_pagina.png"/>
</div>');
   

//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [190, 206]]);
include_once "../conexionBD/conexion.php";
include_once "../modelo/Estudiantes.php";


$id_constancia=$_POST['id_constancia'];
//echo $id_constancia;
$estudiantes=Estudiantes::ObtenerUno($id_constancia);
//var_dump($estudiantes);
$fechaActual = date('d-m-Y');
$dia_actual=date('d');
$mes_actual=array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
//$mes_actual=date('F');
$año_actual=date('Y');
$html='
    <style>
    
      body{
        margin:auto,auto,auto,auto;
        text-align:center;
        opacity: 0.3;
        
      
       
        
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
        font-family:Arial (sans-serif);
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
  
  <hr>
  <p style="text-align:right;text-decoration:underline; "><b><br><br>ASUNTO:&nbsp;Constancia de termino y acreditación</p>
  <p style="text-align:right;"><b>Cd. Altamirano, Gro. a 12 de Julio de 2024;
  <br><br><p style="text-align:lefth;font-size:18px;"><b>A QUIEN CORRESPONDA</b>.</p><br>
  <p style="text-align:center;font-size:18px;">Por este conducto se hace constar que el(a)alumno(a)</b>
  </p>
  
  <p style="text-align:center;font-size:18px;"> &nbsp;<b>'.$estudiantes->nombre_estudiante.'&nbsp;'.$estudiantes->apellido_paterno.'&nbsp;'.$estudiantes->apellido_materno.'</b></p><br><br>

  <p style="text-align:justify;font-size:18px;">Con CURP de registro&nbsp;<b>'.$estudiantes->curp.',</b>&nbsp;curso y acreditó satisfactoriamente las asignaturas correspondientes a la <b>Licenciatura en <b>'.$estudiantes->licenciatura_procedente.'</b>,&nbsp;</b>finalizando
  su ultimo cuatrimestre el 20 de agosto del año en curso, en la generación <b>'.$estudiantes->generacion.'</b>, y actualmente su documentación oficial, se encuentra en trámite ante las autoridades
  educativas correspondientes,&nbsp;en la Ciudad de Chilpancingo,Gro.</p>
      
  <br><br></p>
  <p style="text-align:justify;font-size:18px;">Para los fines legales que el interesado(a) convengan, y  conforme a derecho se extiende la presente a los&nbsp;12 Días del mes de julio de 2024 &nbsp;en Cd. Altamirano,Gro.</p><br><br>
  <p ><b>A T E N T A M E N T E<br>"Educación intergal, elige CUM"</p><br><br><br><br><br>
  <table style="border:none">
  <tr>
  <td style="font-size:12px;text-align:center;border:none;"><p>_______________________________________________</p><p style="color:black;"><b>MC. J. RUBEN SOLORZANO CARBAJAL<br>RECTOR</b></p></td>
  
  <td style="font-size:12px;text-align:center;border:none;"><p>_______________________________________________</p><p style="color:black;"><b>MSP.SILVIA AGUSTIN MAGAÑA<br>DIRECTORA GENERAL</b></p></td>
  </tr>
  
  </table>
  </body>';
  
    $mpdf->WriteHTML($html);
    $mpdf->Output('CONSTANCIA DE ESTUDIOS Y ACREDITACIÓN-'.$estudiantes->nombre_estudiante.'-'.$estudiantes->licenciatura_procedente.".pdf","I");
?>
