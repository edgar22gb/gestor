
<?php 
include "../conexionBD/conexion.php";
include "../encabezado.php"; 
include "../modelo/semestres.php";
include "../modelo/materias.php";
$semestres=Semestres::obtener(); 

?>
<div class="row">
    <div class="col-12">
        <h1>Registro de materia</h1>
        <form action="../controlador/guardar_materia.php" method="POST">
            <div class="form-group">
                <label for="Clave de la materia">Clave  de Materia</label>
                <input name="clave_materia" required type="text" id="nombre_materia" class="form-control" placeholder="Clave de materia">
            </div>
            <div class="form-group">
                <label for="nombre de la materia">Nombre de Materia</label>
                <input name="nombre_materia" required type="text"  class="form-control" placeholder="Nombre_materia">
            </div>

            <div class="form-group">
                <label for="creditos materia">Número de Creditos</label>
                <input name="numero_creditos" required type="text"  class="form-control" placeholder="Numero de creditos">
            </div>

            <div class="form-group">
            <label for="semestre">Semestre</label>
            <select name="semestre" class="form-control" id="semestre"> 
                

            <?php foreach ($semestres as $semestre) 
                { 
                 echo '<option value="'.$semestre['id_semestre'].'">'.$semestre["nombre_semestre"] .'</option>';   
             }
                    ?>
           
            </select>
            </div>


            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include "pie.php" ?>