<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/Materias.php";
include_once "../modelo/Nota.php";
include_once "../modelo/asigna_materias.php";
include_once "../modelo/semestres.php";
$semestres=Semestres::obtener(); 

$estudiante = Estudiantes::obtenerUno($_GET["id"]);
$num_semestre=["id_semestre"];
//$numMaterias = $_POST["numMAte"];
//$profesores=  Profesores::obtener(); 
// $asigna_materias=AsignaMaterias::obtener2();
//$materias = Materias::obtener();


?>
<div class="row">
    <div class="col-12"><br><br><br>
        <h3>Materias  de:<br> <?php echo $estudiante->nombre_estudiante.'&nbsp' .$estudiante->apellido_paterno. '&nbsp'.$estudiante->apellido_materno?></h3>
    </div>
    <div class="col-12 table-responsive"><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre de la Materia</th>
                    <th>Nombre del Profesor</th>
                   <th>Semestre</th>
                </tr>
            </thead>
            <tbody>
               <?php
                    $materias_asignadas=AsignaMaterias::obtener2($_GET["id"]);
                   // var_dump($materias_asignadas);
                   $resultado=0;
                    $numMAte=0;
                    $numMAte=count($materias_asignadas);
                   //echo count($materias_asignadas);
                foreach ($materias_asignadas as $materia)
                 { 
                        

                         
                ?>
                    <tr>
                        <td>
                    <?php echo  $materia["nombre_materia"] ?>
                        </td>
                        <td>
                         <?php echo  $materia["nombre_profesor"] ?>
                        </td>
                        <td><?php echo $materia["id_semestre"]?></td>
                    </tr>


                <?php } ?>



            </tbody>

        </table>
        <div class="form-group">
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

            			
            		
                <button type="submit" name="generarcarga" class="btn btn-primary">Generar Carga Academica</button><br>
            </form>
               
            </div>
    </div>
</div>
<?php
include_once "pie.php";