
<?php
session_start();
include_once "../conexionBD/conexion.php";
include_once "../encabezado.php";
include_once "../modelo/Estudiantes.php";
include_once "../modelo/semestres.php";
include_once "../modelo/materias.php";
$estudiantes = Estudiantes::obtener();
$semestres=Semestres::obtener(); 
$total_creditos=Materias::total_creditos();




//$semestre2=Semestres::ObtenerSemestre($_GET["id_semestre"]);
//$id_semestre= $semestre['id_semestre'];

echo "<br><br><br>";
if(isset($_SESSION["autenticado"]))
{
    if($_SESSION["autenticado"]==true)
    {
        echo "BIENVENIDO<br><u><b> ".$_SESSION["nombre"].'</b></u>'; //echo "te estas autenticando";


    }
    
}
else
    {
        header("Location: ../sesiones/index.php");
    }
    
?><br>

<a href="../sesiones/validar_sesion.php">Cerrar Sesión</a>
<div class="row">
    <div class="col-12">
        <h1>Listado de Alumnos</h1>
       
        <a href="../vista/ficha_inscripción.php" class="btn btn-info my-2">Nuevo Alumno</a>

        


        <form method="POST" target="_blank" action="../mpdf/carga.php">
 
            <div class="col-md3">
                 <div class="form-group">
            	<label for="Semestre">Semestre</label>
            	<select name="Semestre" class="form-control" id="semestre">
            		<?php foreach ($semestres as $semestre) 
            		{
            		 echo '<option value="'.$semestre['id_semestre'].'"selected>'.$semestre["id_semestre"].'</option>';	# code...
            		}
            		
            		?>

            			
            		</select>
            </div>
           

        </div>
                
        
       
    </div>
    <button type="submit" name="generarlistas" class="btn btn-primary">Generar Listas</button><br>
                </form>
     

              


    <div class="col-12 table-responsive"><br>
    <div clas="container-fluid">
    
                        

               
    
    </div>
    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Foto estudiante</th>
                    <th>Nombre del Estudiante</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Semestre</th>
                
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Materias Asignadas</th>
                    <th>Notas</th>
                    
                    <th>Ficha de Inscripción</th>
                    <th>Constancias</th>
                    <th>Kardex</th>
                    <th>Carta pasante</th> 
                    <th>Diploma</th>
                 
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante) 
                { 
                    ?>
                    <tr>
                        <td><img src="../<?php echo substr($estudiante["foto_estudiante"],3)?>" width="50px";  alt=""></td>
                        <td><?php echo $estudiante["nombre_estudiante"] ?></td>
                        <td><?php echo $estudiante["grado"] ?></td>
                        <td><?php echo $estudiante["grupo"] ?></td>
                        <td><?php echo $estudiante["semestre"] ?>° SEMESTRE</td>

                      
                        
                        
                        <td><a href="editar_ficha.php?id=<?php echo $estudiante["id"]?>" class="btn btn-warning">Editar</a></td>

                        <td>
                            <a name="eliminarEstudiante" href="../controlador/eliminar_estudiante.php?id=<?php echo $estudiante["id"] ?>" class="btn btn-danger">
                                Eliminar
                            </a>
                        </td>
                        <td><a href="../vista/materias_estudiante?id=<?php echo $estudiante["id"]?>" class="btn btn-success">Ver Materias</a></td>
                       <td><a href="../vista/mostrar_notas?id=<?php echo $estudiante["id"]?>"class="btn btn-link">Calificaciones</a></td>
                        <td><a href="../vista/editar_ficha?id=<?php echo $estudiante["id"]?>" class="btn btn-link">Ver Inscripción</a></td>
                        <td>

                        <form action="../mpdf/carga.php" method="POST" target="_blank">
                        <input type="hidden" value="<?php echo $estudiante["id"] ?>" name="id_constancia">
                        <button type="submit"name="generar-constancia" clas="btn btn-primary">Constancias</button></td>
                        </form>
                        
                        <td>
                        <form action="../mpdf/carga.php" method="POST" target="_blank">
                            <input type="hidden" value="<?php echo $estudiante["id"]?>" name="id_kardex">
                            
                            
                            <button type="submit" name="generar-kardex" clas="btn btn-primary">Kardex</button></td>
                        </form>
                        

                        <td>
                        <form action="../mpdf/carga.php" method="POST" target="_blank">
                            <input type="hidden" value="<?php echo $estudiante["id"]?>" name="id_cartapasante">
                            
                            
                            <button type="submit" name="generar-cartapasante" clas="btn btn-primary">Carta Pasante</button></td>
                        </form>
                        </td>
                        <td>
                        <form action="../mpdf/carga.php" method="POST" target="_blank">
                            <input type="hidden" value="<?php echo $estudiante["id"]?>" name="id_diploma">
                            
                            
                            <button type="submit" name="generar-diploma" clas="btn btn-primary">Diploma</button></td>
                        </form>
                        </td>
                        
                        
                       
                        
                </td>
                    </tr>
                <?php } ?>
            </tbody>

            
        </table>
      
        
         
        


    </div>  
                    <script src="../js/jquery-3.7.0.js"></script>
                    <script src="../js/dataTables.min.js"></script>
                   
    <script>
    $(document).ready(function () {
$('#dtBasicExample').DataTable({
    
});

});
    </script>
</div>
<?php
include_once "pie.php";
?>


