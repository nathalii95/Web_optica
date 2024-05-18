<?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
    $query="SELECT pe.*, pa.*, 
    IF(pa.fk_enfermedad = 0, 'Ninguna', en.nombre_enfermedad  )  as enfermedad,
    IF(pa.ojo_dominante = 0, 'Derecho', 'Izquierdo' )  as ojoDominante,
    IF(pa.estado = 0, 'Inactivo', 'Activo' )  as estadoNombre
   FROM persona pe
   JOIN paciente pa 
   ON pa.cedula = pe.cedula
   LEFT JOIN enfermedad en
   ON pa.fk_enfermedad = en.id_enfermedad
   where pa.estado = '1'
   ORDER BY  pa.created_at  asc";
	$resultado = $con->query($query);

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
                                <h1 class="main-title float-left">Paciente</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Paciente</li>
                                    <li class="breadcrumb-item active">Ingreso Paciente</li>
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
                                    <h3><i class="fas fa-user"></i> Listado de Pacientes</h3>
                                </div>
                                <div class="card-body">
                                <button type="button" class="btn btn-warning" onclick="newPaciente()" >Nuevo </button>
                                <?php include ('nuevoPaciente.php');?> 
                                <?php include ('modificarPaciente.php');?> 
                                 <?php include ('vistaPaciente.php');?><br> <br>
                                <div class="table-responsive">
                                    <table id="table_id"  class="table table-striped table-bordered table-hover text-dark display" 
                                    style="text-align: center; font-weight: bold;width:100%" >
                                        <thead>
                                            <tr style="background:#222222;color:white; text-align: center; ">
                                            <th  style="visibility:collapse;display: none;"  >ID Paciente</th>
                                                 <th>Cédula</th>
                                                <th>Paciente</th>
                                                <th>Edad</th>
                                                <th>Teléfono</th>
                                                <th>Enfermedad</th>
                                                <th>Estado</th>
                                                <th   style="visibility:collapse;display: none;"  >Nombre</th>
                                                <th   style="visibility:collapse;display: none;"  >Apellido</th>
                                                <th   style="visibility:collapse;display: none;"  >Genero</th>
                                                <th   style="visibility:collapse;display: none;"  >fecha</th>
                                                <th  style="visibility:collapse;display: none;"  >civil</th>
                                                <th  style="visibility:collapse;display: none;"  >correo</th>
                                                <th   style="visibility:collapse;display: none;"  >direccion</th>
                                                <th  style="visibility:collapse;display: none;"  >fk_enfermedad</th>
                                                <th  style="visibility:collapse;display: none;"  >ojoDominante</th>
                                                <th  style="visibility:collapse;display: none;"  >observacion</th>
                                                <th style="visibility:collapse;display: none;width: 5%">idojoDominante</th>

                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($row=$resultado->fetch_assoc()){ ?>
                                            <tr>    
                                                <td style="visibility:collapse;display: none;" style="width: 5%;"><?php echo $row['id_paciente'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['cedula'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo ucwords($row['nombre'])?> <?php echo ucwords($row['apellido'])?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['edad'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['telefono'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['enfermedad'];?></td>
                                                <td class="text-center" style="width: 5%;font-size:12px;"><?php echo $row['estadoNombre'];?></td>
                                               
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['nombre'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['apellido'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['sexo'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['fecha_nacimineto'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['estado_civil'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['correo'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['direccion'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['fk_enfermedad'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['ojoDominante'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['observacion'];?></td>
                                                <td style="visibility:collapse;display: none;width: 5%"><?php echo $row['ojo_dominante'];?></td>
  
                                                <td class="text-center" style="width: 5%;">
                                                <button type="button" class="btn btn-success seebtnPaciente" style="font-size: 9px;" onclick="seePaciente();" data-toggle="tooltip" title="Ver Informacion del Paciente" > <i class="far fa-eye" style="font-size: 13px;"></i></button>
                                                    <button type="button" class="btn btn-info editbtn" style="font-size: 9px;" data-toggle="tooltip" onclick="editPaciente();"  title="Editar Paciente" > <i class="far fa-edit" style="font-size: 13px;" ></i></button>
                                                    <button type="button" class="btn btn-danger deletebtn" style="font-size: 9px;" data-toggle="tooltip" title="Editar Paciente"> <i class="fas fa-trash" style="font-size: 13px;"></i></button>   
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
    <script src="assets/js/paciente_datatable.js"></script>
    
    <script src="assets/js/modals.js"></script>
    <script src="jsValidacion/paciente.js"></script>

    <!-- App js -->
    <script src="assets/js/pikeadmin.js"></script>

<!--  <script src="../js/jquery-3.2.1.min.js"></script> -->

    <!-- Datatables-->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">//Excel</script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">//Pdf</script>
    <script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js "></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
    <script src="https://kit.fontawesome.com/a1c839e625.js" crossorigin="anonymous"></script>

    <!-- Counter-Up-->
    <script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
    <script>
         //Se utiliza para que el campo de texto solo acepte letras
       /*   function soloLetras(e) {
             key = e.keyCode || e.which;
             tecla = String.fromCharCode(key).toString();
             letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
             especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
         
             tecla_especial = false;
             for(var i in especiales) {
                 if(key == especiales[i]) {
                     tecla_especial = true;
                     break;
                 }
             }
         
             if(letras.indexOf(tecla) == -1 && !tecla_especial){
         alert('Tecla numerica no aceptada');
                 return false;
               }
         } */
      </script>
</body>

</html>