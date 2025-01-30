<?php
include_once "../conexionBD/conexion.php";
include_once "../modelo/estudiantes.php";
include_once "../encabezado.php";
$estudiante = Estudiantes::obtenerUno($_GET["id"]);
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="row">
    <div class="col-12"><br><br><br>
        <h1> Ficha de Inscripción</h1>
        <form action="../controlador/actualizar_estudiante.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
            <div class="form-group">
                <div class="row">

                    <div class="col-md-3">
                        <label for="foto_estudiante">Foto</label>
                        <img src="../<?php echo substr($estudiante->foto_estudiante,3)?>" width="50px";  alt="">
                        <input type="file" name="foto"> <br>
                    </div>


                    <div class="col-md-3">
                        <label for="matricula">Matricula</label>
                        <input value="<?php echo $estudiante->matricula_estudiante ?>" name="matricula_estudiante" required type="text" class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input value="<?php echo $estudiante->apellido_paterno ?>" name="apellido_paterno" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input value="<?php echo $estudiante->apellido_materno ?>" name="apellido_materno" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="nombre_estudiante">Nombre de Estudiante</label>
                        <input value="<?php echo $estudiante->nombre_estudiante ?>" name="nombre_estudiante" required type="text"  class="form-control" placeholder="Nombre">
                    </div>



                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="edad">Edad</label>
                        <input value="<?php echo $estudiante->edad ?>" name="edad" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input value="<?php echo $estudiante->fecha_nacimiento ?>" name="fecha_nacimiento" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="sexo">Sexo</label>
                        <input value="<?php echo $estudiante->sexo ?>" name="sexo" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="estado_civil">Estado Civil</label>
                        <input value="<?php echo $estudiante->estado_civil ?>" name="estado_civil" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="curp">Curp</label>
                        <input value="<?php echo $estudiante->curp ?>" name="curp" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                        <input value="<?php echo $estudiante->lugar_nacimiento ?>" name="lugar_nacimiento" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="estado">Estado</label>
                        <input value="<?php echo $estudiante->estado ?>" name="estado" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">
                        <label for="nacionalidad">Nacionalidad</label> 
                        <input value="<?php echo $estudiante->nacionalidad?>" name="nacionalidad" type="text" class="form-control">
                    </div>
                    


                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-md-3">

                        <label for="nombre">Calle</label>
                        <input value="<?php echo $estudiante->calle ?>" name="calle" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="nombre">Numero Exterior</label>
                        <input value="<?php echo $estudiante->numero_exterior ?>" name="numero_exterior" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="nombre">Colonia</label>
                        <input value="<?php echo $estudiante->colonia ?>" name="colonia" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="nombre">Codigo Postal</label>
                        <input value="<?php echo $estudiante->codigo_postal ?>" name="codigo_postal" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="nombre">Municipio</label>
                        <input value="<?php echo $estudiante->municipio ?>" name="municipio" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="nombre">Ciudad</label>
                        <input value="<?php echo $estudiante->ciudad ?>" name="ciudad" required type="text"  class="form-control" placeholder="Nombre">
                    </div>

                    <div class="col-md-3">

                        <label for="nombre">Telefono Celular</label>
                        <input value="<?php echo $estudiante->telefono_celular ?>" name="telefono_celular" required type="text"  class="form-control" placeholder="Nombre">
                    </div>
                    </div>

                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="nombre">Licenciatura de Procedencia</label>
                        <input value="<?php echo $estudiante->licenciatura_procedente ?>" name="licenciatura_procedente" required type="text"  class="form-control" placeholder="Nombre">
                        </div>

                        <div class="col-md-3">
                            <label for="nombre">Universidad de Procedencia</label>
                        <input value="<?php echo $estudiante->universidad_procedente ?>" name="universidad_procedente" required type="text" class="form-control" placeholder="Nombre">
                        </div>


                        <div class="col-md-3">
                            <label for="nombre">Maestria solicitada</label>
                        <input value="<?php echo $estudiante->maestria_solicitada ?>" name="maestria_solicitada" required type="text"  class="form-control" placeholder="Nombre">
                        </div>

                        <div class="col-md-3">
                            <label for="generacion">Generación ESCOLAR</label>
                        <input value="<?php echo $estudiante->generacion ?>" name="generacion" required type="text"  class="form-control" placeholder="Generacion">
                        </div>

                        <div class="col-md-3">
                            <label for="turno">Turno ACADEMICO</label>
                        <input value="<?php echo $estudiante->turno ?>" name="turno" required type="text"  class="form-control" placeholder="Turno">
                        </div>

                        <div class="col-md-3">
                            <label for="grado">Grado ACADEMICO</label>
                            <input value="<?php echo $estudiante->grado ?>" name="grado" required type="text"  class="form-control" placeholder="Grado">
                        </div>

                        <div class="col-md-3">
                            
                            <label for="grupo">Grupo ACADEMICO</label>
                            <input value="<?php echo $estudiante->grupo ?>" name="grupo" required type="text"  class="form-control" placeholder="Grupo">
                        </div>

                        <div class="col-md-3">
                            
                             <label for="semestre">Semestre</label>
                            <input value="<?php echo $estudiante->semestre ?> " name="semestre" required type="text"  class="form-control" placeholder="semestre">
                        </div>

                        <div class="col-md-3">
                        
                            <input value="<?php echo $estudiante->rol ?> " name="rol" required type="hidden"  class="form-control" placeholder="rol">
                        </div>
                    </div>

                </div>

                
            </div>
            
          
                
            
            <div class="form-group">
                <button class="btn btn-danger" type="submit">Actualizar</button>
            </div>

             <div class="form-group">
               <a  href="../mpdf/index.php?id=<?php echo $_GET["id"]?>">Imprimir </a>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>