<?php

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Centro Universitario Moctezuma</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="style.css" rel="stylesheet">

</head>
<body>
    

<!--<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <h2>Centro Universitario Moctezuma</h2>
            <div class="col-12 user-img">
                <img src="../img/user.png" style="width:100%"><br><br>
            </div>
            <form class="col-12" action="../controlador/maneja_sesiones.php" method="post">

                <div class="form-group" >
                    <input type="text" class="form-group" placeholder="Ingresa Matricula" name="matricula" >
                </div>
                <div class="form-group">
            <label >SELECCIONA TU ROOL </label>

                    <select class="form-control" name="rol" required>
                    <option value="1">ADMINISTRADOR</option>
                    <option value="2">ALUMNO</option>
                    <option value ="3">PROFESOR</option>
                    
                    </select>
                </div>
    
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Ingresar</button>     
            </form>
            
           
            

        </div>
    </div>
</div>


-->

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="../img/logo_cum.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Ingresa tus datos</h4>
                </div>

<form class="col-12" action="../controlador/maneja_sesiones.php" method="post">

<div class="form-group" >
    <input type="text" class="form-control form-control-user" placeholder="Ingresa Matricula" name="matricula" >
</div>
<div class="form-group">
<label >SELECCIONA TU ROOL </label>

    <select class="form-control" name="rol" required>
    <option value="1">ADMINISTRADOR</option>
    <option value="2">ALUMNO</option>
    <option value ="3">PROFESOR</option>
    
    </select>
</div>

<button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Ingresar</button>     
</form>


</div>
</div>

           
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
             
                
                <p class="small mb-0"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






</body>
</html>