<?php 
include "../encabezado.php";
include_once "../conexionBD/conexion.php";
//include_once "../controlador/guarda_pagos.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/Pagos.php";
include_once "../modelo/Meses.php";

$estudiantes=Estudiantes::obtener();
$meses=Meses::obtener();

?>

<div class="row">
    <div class="col-12"><br><br>
    <h1>Realizar Pagos</h1>
    <form action="../controlador/guarda_pagos.php" method="post">
    <label for="fecha_pago">Fecha de Pago:</label>
        <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required><br><br>
        
        <label for="monto">Monto:</label>
        <input type="number" step="0.01" id="monto" name="monto" class="form-control" required><br><br>
        
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control"><br><br>

        <label for="mes_pago">Mes de pago:</label>

        <select name="mes_pago" class="form-control">
           <?php foreach($meses as $key=>$mes)
           {
            echo '<option value="'.$mes['id'].'"selected>'.$mes["nombre_mes"].'</option>';
           }
           ?>
        </select>
        <br><br>
        <label for="id_cliente">ID Estudiante:</label><br><br>
        <select name="id_estudiante" id="id_estudiante" class="form-control">
            <?php foreach ($estudiantes as $key => $estudiante) 
            {
                  echo '<option value="'.$estudiante['id'].'"selected>'.$estudiante["nombre_estudiante"] .'</option>';   
            }
            ?>
        </select><br>
        



    <div class="form-group">
                <button class="btn btn-success" type="submit">Guardar Pago</button>
            </div>
    </form>

    </div>
</div>