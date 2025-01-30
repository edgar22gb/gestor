<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/asigna_materias.php";
include_once "../modelo/Profesores.php";
include_once "../modelo/Materias.php";
include_once "../modelo/asigna_notas.php";
include_once "../modelo/Estudiantes.php";
//$id=$_GET["id"];

$estudiante= Estudiantes::obtenerUno($id);
$asignacion = AsignaNotas::nota_alumno($_GET["id"]);
//$nota_alumno=AsignaNotas::nota_alumno($_GET["id"]);


//$id=$_GET["id"];

?>
<div class="row">
    <div class="col-12"><br><br><br>
        <h1>Calificaciones de <?php echo $estudiante->nombre_estudiante.'&nbsp'.$estudiante->apellido_paterno ?> </h1>
        
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    
                    <th>Profesor</th>
                     <th>Nombre de la materia</th>
                     <th>Nota de la Materia</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                <?php
                   $materias_asignadas=AsignaMaterias::obtener2($_GET["id"]);
                ?>
         
                <?php foreach ($materias_asignadas as $materia)
                {

                    ?>
                        
                    <tr>
                     
                     <td><?php echo $materia["nombre_profesor"] ?></td>  
                     <td><?php echo $materia["nombre_materia"] ?>
              
                    </td>
                    
                    <td>
                    <?php 
                    $nota_alumno=AsignaNotas::nota_alumno($_GET["id"]);
                    
                     foreach ($nota_alumno as $nota)
                     {
                        //var_dump($nota);
                        echo $nota["nota_materia"];
                       //echo $nota["nota_materia"];
                       
                     }
                     ?>
                     </td>
                  
                    </tr>
                    <?php
                       
                }
   
                ?>
                </tbody>
                </table>

    
               
    </div>
</div>
<?php
include_once "pie.php";
