<?php include "../encabezado.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/semestres.php";
include_once "../conexionBD/conexion.php";
include_once "../modelo/Profesores.php";


$profesores=Profesores::obtener();
$semestres=Semestres::obtener(); 
//$materias = Materias::obtener();
$estudiantes = Estudiantes::obtener();
?>

<div class="row">
    <div class="col-12"><br><br><br>
        <h1>Listas de Asistencias</h1>
    </div>
      
    <div class="col-8">
    <div class="form-group">
                <label for="nombre del Estudiante">Nombre del Estudiante</label>
                <select name="nombre_estudiante" class="form-select form-control">
                

            <?php foreach ($estudiantes as $key=> $estudiante) 
                { 
                 echo '<option value="'.$estudiante['id'].'"selected>'.$estudiante["nombre_estudiante"] .'</option>';   
             }
                    ?>
                </select>
            </div>
            </div>

            

            
                <div class="col-8">
                <?php echo "<label>".$estudiante["nombre_estudiante"]."</p>"?>
            
            </div>
    
</div>


    



