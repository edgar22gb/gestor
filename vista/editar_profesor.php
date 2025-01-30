
<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/profesores.php";
include_once "../encabezado.php";
$profesor = Profesores::obtenerUnProfesor($_GET["id"]);
?>
<div class="row">
    <div class="col-12">
        <h1>Editar Profesor</h1>
        <form action="../controlador/actualizar_profesor.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <label for="clave">Clave del Profesor</label>
                <input value="<?php echo $profesor->clave_profesor ?>" name="clave_profesor" required  type="text"  class="form-control" placeholder="Clave del Profesor">
            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre del Profesor</label>
                <input value="<?php echo $profesor->nombre_profesor ?>" name="nombre_profesor" required type="text"  class="form-control" placeholder="Nombre del Profesor">
            </div>

            <div class="form-group">
                <label for="curp">Curp</label>
                <input value="<?php echo $profesor->curp ?>" name="curp" required type="text"  class="form-control" placeholder="Nombre del Profesor">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input value="<?php echo $profesor->direccion ?>" name="direccion" required type="text"  class="form-control" placeholder="Nombre del Profesor">
            </div>

            <div class="form-group">
                <label for="nombre">Telefono Celular</label>
                <input value="<?php echo $profesor->telefono_celular ?>" name="telefono_celular" required type="text"  class="form-control" placeholder="Nombre del Profesor">
            </div>

            <div class="form-group">
                <label for="nombre">Correo Electronico</label>
                <input value="<?php echo $profesor->correo_electronico ?>" name="correo_electronico" required type="text"  class="form-control" placeholder="Nombre del Profesor">
            </div>



            


                
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>