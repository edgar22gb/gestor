<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/semestres.php";
include_once "../modelo/asigna_notas.php";

$semestres=Semestres::obtener();
$asignacion = AsignaNotas::mostrar_notas(); 


?>

<div class="row">
    <div class="col-12"><br><br><br>
        <h1>CALIFICACIONES GENERALES </h1>
      
        <form method="POST" target="_blank" action="../mpdf/carga.php">
 
            <div class="col-md3">
                 <div class="form-group">
            	<label for="Semestre">Semestre</label>
            	<select name="Semestre" class="form-control" id="semestre">
            		<?php foreach ($semestres as $semestre) 
            		{
            		 echo '<option value="'.$semestre['id_semestre'].'"selected>'.$semestre["id_semestre"].'</option>';	# code...
            		}
            		
            		?>

            			
            		</select>
            </div>
           

        </div>
                
        
       
    </div>
    <button type="submit" name="generar-kardex" class="btn btn-primary">FORMATOS</button><br><br>
                </form>
        
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    
                    <th>Nombre de Alumno</th>
                     <th>Nombre del Profesor</th>
                     <th>Nombre de la Materia</th>
                     <th>Semestre</th>
                     <th>Calificación</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($asignacion as $notas)
                {
                    
                   echo '<tr>';
                   echo '<td>'.$notas["id_estudiante"];
                   echo '<td>'.$notas["id_profesor"];
                   echo '<td>'.$notas["id_materia"];
                   echo '<td>'.$notas["id_semestre"];
                   echo '<td>'.$notas["nota_materia"];
                   
                }?>
                
            </tbody>
            </table>

                
                
                

    
               
    </div>
</div>
<?php
include_once "pie.php";

                