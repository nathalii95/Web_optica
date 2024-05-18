<?php
	session_start();
	if(!isset($_SESSION['id_empleado'])){
		header("Location:../index.php");
	}

	$nombre = $_SESSION['cargo'];
	$tipo_usuario = $_SESSION['fk_cargo'];
	
    include_once("../php/conexion.php");           
$sql = "SELECT COUNT(*) totalEmpleado FROM empleado  ";
$result = $con->query($sql);
$fila = $result->fetch_assoc();
/* <?php echo $fila2['totalCita']; ?> */
$sql2 = "SELECT COUNT(*) totalPaciente FROM paciente  ";
$result2 = $con->query($sql2);
$fila2 = $result2->fetch_assoc();

$sql3 = "SELECT COUNT(*) totalCita FROM agendamiento where estado = '1'";
$result3 = $con->query($sql3);
$fila3 = $result3->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Optica</title>
    <!-- Favicon -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/a1c839e625.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
    <!-- END CSS for this page -->

</head>

<body class="adminbody">

    <div id="main">
    <?php include ('nav.php');?> 
    <?php include ('sidebar.php');?> 
    

        <div class="content-page">
            <!-- Contenido -->
            <div class="content">

                <div class="container-fluid">


                
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Dashboard</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Inicio</li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-default">
                                <i class="far fa-user float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Empleados</h6>
                                <h1 class="m-b-20 text-white counter"><?php echo $fila['totalEmpleado']; ?></h1>
                                <br>
                                <!-- <span class="text-white">15 New Orders</span> -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-warning">
                                <i class="fas fa-user float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Pacientes</h6>
                                <h1 class="m-b-20 text-white counter"><?php echo $fila2['totalPaciente']; ?></h1> <br>
                                <!-- <span class="text-white">15 New Orders</span> -->
                            </div>
                        </div>




                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-info">
                                <i class="fas fa-calendar-day float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Citas</h6>
                                <h1 class="m-b-20 text-white counter"><?php echo $fila3['totalCita']; ?> </h1> <br>
                                <!-- <span class="text-white">25 New Users</span> -->
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                                <i class="fab fa-product-hunt float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">PRODUCTOS</h6>
                                <h1 class="m-b-20 text-white counter">2</h1> <br>
                              <!--   <span class="text-white">5 New Alerts</span> -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"></h4>
                        <p></p>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                   <!--  <h3><i class="fa fa-line-chart"></i> Items Sold Amount</h3>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
                                --> </div>

                                <div class="card-body">
                                   
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                            <!-- end card-->
                        </div>

                      
                    </div>
                    <!-- end row -->

                </div>
                <!-- END Contenido-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        <footer class="footer">
            <span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
            <span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
		</span>
        </footer>

    </div>
    <!-- END main -->

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>

    <!-- App js -->
    <script src="assets/js/pikeadmin.js"></script>

    <!-- BEGIN Java Script for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <!-- Counter-Up-->
    <script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
</body>

</html>