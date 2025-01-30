<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/asigna_materias.php";
include_once "../modelo/profesores.php";
include_once "../modelo/Materias.php";
include_once "../modelo/estudiantes.php";
include_once "../modelo/asigna_notas.php";
include_once "../modelo/semestres.php";
$semestres=Semestres::obtener(); 
$id2=$_GET["id"];
$semestre2=null;
$asignacion = AsignaNotas::nota_alumno($id2,$semestre2);
$estudiante = Estudiantes::obtenerUno($_GET["id"]);
$num_semestre=["id_semestre"];

?>
<br>

<div class="row">

    <div class="col-12"><br><br>
    <h3>Calificaciones de: <br> <?php echo  $estudiante->nombre_estudiante .'&nbsp'. $estudiante->apellido_paterno.'&nbsp'. $estudiante->apellido_materno ?></h3>
        
    </div>
   
    
    <div class="col-12 table-responsive">
    <br>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                  <th>N° asignación</th>
                    <th>Nombre de Profesor</th>
                     <th>Nombre de la materia</th>
                     <th>Nota de la Materia</th>
                     <th>Semestre</th>
                    
                     
                    <th>Editar</th>
                    <th>Eliminar</th>
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php
            $resultado=0;
            $numMAte=0;
            $numMAte=count($asignacion);
            
            ?>
                
                <?php foreach ($asignacion as $asigna) 
                {
                          
                    ?>
                    <tr>
                        
                        <td><?php echo $asigna["id"] ?></td>
                        <td><?php echo $asigna["nombre_profesor"] ?></td>
                        <td><?php echo $asigna["nombre_materia"] ?></td>
                        <td><?php echo $asigna["nota_materia"] ?></td>
                        <td><?php echo $asigna["id_semestre"] ?></td>
                        
                        

                        
                        
                        

                      
                        
                        
                        <td><a href="editar_nota.php?id=<?php echo $asigna["id"].'&id_estudiante='.$asigna["id_estudiante"].'&nombre_materia='.$asigna["nombre_materia"].'&nombre_profesor='.$asigna["nombre_profesor"].'&semestre='.$asigna["id_semestre"]?>" class="btn btn-warning">Editar</a></td>
                        
                        <td>
                            <a href="eliminar_estudiante.php?id=<?php echo $asigna["id"] ?>" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                        
                    </tr>
                    
                <?php

                } 
                   
           
            
             ?>
                
            </tbody>
                    
          
        </table>
                
                    

        <div class="form-group"><br>
            <form method="POST" target="_blank" action="../mpdf/carga.php?id=<?php echo $_GET["id"]?>">
                <input type="hidden" name="numMAte" value="<?php echo $numMAte ?>">
                <p>Selecciona el semestre</p>
                <select name="semestre" class="form-control" id="semestre">
            		<?php foreach ($semestres as $semestre) 
            		{
            		 echo '<option value="'.$semestre['id_semestre'].'"selected>'.$semestre["id_semestre"].'</option>';	# code...
            		}
            		
            		?>

            			
            		</select>
                <button type="submit" name="generarboleta" class="btn btn-primary">Generar Boleta</button><br>
            </form>
              
            </div>
    </div>
    
</div>
<?php
include_once "pie.php";
