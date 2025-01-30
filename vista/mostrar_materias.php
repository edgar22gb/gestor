
<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/Materias.php";
include "../modelo/semestres.php";
$semestres=Semestres::obtener(); 
$materias = Materias::obtener();
?>
<div class="row">
    <div class="col-12"><br><br><br>
        <h1>Listado de materias</h1>
        <a href="../vista/formulario_registro_materia.php" class="btn btn-info my-2">Nueva Materia</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Clave de la materia</th>
                    <th>Nombre de la materia</th>
                    <th>Creditos</th>
                    <th>Semestre</th>
                    <th>Asignar Materia</th>
                    <th>Asignar Nota</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materias as $materias) { ?>
                    <tr>
                        <td><?php echo $materias["clave_materia"]?></td>
                        <td><?php echo $materias["nombre_materia"] ?></td>
                        <td><?php echo $materias["numero_creditos"]?></td>
                        <td><?php echo $materias["semestre"] ?></td>
                        <td><a href="../vista/alumnos_materias.php?id=<?php echo $materias["id"]?>" class="btn btn-info">Asignar</td>
                            <td><a href="formulario_asignarnotas.php?id=<?php echo $materias["id"]?>" class="btn btn-success">Asignar Nota</td>
                        <td>
                            <a href="editar_materia.php?id=<?php echo $materias["id"] ?>" class="btn btn-warning">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="../controlador/eliminar_materias.php?id=<?php echo $materias["id"] ?>" class="btn btn-danger">
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
include_once "../vista/pie.php";
