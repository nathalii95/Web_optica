<?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
    $query="SELECT id.*, t.tipo_nombre, e.nombre , i.num_factura
    FROM  ingreso_dt id, tipo_producto t, estado_ingreso e , ingreso i
    WHERE  id.fk_tipo_producto  = t.id_tipo_producto AND id.estado = e.id_estado
    AND id.fk_ingreso = i.id_ingreso";
	$resultado=$con->query($query);
    $num = 0;
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

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="../css/toastr.css" rel="stylesheet">
      <script src="../js/toastr.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




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
                                <h1 class="main-title float-left"> Consulta</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Inicio</li>
                                    <li class="breadcrumb-item active">Consulta Inventario/Stock</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-search"></i> Consulta de Inventario</h3>
                                </div>
                                <div class="card-body">
                                <a type="button" class="btn btn-danger" href="inventario.php" >Regresar Ingreso </a><br><br>
                         


                                <div class="row  mt-2" style="height: 550px;margin-top:-12px;">
                <div class="col-md-12  table-responsive responsive-table">
                    <!-- <div class="container">
                        <div class="row"> -->
                        <table style="width:100%" id="tablaconsulta" class="table  text-center">
                            <thead style="background-color: rgba(203, 100, 100, 0.85); color: black;">
                                <tr>                
                                <th  style="width: 10%;text-align: center;" scope="col">Factura</th>
                                    <th  style="width: 10%;text-align: center;" scope="col">Código Producto</th>
                                    <th style="width: 10%;text-align: center;" scope="col">Tipo Producto</th>
                                    <th style="width: 10%;text-align: center;" scope="col">Precio Compra</th>
                                    <th style="width: 10%;text-align: center;" scope="col">Precio Venta</th>
                                    <th style="width: 10%;text-align: center;" scope="col">Marca</th>
                                    <th style="width: 8%;text-align: center;" scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php  while($row1=$resultado->fetch_assoc()){ ?>
                                              <tr>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['num_factura'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['codigo_producto'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['tipo_nombre'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['precio_compra'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['precio_venta'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['marca'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row1['nombre'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                            </table>
                          
                    <!--     </div> 
                    </div>-->
                </div>
             </div> 








                         

                                </div> 
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
		Copyright <a target="_blank" href="#">Optica</a>
		</span>
        </footer>

    </div>
    <!-- END main -->

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    
    <script src="assets/js/consulta_datatable.js"></script> 
<!--     <script src="assets/js/general.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="jsValidacion/cargo.js"></script> -->
    <!-- App js -->
    <script src="assets/js/pikeadmin.js"></script>

    <!-- Datatables-->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">//Excel</script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">//Pdf</script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js "></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
    

    <!-- Counter-Up-->
    <script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
</body>

</html>