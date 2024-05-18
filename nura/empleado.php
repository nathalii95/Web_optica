<?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
    $query=" SELECT en.*, pe.*, ca.*, IF(en.estado = 0, 'Inactivo', 'Activo' )  as estadoNombre
    FROM empleado en, persona pe, cargo ca
    WHERE en.fk_cargo = ca.id_cargo
    AND en.cedula = pe.cedula
    AND en.estado = '1'
    ORDER BY  en.id_empleado ASC ";
	$resultado=$con->query($query);
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
<style>

 </style>
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
                                <h1 class="main-title float-left">Empleado</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Inicio</li>
                                    <li class="breadcrumb-item active">Empleado</li>
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
                                    <h3><i class="far fa-user"></i> Listado de Empleados</h3>
                                </div>
                                <div class="card-body">
                                <button type="button" class="btn btn-warning" onclick="newEmpleado()" >Nuevo </button>
                                <?php include ('nuevoEmpleado.php');?> <br> <br>
                                 <?php include ('modificarEmpleado.php');?> 
                                 <?php include ('vistaEmpleado.php');?> 
                                 
                                <div class="table-responsive">
                                    <table id="table_id"  class="table table-striped table-bordered table-hover text-dark display" 
                                    style="text-align: center; font-weight: bold;width:100%" >
                                        <thead>
                                            <tr style="background:#222222;color:white; text-align: center; ">
                                            <th  style="visibility:collapse;display: none;"  >ID Paciente</th>
                                                <th>Cédula</th>
                                                <th>Empleado</th>
                                                <th   style="visibility:collapse;display: none;"  >Nombre</th>
                                                <th   style="visibility:collapse;display: none;"  >Apellido</th>
                                                <th   style="visibility:collapse;display: none;"  >Genero</th>
                                                <th   style="visibility:collapse;display: none;"  >fecha</th>
                                                <th   style="visibility:collapse;display: none;"  >edad</th>

                                                <th>Teléfono</th>
                                                <th  style="visibility:collapse;display: none;"  >estado</th>
                                                <th  style="visibility:collapse;display: none;"  >correo</th>
                                                <th   style="visibility:collapse;display: none;"  >direccion</th>
                                                <th  style="visibility:collapse;display: none;"  >usuario</th>
                                                <th  style="visibility:collapse;display: none;"  >contrasena</th>
                                                <th  style="visibility:collapse;display: none;"  >id_cARGA</th>
                                                <th>Cargo</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($row=$resultado->fetch_assoc()){ 
                                            $data = $row['cedula'];
                                            
                                            ?>
                                            <tr  class="text-center" style="width: 100%;">
                                            <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['id_empleado'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['cedula'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo ucwords($row['nombre'])?>  <?php echo ucwords($row['apellido'])?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['nombre'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['apellido'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['sexo'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['fecha_nacimineto'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['edad'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['telefono'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['estado_civil'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['correo'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['direccion'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['usuario'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['contrasena'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['fk_cargo'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['cargo'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['estadoNombre'];?></td>
                                               <td style="width: 5%;">
                                                   <button type="button" class="btn btn-success seebtn btn-sm" style="font-size: 9px;" data-toggle="tooltip" onclick="seeEmpleado();" title="Ver Informacion del Empleado" > <i class="far fa-eye " style="font-size: 13px;"></i></button>
            
                                                   <button type="button" class="btn btn-info editbtn btn-sm" style="font-size: 9px;" data-toggle="tooltip" title="Editar Paciente"   onclick="editEmpleado();"> <i class="far fa-edit "  style="font-size: 13px;"></i></button>
                                
                                                   <button type="button" class="btn btn-danger deletebtn btn-sm" style="font-size: 9px;" data-toggle="tooltip" title="Editar Paciente"> <i class="fas fa-trash"  style="font-size: 13px;"></i></button>            
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
    <script src="assets/js/empleado_datatable.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="jsValidacion/empleado.js"></script>
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


    <script>

</script>



    
</body>

</html>