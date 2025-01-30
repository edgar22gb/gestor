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
    <div class="col-12">
        <h1>Asignar Materias</h1>
        <form action="../controlador/asignar.php" method="POST">
            

            

        	 <div class="form-group">
                <label for="nombre del Estudiante">Nombre del Estudiante</label>
               <select name="id_estudiante" class="form-select form-control" multiple aria-label="multiple select example">
                

            <?php foreach ($estudiantes as $key=> $estudiante) 
                { 
                 echo '<option value="'.$estudiante['id'].'"selected>'.$estudiante["nombre_estudiante"] .'</option>';   
             }
                    ?>
                </select>
            </div>

            <div class="form-group">
            	<label for="Semestre">Semestre</label>
            	<select name="id_semestre" class="form-control">
            		<?php foreach ($semestres as $semestre) 
            		{
            		 echo '<option value="'.$semestre['id_semestre'].'"selected>'.$semestre["id_semestre"].'</option>';	# code...
            		}
            		
            		?>

            			
            		</select>
            </div>

            <div class="form-group">
                <label for="nombre_profesor">Nombre del Profesor</label>
                <select name="id_profesor" class="form-control" >
                    <?php foreach ($profesores as $profesor) 
                    {
                     echo '<option value="'.$profesor['id'].'"selected>'.$profesor["nombre_profesor"].'</option>'; # code...
                    }
                    
                    ?>

                        
                    </select>
            </div>

             


            <div class="form-group">
                <input type="hidden" name="id_asignar" value="<?php echo $_GET["id"]?>">
                
                <button class="btn btn-success" type="submit">Asignar</button>
            </div>
        </form>
</div>

<?php
include_once "pie.php";
