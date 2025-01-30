<?php
include "../encabezado.php";
include_once "../modelo/semestres.php";
include_once "../conexionBD/conexion.php";
include_once "../modelo/Materias.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/Profesores.php";
include_once "../modelo/asigna_notas.php";
//include_once "../../modelo/estudiantes/edita_estudiante.php";
$id2=$_GET["id"];   
$id_estudiante=$_GET["id_estudiante"];
$asignacion = AsignaNotas::nota_alumno($id2,null);
$semestres=Semestres::obtener(); 
$materias = Materias::obtener();
$estudiante = Estudiantes::obtenerUno($_GET["id"]);
$profesores=Profesores::obtener();
$nota_estudiante=AsignaNotas::nota_materia($_GET["id"],$id_estudiante);

//var_dump($nota_estudiante);
?>
<br>
<div class ="row">
    <div class="col-12"><br><br>
    <h1>Editar calificacion</h1>
    <form action="../controlador/editar_nota.php" method="POST">
    
    <div class="form-group">
                <label for="nombre_materia"><b>Nombre de la materia:&nbsp</b><?php echo $_GET["nombre_materia"]?></label>
                <input type="hidden" class="form-control" name="nombre_materia" value=<?php echo $_GET["nombre_materia"]?>>
               
              

               
            </div>
            <div class="form-group">
            <label for="nombre_profesor" ><b>Nombre del profesor:&nbsp</b><?php echo $_GET["nombre_profesor"]?></label>
            <input type="hidden" class="form-control" name="nombre_profesor" value=<?php echo $_GET["nombre_profesor"]?>>
            </div>

            <div class="form-group">
            <label for="semestre" ><b>Semestre:&nbsp</b><?php echo $_GET["semestre"]?></label>
            <input type="hidden" class="form-control" name="semestre" value=<?php echo $_GET["semestre"]?>>
            </div>

            <div class="form-group">
            <label for="nota_materia" >Nota</label>
              <?php  

              foreach ($nota_estudiante as $calificacion)
              {
                
                echo "<input type='text' name='nota_materia'class='form-control' value=".$calificacion['nota_materia'].">";
              } 
              ?>
            </div>
            
            <div class="form-group">
            <input type="text" name="id_materia" value="<?php echo $_GET["id"] ?>">
                <button class="btn btn-success" type="submit">Editar</button>
            </div>

    </form>
</div>
        
</div>