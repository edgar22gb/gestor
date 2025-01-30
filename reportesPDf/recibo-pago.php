<?php
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [26,37]]);
//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'utf-8', [190, 236]]);
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
include_once "../conexionBD/conexion.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/pagos.php";


$id_pago=$_POST['id_pago'];
$pagos=pagos::obteneruno($id_pago);
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
        font-size:20px;
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
        font-size:20px;
        border: 1px solid #044B68;
        text-align: lefth;
        width:175px;

      }
      td{
        
        
        vertical-align: top;
        padding:16px;
        font-size:16px;
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


     
<img class="img" src="../img/BANNERCUM.png" style="width:80%;">
<p style="font-size:14px;margin-top:10px;">CENTRO UNIVERSITARIO MOCTEZUMA</p>
<h2>RECIBO DE PAGO</h2>
<div style="width:100%; margin-top:40px;">
<table>
    <tr>
    <th>Recibimos de:</th>
    <td>'.$pagos->id_estudiante.'
    </tr>
    <tr>
    <th>Cantidad de pago:</th>
    <td>$'.$pagos["monto"].'.00</td>
    </tr>
    <tr><th>Descripción</th>
    <td>'.$pagos["descripcion"].'</td>
    </tr>
    <tr>
    <th>Fecha de pago</th>
    <td>'.$pagos->fecha_pago.'</td>
    </tr>
    </table>
    ';
  
    
   
   
   
 

   



  
    $mpdf->WriteHTML($html);
    $mpdf->Output("RECIBO DE PAGO.pdf","I");
?>


