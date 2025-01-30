<?php
include "../../modelo/profesores/profesor.php";
include "../../conexionBD/conexion.php";

session_start();
if(isset($_SESSION["autenticado"]))
{
    if($_SESSION["autenticado"]==true)
    {
       echo "BIENVENIDO, TE HAS LOGUEADO COMO PROFESOR<br><u><b> ".$_SESSION["clave_profesor"].'</b></u>'; //echo "te estas autenticando";


    }
    
}
else
    {
        //header("Location: ../sesiones/index.php");
    }

?><br><br>
<a href="../../sesiones/validar_sesion.php">Cerrar Sesión</a>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                  
     
            </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           

        </ul>
 
        <div id="content-wrapper" class="d-flex flex-column">


                 

              
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h3>Nombre del Profesor</h3>
                        
                    </div>
                            <?php echo '<h5>'.$_SESSION["profesor"]["nomp"].'</h5>'?>
                           <br>
                        
                </div>
                
                <div class="container mt-3">
                <h3>Materias Asignadas</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Ver
                </button>
                </div>
                <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- agrego el nombre del maestro que viene de la sesion -->
      <div class="modal-header">
        <h4 class="modal-title">Materias de <?php echo $_SESSION["profesor"]["nomp"]?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      

      <?php 
      $id=$_SESSION["id"];
      $materiasprofesor=Profesor::materiaasignada($id);
     
     //var_dump($materiasprofesor);
    foreach($materiasprofesor as $materia)
     {
      echo '<ul><li>' .$materia[1].'</li></ul>';  
       //echo $materia["id_materia"];
         //echo  $materia["nombre_profesor"];
         //echo  $materia["id_semestre"];
    
     }
    ?>

    
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                
            </div>
            
                
                <!--AQUI AGREGAMOS LOS MODEL-->
                
                
 
 
                <footer class="px-2 py-2 fixed-bottom bg-dark">
    <span class="text-muted">Derechos Recervados
        <a class="text-white" href="//parzibyte.me/blog">CUM</a>
        &nbsp;|&nbsp;
        <a target="_blank" class="text-white" href="#">
            Centro Universitario Moctezuma
        </a>
    </span>
</footer>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>