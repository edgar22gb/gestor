    
<?php include "../encabezado.php";
include_once "../modelo/semestres.php";
include_once "../conexionBD/conexion.php";
include_once "../modelo/roles.php";
// include_once "../controlador/guardar_estudiante.php";
$semestres=Semestres::obtener(); 
$rol=Roles::obtener();

// var_dump($mensaje);

?>







    <div class="row">
       <div class="col-12"><br><br>
        <h1>Ficha de inscripción</h1>


	<form action="../controlador/guardar_estudiante.php" method="POST"  enctype="multipart/form-data">
   
   <div class="container-fluid">
    <h5>Datos Generales</h5>
  <div class="row">

  <div class="col-md-3">
      <label>Foto estudiante</label>
      <input type="file" name="foto"> <br>
      
    </div>

  <div class="col-md-3">
      <label>Matricula</label>
      <input type="text" class="form-control"  placeholder="Matricula" name="matricula_estudiante" readonly >
      
    </div>
    
  <div class="col-md-3">
      <label>Apellido Paterno</label>
      <input  type="text" class="form-control"  placeholder="Apellido Paterno" name="apellido_paterno" value="" >
      
    </div>
    <div class="col-md-3">
      <label >Apellido Materno</label>
      <input type="text" class="form-control"  placeholder="Apellido Materno" name="apellido_materno" >
      
    </div>
    <div class="col-md-3">
      <label >Nombre</label>
       <input type="text" class="form-control"  placeholder="Nombre" name="nombre_estudiante" >
    </div>

    <div class="col-md-3">
      <label >Edad</label>
      <input type="text" class="form-control"  placeholder="Edad"  name="edad" >
      
  
    </div>
    <div class="col-md-3 ">
      <label >Fecha de Nacimiento</label>
      <input type="text" class="form-control"  placeholder="Fecha de Nacimiento"  name="fecha_nacimiento" >
      
    </div>
    <div class="col-md-3 ">
      <label >Sexo</label>
      <select class="form-control" name="sexo" >
        <option>Femenino</option>
        <option>Masculino</option>
      </select>
      
    </div>
    <div class="col-md-3 ">
      <label >Estado Civil</label>
    <select class="form-control" name="estado_civil" >
        <option>Soltero(a)</option>
        <option>Casado(a)</option>
        <option>Divorciado(a)</option>
        <option>Union Libre</option>
      </select>
      
    </div>

    <div class="col-md-3 ">
      <label >Curp</label>
     <input type="text" class="form-control"  placeholder="Curp"  name="curp" >
    
    </div>
    <div class="col-md-3 ">
      <label >Lugar de Nacimiento</label>
     <input type="text" class="form-control"  placeholder="Lugar de Nacimiento"  name="lugar_nacimiento" >
     
    </div>
    <div class="col-md-3 ">
      <label>Estado</label>
     <input type="text" class="form-control" placeholder="Estado" name="estado" >
      
      
    </div>

    

</div>
 
  <div class="row mt-3">

    
    <div class="col-md-3 ">
      <label >Nacionalidad</label>
     <input type="text" class="form-control"  placeholder="Nacionalidad"  name="nacionalidad" >
      
      
    </div>


</div>
<hr>

 
 </div>

<div class="container-fluid">
  <h5>Datos de Contacto</h5>
<div class="row">
  <div class="col-md-3">
     <label >Calle</label>
     <input type="text" class="form-control"  placeholder="Calle" name="calle">

  </div>

  <div class="col-md-3">
   <label >N° Exterior</label>
     <input type="text" class="form-control"  placeholder="Numero Exterior"  name="numero_exterior">

  </div>  

  <div class="col-md-3">
   <label >Colonia</label>
     <input type="text" class="form-control"  placeholder="Colonia"  name="colonia">

  </div>

  <div class="col-md-3">
   <label >Codigo Postal</label>
     <input type="text" class="form-control"  placeholder="Codigo Postal"  name="codigo_postal">

  </div>  
  <div class="col-md-3">
    <label>Municipio</label>
    <input type="text" class="form-control"placeholder="Municipio" name="municipio" >
  </div>

<div class="col-md-3">
    <label>Ciudad</label>
    <input type="text" class="form-control"placeholder="Ciudad" name="ciudad" >
  </div>


  <div class="col-md-3">
    <label>Telefono Celular</label>
    <input type="text" class="form-control"placeholder="Telefono Celular" name="telefono_celular" >
  </div>


  

  </div>
</div>

<hr>

  <div class="container-fluid">
    <h5>Control Escolar</h5>

    <div class="row">

      <div class="col-md-3">
    <label>Licenciatura de Procedencia</label>
    <input type="text" class="form-control"placeholder="Licenciatura de Procedencia" name="licenciatura_procedente" >
  </div>

      
      <div class="col-md-3">
        <label>Universidad Procedente</label>
           <input type="text" class="form-control"placeholder="Universidad Procedente" name="universidad_procedente" >
      </div>

      <div class="col-md-3">
        <label>Maestria Solicitada</label>
           <input type="text" class="form-control"placeholder="Maestria Solicitada" name="maestria_solicitada" >
      </div>

      <div class="col-md-3">
        <label>Generación</label>
           <input type="text" class="form-control"placeholder="Generación" name="generación">
      </div>

      <div class="col-md-3">
        <label>Turno</label>
           <input type="text" class="form-control"placeholder="Turno" name="turno"><hr>
      </div>

       <div class="col-md-3">
        <label>Grado</label>
           <input type="text" class="form-control"placeholder="Grado" name="grado"><hr>
      </div>

       <div class="col-md-3">
        <label>Grupo</label>
           <input type="text" class="form-control"placeholder="Grupo" name="grupo"><hr>
      </div>
      

      <div class="col-md-3">
        <label>Semestre</label>
        <select name="semestre" class="form-control">
         <?php foreach ($semestres as $semestre) 
                { 
                 echo '<option value="'.$semestre['id_semestre'].'"selected>'.$semestre["nombre_semestre"] .'</option>';   
             }
                    ?>
 
        </select>
         
      </div>


    </div>
    <div clas="col-md-3">
        <label>Rol</label>
        <select name="rol" class="form-control">
          <?php foreach ($rol as $roles)
          {
            echo '<option value="'.$roles["id"].'"selected>'.$roles["rol"].'</option>';
          }
          ?>
          
            </select>
        
            <div class="form-group">
                <button class="btn btn-primary" type="submit" id="registra_alumno">Registrar</button>
                

              
                <button class="btn btn-link" type="submit">Generar</button>
            </div>

            <div class="form-group">
                
            </div>



      </div>

      
    </div> 
  </form>
  
	




</body>

</body>
</html>