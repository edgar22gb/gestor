<?php
include_once "encabezado.php";
include_once "vista/pie.php";
include_once "conexionBD/conexion.php";
include_once "modelo/Estudiantes.php";

$hombres = Estudiantes::total_hombres();
$mujeres=Estudiantes::total_mujeres();
$total=Estudiantes::total_alumnos();

session_start();
if(isset($_SESSION["autenticado"]))
{
    if($_SESSION["autenticado"]==true)
    {
        echo "BIENVENIDO, TE HAS LOGUEADO COMO ADMINISTRADOR<br><u><b> ".$_SESSION["nombre"].'</b></u>'; //echo "te estas autenticando";


    }
    
}
else
    {
        header("Location: sesiones/index.php");
    }
    
?><BR>
<a href="sesiones/validar_sesion.php">Cerrar Sesión</a>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
  </head>

    

    <title>Centro Universitario Moctezuma</title>
</head>




  <body style="background-color:#fff">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              
                 
                  
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">#SOMOSCUM</span>
            </a>

            
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index2.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>INICIO</div>
              </a>
            </li>

            <!-- Layouts -->
           

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">PÁGINAS</span>
            </li>

           	<li class="menu-item">
           		<a href="#seccion1" class="menu-link menu-toggle">
           			<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
           		<div>ALUMNOS</div>
           	</a>
           	</li>
            <li class="menu-item">
              <a href="#seccion2" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div >MATERIAS</div>
              </a>
             
            <li class="menu-item">
              <a href="#seccion3" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">MAESTROS</div>
              </a>
             
            </li><br>
          <li>
          <a>
          <li class="menu-item">
              <a href="#" class="menu-link">
                <i></i>
                <div>TOTAL DE ALUMNOS:<?php echo '<b>' .$total['total'].'</b>';?></div>
              </a>
             
            </li>
            <li class="menu-item">
              <a href="#" class="menu-link ">
                <i class="tf-icons "></i>
                <div>Hombres:<?php echo '<b>'.$hombres['hombres'].'</b>';?></div>
              
            </li>

            <li class="menu-item">
              <a href="#" class="menu-link">
              <i class="tf-icons "></i>
                
                <div >Mujeres:<?php echo '<b>'.$mujeres['mujeres'].'</b>';?></div>
                  
                  
                 
               
              </a>
          </li>
        </aside>
       

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

        
      

      
        
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div id="seccion1" class="content-wrapper">
          	<div class=" flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Alumnos 🎉</h5>
                          <p class="mb-4">
                            Más detalles de los alumnos
                          </p>

                          <a href="vista/mostrar_estudiantes.php" class="btn btn-sm btn-outline-primary">Registro de alumnos</a>
                          <a href="vista/mostrar_oficios.php" class="btn btn-sm btn-outline-primary">Oficios</a>
                          <a href="vista/mostrar-pagos.php" class="btn btn-sm btn-outline-primary">Pagos</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            


            	<!--AGREGO LA COLUMNA PARA LOS ALUMNOS-->
            	<div id="seccion2" class="flex-grow-1 container-p-y">
            		<div class="row">
            			<div class="col-12 mb-4 order-0">
            				<div class="card">
            					<div class="d-flex align-items-end row">
            						<div class="col-sm-7">
            							<div class="card-body">
            								<h5 class="card-title text-primary">Materias</h5>
            								<p class="mb-4">Detalles de materias</p>
            								<a href="vista/mostrar_materias.php" class="btn btn-sm btn-outline-primary">Registro</a>
            							</div>
            						</div>
            						<div class="col-sm-5 text-center text-sm-left">
            							<div class="card-body pb-0 px-0 px-md-4">
            								 <img
                            src="assets/img/illustrations/carga-materia.jpg"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/carga-materia.jpg"
                            data-app-light-img="illustrations/carga-materia.jpg"
                          />
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            		
            	</div>



                
                <!-- Total Revenue -->
                <div id="seccion3" class=" flex-grow-1 container-p-y">
                  <div class="row">
                      <div class="col-12 mb-4 order-0">
                      	<div class="card">
                      		<div class="d-flex align-items-end row">
                      			<div class="col-sm-7">
                      				<div class="card-body">
                         <h5 class="card-title text-primary">Maestros 🎉</h5>
                          <p class="mb-4">
                          Más Detalles de los Maestros
                          </p>
                          <a href="vista/mostrar_profesores.php" class="btn btn-sm btn-outline-primary">Registro</a>
                      </div>
                  </div>

                  <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/docente.jpg"
                            height="140"
                            
                            data-app-dark-img="illustrations/docente.jpg"
                            data-app-light-img="illustrations/docente.jpg"
                          />
                        </div>
                      </div>
                  </div>
              </div>


              
</div>







          </div>
          </div>
            <!-- Content -->

            
                        
                       
                        

                    
                
          
           

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

