
<?php include "../encabezado.php";
include_once "../modelo/profesores.php";
include_once "../conexionBD/conexion.php";
include_once "../modelo/roles.php";
$rol=Roles::obtener();


//$estudiantes=Estudiantes::obtenerSemestre();
?>

<div class="row">
    <div class="col-12">
        <h1>Registro de Profesores</h1>
        <form action="../controlador/guardar_profesores.php" method="POST">
       
            
            <div class="form-group">
                <label for="clave del Profesor">Clave del Profesor</label>
                <input name="clave_profesor" required type="text"  class="form-control" placeholder="Clave" readonly>
            </div>

            <div class="form-group">
                <label for="nombre del Profesor">Nombre del Profesor</label>
                <input name="nombre_profesor" required type="text" class="form-control" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="CURP">CURP</label>
                <input name="curp" required type="text" class="form-control" placeholder="Curp">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input name="direccion" required type="text"  class="form-control" placeholder="Dirección">
            </div>

            <div class="form-group">
                <label for="telefono_celular">Teléfono Celular</label>
                <input name="telefono_celular" required type="text"  class="form-control" placeholder="Teléfono Celular">
            </div>

            <div class="form-group">
                <label for="correo_electronico">Correo Electronico</label>
                <input name="correo_electronico" required type="text"  class="form-control" placeholder="Correo Electronico">
            </div>

            <div class="form-group">
            <label for="semestre">Rol</label>
            <select name="rol" class="form-control"> 
                

            <?php foreach ($rol as $roles) 
                { 
                 echo '<option value="'.$roles['id'].'"selected>'.$roles["rol"] .'</option>';   
                 
             }
                    ?>




            </select>
            </div>
           
            </div>


                

            
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include "../vista/pie.php" ?>