<?php
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/pagos.php";
include_once "../modelo/estudiantes.php";
$pagos=Pagos::obtener_pagos();
$estudiantes=Estudiantes::obtener();

?>

<div class="row">
    <div class="col-12"><br><br><br>
    <h1>Pagos realizados</h1>
        <a href="../vista/form-registrapago.php" class="btn btn-info my-2">Generar Nuevo Pago</a>
    </div>


    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha de Pago</th>
                    <th>Nombre estudiante</th>
                    <th>Concepto de pago</th>
                    <th>Monto </th>
                    <th>Mes de pago</th>
            
                    <th>Generar Recibo</th>
                
                    
                </tr>
            </thead>
            <tbody>
                <?php
                 foreach ($pagos as $pago) 
                 {

                ?>
                <tr>
                    <td><?php echo $pago["fecha_pago"]?></td>
                    <td><?php echo $pago["nombre_estudiante"]?></td>
                    <td><?php echo $pago["descripcion"]?></td>
                    <td><?php echo '$'. $pago["monto"].'.00'?></td>
                    <td><?php echo  $pago["nombre_mes"]?></td>
                  
                    
                   
                  
                    
                   
                  
                    <td>
                    <form action="../mpdf/carga.php" method="POST" target="_blank">
                            <input type="hidden" value="<?php echo $pago["id"]?>" name="id_pago">
                            
                            <button type="submit" name="generar-recibo-pago" clas="btn btn-primary">Recibo de pago</button></td>
                        </form></td>
                </tr>
                <?php
                 }

                ?>
                </tbody>
                </table>
                </div>
</div>
        

