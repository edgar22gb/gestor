<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/oficios.php";
include_once "../encabezado.php";

$oficio = Oficios::obtenerUno($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar Oficios</h1>
        <form action="../controlador/actualizar_oficios" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="numero de folio">Número de Folio</label>
                <input value="<?php echo $oficio->numero_folio ?>" name="numero_folio" required type="text"  class="form-control" placeholder="Estudiante">
            </div>

            <div class="form-group">
                <label for="Nombre de estudiante">Estudiante</label>
                <input value="<?php echo $oficio->id_estudiante ?>" name="id_estudiante" required type="text"  class="form-control" placeholder="Estudiante">
            </div>

            
            <div class="form-group">
                <label for="descripcion">Descripción</label><br>
                <textarea name="descripcion"id="" cols="30" rows="10" class="form-control"><?php echo $oficio->descripcion?></textarea>
                
               
                
            </div>

            

            <div class="form-group">
                <label for="asunto">Asunto</label>
                <input value="<?php echo $oficio->asunto ?>" name="asunto" required type="text" id="grupo" class="form-control" placeholder="asunto">
            </div>

                
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>