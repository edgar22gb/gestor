<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/oficios.php";
include_once "../modelo/estudiantes.php";
$oficios=Oficios::obtener_oficios();
?>
<div class="row">
    <div class="col-12"><br><br>
    <h1>Oficios Generados</h1>
    <a href="../vista/registra-oficios" class="btn btn-info my-2">Nuevo Oficio</a>
  
   
    </div>
    <div class="col-12 table responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Numero de Folio</th>
                <th>Estudiante</th>
                <th>Descripción</th>
                <th>Asunto</th>
                <th>Editar</th>
                <th>Generar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($oficios as $oficio){

            ?>
            <tr>
                <td><?php echo $oficio["numero_folio"]?></td>
                <td><?php echo $oficio["nombre_estudiante"]?></td>
                <td><?php echo $oficio["descripcion"]?></td>
                <td><?php echo $oficio["asunto"]?></td>
                <td><a href="editar_oficios.php?id=<?php echo $oficio["id"]?>" class="btn btn-warning">Editar</a></td>
                <td>

                        <form action="../mpdf/carga.php" method="POST" target="_blank">
                        <input type="hidden" value="<?php echo $oficio["id"] ?>" name="id_oficio">
                        <button type="submit"name="generar-oficios" clas="btn btn-primary">Generar oficio</button></td>
                        </form></td>

            </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
    </div>
</div>
<?php
include_once "../vista/pie.php";