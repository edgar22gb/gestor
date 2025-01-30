
<?php include "encabezado.php";
include_once "semestres.php";
include_once "conexion.php";
$semestres=Semestres::obtener(); 

//$estudiantes=Estudiantes::obtenerSemestre();
?>

<div class="row">
    <div class="col-12">
        <h1>Registro de Alumnos</h1>
        <form action="guardar_estudiante.php" method="POST">

        <div class="form-group">
                <label for="foto">Foto</label>
                <input name="foto_estudiante" required type="text"  class="form-control" placeholder="Foto Estudiante">
            </div>

        <div class="form-group">
                <label for="Matricula">Matricula</label>
                <input name="matricula_estudiante" required type="text"  class="form-control" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="nombre del Estudiante">Nombre del Estudiante</label>
                <input name="nombre_estudiante" required type="text"  class="form-control" placeholder="Nombre">
            </div>
            
            <div class="form-group">
                <label for="grado">Grado</label>
                <input name="grado" required type="text" id="grado" class="form-control" placeholder="Grado">
            </div>
            
           



            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" required type="text" id="grupo" class="form-control" placeholder="Grupo">
            </div>


            <div class="form-group">
            <label for="semestre">Semestre</label>
            <select name="semestre" class="form-control"> 
                

            <?php foreach ($semestres as $semestre) 
                { 
                 echo '<option value="'.$semestre['id_semestre'].'"selected>'.$semestre["nombre_semestre"] .'</option>';   
             }
                    ?>
            <!--<option selected>Selecciona Semestre</option>
            <option value="PRIMERO">PRIMERO</option>
            <option value="SEGUNDO">SEGUNDO</option>
            <option value="TERCER">TERCERO</option>
            <option value="CUARTO">CUARTO</option>-->




            </select>
            </div>

            


                

            
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include "pie.php" ?>