<?php
include_once "../conexionBD/conexion.php";

include_once "../modelo/estudiantes.php";
include_once "../encabezado.php";
$estudiantes = Estudiantes::obtener();

?>
<div class="row">
    <div class="col-12"><br><br>
        <h1>Oficios</h1>
        <form action="../controlador/guardar_oficios.php" method="POST">
        <div class="col-md3">
        
        <div class="form-group">
                <label for="Numero de Folio">Numero de Folio</label>
                <input name="numero_folio" required type="text"  class="form-control" placeholder="Numero de folio">
            </div>

            <div class="form-group">
                <label for="Id de estudiante">Id estudiante</label>
                <select name="id_estudiante" class="form-select form-control">
                

                <?php foreach ($estudiantes as $key=> $estudiante) 
                    { 
                     echo '<option value="'.$estudiante['id'].'"selected>'.$estudiante["id"] .'</option>';   
                 }
                        ?>
                    </select>
            </div>

            <div class="form-group">
                <label for="Descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion"  rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="Asunto">Asunto</label>
                <select name="asunto" class="form-control" >
                    <option value="Alta por traslado">Alta Por Traslado</option>
                    <option value="Baja por traslado">Baja Por Traslado</option>

                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar</button>
            </div>
  
</div>
</div>
  
</form>
</div>
<?php include "pie.php" ?>