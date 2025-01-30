<?php
//$css=file_get_contents('../bootstrap.min.css');
$id=$_GET["id"];
$estudiante= Estudiantes::obtenerUno($id);



$html='
<style>
  body {
    background-image:url("../img/logo_cum");
    background-size: cover;
    background-repeat:no-repeat;
    background-position: center center; 
   
  
  margin:auto,auto,auto,auto;
  text-align:center;
  }


  
  

  h2{
    text-align:center;
    color: #06357C;
    font-size:30px;
  }

  h4{
    text-align:center;
    color: #00659b;
    font-size:16px;

  }
  p{
    font-family:sans-serif;
    font-size:14px;
    color:#00608e;
  }

  table{
    text-align:center;
    margin:auto,auto,auto,auto;
    width:100%;
    font-family: sans-serif;
    font-size:14px;
    border-collapse: collapse;
    font-style:normal;
    border-color:#03384F;

  }
  th{

    padding-top:10px;
    paddng-bottom:10px;
    background-color:#b5cb88;
    color: #042558;
    border: 1px solid #044B68;
    
  }
  td{
    text-align: center;
    vertical-align: top;
    color:#03384F;
    border-spacing: 0;
    padding:10px;
    border: 1px solid #044B68;
   
  }
  .


  </style>
<body class="img">


<div>
    <img class="#" src="../img/MEMBRETE.png">    
    <p>CENTRO UNIVERSITARIO MOCTEZUMA</p>
    <p>FRANCISCO  I. MADERO OTE #800, COL. ESQUIPULAS</p>
    <p>CD. ALTAMIRANO, GRO. TEL: 767-67-688-07-74</p>
    <h2>CEDULA DE INSCRIPCIÓN</h2>
    
    <h4><u>DATOS GENERALES:</h4></u>
  
  <table>
  
    <tr>
    <th>FOTO</th>
    <td><img width="50px"; src=../substr../'.$estudiante->foto_estudiante.' ></td>;
    </tr>
    <tr>
    <th>MATRICULA</th>
    
    <td colspan="3">'.$estudiante->matricula_estudiante.'</td>
    </tr>

      <tr>
        <th rowspan="2">NOMBRE DEL ALUMNO (A):</th>
        
        <td>'.$estudiante->apellido_paterno.'</td>


        <td>'.$estudiante->apellido_materno.'</td>
        <td>'.$estudiante->nombre_estudiante.'</td>
        
        </tr>
       
    

    
    <tbody>';
    $html.='
    <tr>
    <th>A.PATERNO</th>
    
    <th>A.MATERNO</th>
    
    <th>NOMBRE(S)</th>
    
    
    </tr>
    </tbody>
    

    
  </table>

 <br>

  <table>
 
  <tr>
  <th>EDAD:</th>
  <td>'.$estudiante->edad.''.'Años</td>
  <th>FECHA DE NACIMIENTO</th>
  <td>'.$estudiante->fecha_nacimiento.'</td>
  <th>SEXO</th>
  <td>'.$estudiante->sexo.'</td>
  
  
  </tr>

  <tr>
  <th>ESTADO CIVIL</th>
  <td>'.$estudiante->estado_civil.'</td>
  <th>CURP:</th>
  <td>'.$estudiante->curp.'</td>
  <th>LUGAR DE NACIMIENTO:</th>
  <td>'.$estudiante->lugar_nacimiento.'</td>
  
  </tr>
  <tr>
  <th>ESTADO:</th>
  <td>'.$estudiante->estado.'</td>
  <th>NACIONALIDAD:</th>
  <td>'.$estudiante->nacionalidad.'</td>
  <th>CALLE</th>
  <td>'.$estudiante->calle.'</td>
  </tr>
  <tr>
  <td>'.$estudiante->numero_exterior.'</td>
  <td>'.$estudiante->colonia.'</td>
  <td>'.$estudiante->codigo_postal.'</td>
  <td>'.$estudiante->municipio.'</td>
  <td>'.$estudiante->ciudad.'</td>
  <td>'.$estudiante->telefono_celular.'</td>

  <tr><th>Número Ext.</th></tr>
  <th>Colonia</th>
  <th>Codigo Postal</th>
  <th>Municipio</th>
  <th>Ciudad</th>
  <th>Tel. Celular</th>
  </tr>
  
  <tr>
<th>LICENCIATURA PROCEDENTE</th>
<td colspan="5">'.$estudiante->licenciatura_procedente.'</td>
</tr>
<tr>
<th>UNIVERSIDAD PROCEDENTE</th>
<td colspan="5">'.$estudiante->universidad_procedente.'</td>
</tr>



</table>

<h4><u>DATOS DE LA MAESTRIA:</u></h4>

<table>
 
  <tr>
  
  <th>MAESTRIA SOLICITADA:</th>
  <td colspan="5">'.$estudiante->maestria_solicitada.'</td>
  
  
  </tr>

  <tr>
  
  <th>GENERACION</th>
  <td colspan="3">'.$estudiante->generacion.'</td>
  <th>TURNO</th>
  <td>'.$estudiante->turno.'</td>
  
  
  </tr>
  <tr>
  <th>SEMESTRE</th>
  <td>'.$estudiante->semestre.'° SEMESTRE</td>
  <th>GRADO</th>
  <td>'.$estudiante->grado.'° AÑO</td>
  <th>GRUPO</th>
  <td>"'.$estudiante->grupo.'"</td>
  


</table>


  
</div>

</body>
</html';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>








