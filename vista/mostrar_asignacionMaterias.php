<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/asigna_materias.php";
include_once "../modelo/Profesores.php";
include_once "../modelo/Materias.php";
$asignacion = AsignaMaterias::obtener();
?>
<div class="row">
    <div class="col-12">
        <h1>Lista de Materias Asignadas</h1>
        <a href="mostrar_materias.php" class="btn btn-info my-2">Nuevo Asignación</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Semestre</th>
                    <th>Profesor</th>
                     <th>Nombre de la materia</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($asignacion as $asigna) 
                { 
                    ?>
                    <tr>
                        <td><?php echo $asigna["id_estudiante"] ?></td>
                        <td><?php echo $asigna["id_semestre"] ?></td>
                        <td><?php echo $asigna["id_profesor"] ?></td>
                        <td><?php echo $asigna["id_materia"] ?></td>
                        

                      
                        
                        
                        <td><a href="editar_estudiante.php?id=<?php echo $asigna["id"]?>" class="btn btn-warning">Editar</a></td>

                        <td>
                            <a href="eliminar_estudiante.php?id=<?php echo $asigna["id"] ?>" class="btn btn-danger">
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
