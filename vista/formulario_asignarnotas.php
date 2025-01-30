<?php include "../encabezado.php";
include_once "../modelo/semestres.php";
include_once "../conexionBD/conexion.php";
include_once "../modelo/Materias.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/Profesores.php";
$semestres=Semestres::obtener(); 
$materias = Materias::obtener();
$estudiantes = Estudiantes::obtener();
$profesores=Profesores::obtener();

?>

<div class="row">
    <div class="col-12"><br><br>
        <h1>Asignar Nota de Materias</h1>
        <form action="../controlador/asignar_nota.php" method="POST">
            

            

        	 <div class="form-group">
                <label for="nombre del Estudiante">Nombre del Estudiante</label>
               <select name="nombre_estudiante" class="form-select form-control" multiple aria-label="multiple select example">
                

            <?php foreach ($estudiantes as $key=> $estudiante) 
                { 
                 echo '<option value="'.$estudiante['id'].'"selected>'.$estudiante["nombre_estudiante"] .'</option>';   
             }
                    ?>
                </select>
            </div>

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

            <div class="form-group">
                <label for="nombre_profesor">Nombre del Profesor</label>
                <select name="nombre_profesor" class="form-control" id="nombre_profesor">
                    <?php foreach ($profesores as $profesor) 
                    {
                     echo '<option value="'.$profesor['id'].'"selected>'.$profesor["nombre_profesor"].'</option>'; # code...
                    }
                    
                    ?>

                        
                    </select>
            </div>

             <div class="form-group">
                <label for="nota_materia">Nota Materia</label>
                <input name="nota_materia" required type="text" id="nota_materia" class="form-control" placeholder="Nota Materia">
            </div>

             


            <div class="form-group">
                <input type="hidden" name="id_asignarnota" value="<?php echo $_GET["id"]?>">
                
                <button class="btn btn-success" type="submit">Asignar</button>
            </div>
        </form>
</div>

<?php
include_once "pie.php";
