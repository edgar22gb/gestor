<?php
include_once "../conexion.php";
include_once "../estudiantes.php";
include_once "encabezado.php";
$estudiante = Estudiantes::obtenerUno($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar estudiante</h1>
        <form action="actualizar_estudiante.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="nombre">Nombre del estudiante</label>
                <input value="<?php echo $estudiante->nombre_estudiante ?>" name="nombre_estudiante" required type="text" id="nombre_estudiante" class="form-control" placeholder="Nombre">
            </div>
            
            <div class="form-group">
                <label for="grado">Grado</label>
                <input value="<?php echo $estudiante->grado ?>" name="grado" required type="text" id="grado" class="form-control" placeholder="Grado">
            </div>

            

            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input value="<?php echo $estudiante->grupo ?>" name="grupo" required type="text" id="grupo" class="form-control" placeholder="Grupo">
            </div>

            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input value="<?php echo $estudiante->semestre ?> " name="semestre" required type="text" id="semestre" class="form-control" placeholder="semestre">
            </div>
                
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>