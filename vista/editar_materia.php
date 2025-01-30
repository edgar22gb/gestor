
<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/Materias.php";
include_once "../encabezado.php";
$materias = Materias::obtenerUna($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar materia</h1>
        <form action="../controlador/actualizar_materia.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">

            <div class="form-group">
                <label for="clave_materia">Clave de la materia</label>
                <input value="<?php echo $materias->clave_materia?>"name="clave_materia" readonly placeholder="clave_materia" class="form-control">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre de materia</label>
                <input value="<?php echo $materias->nombre_materia ?>" name="nombre_materia" required type="text" class="form-control" placeholder="Nombre_materia">
            </div>
            <div class="form-group">
                <label for="creditos">Número de creditos</label>
                <input value="<?php echo $materias->numero_creditos?>"  name="numero_creditos" class="form-control" >
            </div>
             <div class="form-group">
                <label for="semestre">Semestre</label>
                <input value="<?php echo $materias->semestre ?> " name="semestre" required type="text"  class="form-control" placeholder="semestre">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>