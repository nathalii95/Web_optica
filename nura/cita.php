<?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
   /*  $query="SELECT a.*, p.* FROM agendamiento a, persona p where a.cedula = p.cedula SELECT a.*, p.* FROM agendamiento a, persona p where a.cedula = p.cedula "; */
   $query="SELECT a.*, pe.* FROM agendamiento a, persona pe WHERE a.cedula = pe.cedula "; 
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                                <h1 class="main-title float-left">Cita</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Inicio</li>
                                    <li class="breadcrumb-item active">Cita</li>
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
                                    <h3><i class="far fa-calendar-check"></i> Listado de Citas</h3>
                                </div>
                                <div class="card-body">
                                <button type="button" class="btn btn-warning" onclick="newCita()" >Nuevo </button><br><br>
                               <?php include ('nuevoCita.php');?> 
                                 <?php include ('modificarCita.php');?> 
                               
                                <div class="table-responsive">
                                    <table id="table_id"  class="table table-striped table-bordered table-hover text-dark display" 
                                    style="text-align: center; font-weight: bold;width:100%" >
                                        <thead>
                                            <tr style="background:#222222;color:white; text-align: center; ">
                                                 <th style="visibility:collapse;display: none;"  >ID Cita</th>
                                                 <th style="visibility:collapse;display: none;"  >hora</th>
                                                 <th style="visibility:collapse;display: none;"  >estado</th>
                                                 <th style="visibility:collapse;display: none;"  >apellido</th>                                                 
                                                 <th>Cédula</th>
                                                <th>Paciente</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                                <th style="visibility:collapse;display: none;"  >observacion</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php  while($row=$resultado->fetch_assoc()){ $hora =  $row['hora']; $estado =  $row['estado']; $fecha = $row['fecha']; ?>
                                            <tr>
                                                <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['id_agendamiento'];?></td>
                                                <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['hora'];?></td>
                                                <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['estado'];?></td>
                                                <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['apellido'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row['cedula'];?></td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row['nombre'];?> </td>
                                                <td class="text-center" style="width: 5%;"><?php echo $row['fecha'];?></td>
                                                <?php  if ($hora == 'atendido'){ ?>
                                                <td class="text-center" style="width: 5%;"></td>
                                                 
                                                <?php   } else if ($hora == '0') { ?>
                                            
                                                    <td class="text-center" style="width: 5%;">9:00 AM</td>
                                                    <?php   } else if ($hora == '1') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">9:30 AM</td>          
                                                    <?php   } else if ($hora == '2') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">10:00 AM</td>
                                    
                                        <?php   } else if ($hora == '3') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">10:30 AM</td>
                        
                                        <?php   } else if ($hora == '4') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">11:00 AM</td>
                                    
                                        <?php   } else if ($hora == '5') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">11:30 AM</td>
                                
                                        <?php   } else if ($hora == '6') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">12:00 PM</td>
                                    
                                        <?php   } else if ($hora == '7') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">12:30 PM</td>
                                
                                        <?php   } else if ($hora == '8') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">14:00 PM</td>
                                
                                        <?php   } else if ($hora == '9') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">14:30 PM</td>
                                    
                                        <?php   } else if ($hora == '10') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">15:00 PM</td>
                                
                                        <?php   } else if ($hora == '11') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">15:30 PM</td>
                                    
                                        <?php   } else if ($hora == '12') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">16:00 PM </td>
                                    
                                        <?php   } else if ($hora == '13') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">16:30 PM</td>
                                        
                                        <?php   } else if ($hora == '14') { ?>
                                            
                                            <td class="text-center" style="width: 5%;">17:00 PM</td>
                                        <?php } ?>


                                                            
                                                            <?php  date_default_timezone_set('America/Guayaquil');   if (($fecha > date("Y-m-d") ) && $estado === '1') { ?>
                                                        
                                                                <td class="text-center" style="width: 5%;">Ocupado</td>
                                                                <?php   } else if ($estado == '2') { ?>
                                                        <!-- Cancelado = Disponible-->
                                                        <td class="text-center" style="width: 5%;">Cancelado</td>

                                                                <?php   } else if ($estado == '3') { ?>
                                                        
                                                        <td class="text-center" style="width: 5%;">Atendido</td>
  
                                                    <?php   } else if ( ($fecha < date("Y-m-d") )  && $estado === '1' ) { ?>
                                                        
                                                        <td class="text-center" style="width: 5%;">Vencida</td>
                                                
                                    
                                                    <?php   }  ?>
                                                    

                                        </td>             
                                        <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['observacion'];?></td>
                                               <!-- <td class="text-center" style="width: 5%;">
                                                    <button type="button" class="btn btn-info editbtn" style="font-size: 9px;" data-toggle="tooltip" title="Editar Cita" onclick="editCita()" > <i class="far fa-edit" style="font-size: 13px;"></i></button>
                                                    <button type="button" class="btn btn-danger deletebtn" style="font-size: 9px;" data-toggle="tooltip" title="Eliminar Cita"> <i class="fas fa-trash" style="font-size: 13px;"></i></button>   
                                               </td>-->
                                               <?php  if ($estado == '3'){ ?>
                                    <td style="width: 15%;">
                                    <button type="button" class="btn btn-info editbtn" style="font-size: 9px;" disabled data-toggle="tooltip" title="Editar Cita" onclick="editCita()" > <i class="far fa-edit" style="font-size: 13px;"></i></button>
                                                    <button type="button" class="btn btn-danger deletebtn" disabled style="font-size: 9px;" data-toggle="tooltip" title="Eliminar Cita"> <i class="fas fa-trash" style="font-size: 13px;"></i></button> </td>
                                    <?php } else if ($estado == '2'){ ?>
                                    <td style="width: 15%;">
                                    <button type="button" class="btn btn-info editbtn" style="font-size: 9px;" disabled data-toggle="tooltip" title="Editar Cita" onclick="editCita()" > <i class="far fa-edit" style="font-size: 13px;"></i></button>
                                                    <button type="button" class="btn btn-danger deletebtn" disabled style="font-size: 9px;" data-toggle="tooltip" title="Eliminar Cita"> <i class="fas fa-trash" style="font-size: 13px;"></i></button>   </td>
                                    <?php } else{ ?>
                                    <td style="width: 15%;">
                                    <button type="button" class="btn btn-info editbtn" style="font-size: 9px;" data-toggle="tooltip" title="Editar Cita" onclick="editCita()" > <i class="far fa-edit" style="font-size: 13px;"></i></button>
                                     <button type="button" class="btn btn-danger deletebtn" style="font-size: 9px;" data-toggle="tooltip" title="Eliminar Cita"> <i class="fas fa-trash" style="font-size: 13px;"></i></button>   
                                    </td>
                                    <?php } ?>
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
    <script src="assets/js/cita_datatable.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="jsValidacion/cita.js"></script>
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