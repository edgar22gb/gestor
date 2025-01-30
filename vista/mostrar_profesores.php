<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/profesores.php";
$profesores = Profesores::obtener();
?>
<div class="row">
    <div class="col-12"><br><br>
        <h1>Listado de Maestros</h1>
        <a href="formulario_registro_profesor.php" class="btn btn-info my-2">Nuevo Profesor</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Clave del Profesor</th>
                    <th>Nombre del Profesor</th>
                    <th>Curp</th>
                    <th>Dirección</th>
                    <th>Teléfono Celular</th>
                    <th>Correo Electronico</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profesores as $profesor) 
                { 
                    ?>
                    <tr>
                        <td><?php echo $profesor["clave_profesor"] ?></td>
                        <td><?php echo $profesor["nombre_profesor"] ?></td>
                        <td><?php echo $profesor["curp"] ?></td>
                        <td><?php echo $profesor["direccion"] ?></td>
                        <td><?php echo $profesor["telefono_celular"] ?></td>
                        <td><?php echo $profesor["correo_electronico"] ?></td>
                        
                        

                      
                        
                        
                        <td><a href="editar_profesor.php?id=<?php echo $profesor["id"]?>" class="btn btn-warning">Editar</a></td>

                        <td>
                            <a href="../eliminar_profesor.php?id=<?php echo $profesor["id"]?>" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "pie.php";