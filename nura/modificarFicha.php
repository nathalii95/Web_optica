<?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
    	
    $id=$_GET['id'];
    $nombre = $_SESSION['cargo'];
	$tipo_usuario = $_SESSION['fk_cargo'];
    
    	
	$query=" SELECT fpa.*,  pa.fk_enfermedad, pa.ojo_dominante,  pe.nombre, pe.apellido, pe.fecha_nacimineto, pe.edad, 
    IF(pa.fk_enfermedad = 0, 'Ninguna', en.nombre_enfermedad)  as enfermedad
   FROM persona pe
   JOIN paciente pa 
   ON pa.cedula = pe.cedula
   JOIN ficha_paciente fpa 
   ON fpa.cedula = pe.cedula
   LEFT JOIN enfermedad en
   ON pa.fk_enfermedad = en.id_enfermedad
   where fpa.id_ficha  = '$id'
   ORDER BY  pa.id_paciente ";
     $resultado=$con->query($query);
     $row=$resultado->fetch_assoc();


$idEnfermedad = $row['fk_enfermedad'];
     $ojoDominando = $row['ojo_dominante'];
     $usaLente = $row['usa_lente_a'];
     $tipoLente = $row['tipo_lente_a'];
     $tipoLenteActual =    $row['tipo_lente_n'];
     $fecha_emsion = $row['fecha_emision'];
     $motivo_consulta = $row['motivo_consulta'];
$observacion_general = $row['observacion_general'];
$referido =  $row['referido'];
$mx6_text =  $row['mx6_text'];



	?>

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

<style type="text/css">

.l{
     font-weight: bold;
 }

 #output,  #output2, #output3, #output4 table, th, td {
  border: 2px solid white;
  border-collapse: collapse;
  border: 3px solid  black;
  border-collapse: collapse;
  background-color: black;
  color:white;
}
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
                                <h1 class="main-title float-left">Ficha Médica</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Paciente</li>
                                    <li class="breadcrumb-item active">Ficha Médica</li>
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
                                    <h3><i class="fas fa-file-invoice"></i>Vista Modificar Médica</h3>
                                </div>
                                <div class="row justify-content-right "  style="margin-top: 20px;">
         <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12">
                    <a  class="btn btn-danger btn-lg"  style="font-size: 20px;" 
                    href="fichaPaciente.php" ><i class="fas fa-arrow-circle-left"></i> REGRESAR</a> 
                    </div>     </div> 
                                <div class="card-body">


         <h5 class="" id="modalFichaLabel" >Ficha Médica</h5>
       <div  id="result-fichaPaciente"></div>
           <div class="fetched-data"></div> 
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Paciente</legend>
     
       <input type="hidden"  id="idFMD" value="<?php echo $id; ?>">
       <input type="hidden"  id="tipo_usuarioFMD" value="<?php echo $tipo_usuario?>"> <!--id_usuario-->
     
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group" >
                    <label >Cédula</label>
                  <input type="text" class="form-control form-control-sm " disabled name="cedula" id="cedulaFMD" value="<?php echo $row['cedula']; ?>" >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control form-control-sm " disabled name="nombre" id="nombreFMD" value="<?php echo $row['nombre']; ?>" >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group">
                    <label >Apellido</label>
                    <input type="text" class="form-control form-control-sm " disabled name="apellido" id="apellidoFMD" value="<?php echo $row['apellido']; ?>" >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label >Nacimiento</label>
                    <input type="text" class="form-control form-control-sm " disabled name="fechaNacimiento" id="fechaNacimientoFMD" value="<?php echo $row['fecha_nacimineto']; ?>">
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-1">
                <div class="form-group">
                    <label >Edad</label>
                    <input type="text" class="form-control form-control-sm " disabled name="edad" id="edadFMD" value="<?php echo $row['edad']; ?>">
                </div>
            </div>
        </div>                            
     </fieldset>
     <fieldset class="border p-2">
      <legend class="w-auto h6 prueba">Datos Extra Paciente </legend>
      <div class="row justify-content-center" >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                <div class="form-group" >
                    <label >Enfermedad</label>
                   <select  class="form-control form-control-sm " name="enfermedad" id="enfermedadFMD">
                   <?php  if (isset($idEnfermedad)){ ?>
                    <option value="<?php echo $row['fk_enfermedad']; ?>"><?php echo $row['enfermedad']; ?></option>
                     <?php }if ($idEnfermedad !== 0) { ?>
                        <option value="0">Ninguna</option> 
                    <?php } ?>
                   <?php    $queryEnfermedad = "SELECT * FROM enfermedad WHERE estado = '1'";
	                         $resultado1 = $con->query($queryEnfermedad);     
                            
                             while($row=$resultado1->fetch_assoc()){ ?>
                              
                     <option value="<?php echo $row['id_enfermedad']; ?>"><?php echo $row['nombre_enfermedad']; ?></option>
                     <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                <div class="form-group">
                    <label >Ojo Dominante</label>
                    <select class=" form-control form-control-sm " name="ojoDominante" id="ojoDominanteFMD">
                     <?php  if ($ojoDominando == '0' ){ ?>
                        <option value="0">Derecho</option>
                        <option value="1">Izquierdo</option> 
                     <?php } else if ($ojoDominando == '1'){ ?>
                        <option value="1">Izquierdo</option> 
                        <option value="0">Derecho</option>           
                    <?php } ?>
                    </select>

                    
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                <div class="form-group">
                    <label >Fecha</label>
                    <input type="text" class="form-control form-control-sm " disabled name="fecha" id="fechaFMD" value="<?php echo $fecha_emsion; ?>" >
                </div>
            </div>
       </div>

       <div class="row justify-content-center" >  
       <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
       <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Referido</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="referidoFMD"><?php echo $referido; ?></textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
       <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Motivo Consulta</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                   id="motivoFMD"><?php echo $motivo_consulta ?></textarea>
                </div>
            </div>     
       </div>
    </fieldset>
     <!-- LENTES -->
     <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Lentes</legend>
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
            <div class="form-group" >
                     <label >Usa Lentes</label>
                    <select class="dropdown form-control form-control-sm " name="usar" id="usarFMD">
                    <?php  if ($usaLente == '0'){ ?>                      
                        <option value="<?php echo $usaLente ?>">No</option>
                        <option value="1">SI</option>
                     <?php } else if ($usaLente == '1'){ ?>
                        <option value="<?php echo $usaLente ?>">Si</option>
                        <option value="0">No</option>         
                    <?php } ?> 
                  </select>
            </div>
            </div>
          
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 " id="result-usoUnoFMD">
                <div class="form-group">
                    <label >Tipo de Diseño</label>       
                <select class="dropdown form-control form-control-sm " name="tipo" id="tipoFMD">
                    <?php  if ($tipoLente == '' ){ ?>
                        <option value="<?php echo $tipoLente ?>">Ninguna</option> 
                        <option value="1">Monofocal</option>
                        <option value="2">Bifocal</option>
                        <option value="3">Progesivo</option>
                        <option value="4">Otros</option>      
                     <?php } else if ($tipoLente == '1'){ ?>
                        <option value="<?php echo $tipoLente ?>">Monofocal</option>
                        <option value="2">Bifocal</option>
                        <option value="3">Progesivo</option>
                        <option value="4">Otros</option>
                    <?php } else if ($tipoLente == '2'){ ?>
                     <option value="<?php echo $tipoLente ?>">Bifocal</option>
                     <option value="1">Monofocal</option>
                     <option value="3">Progesivo</option>
                     <option value="4">Otros</option>

                    <?php } else if ($tipoLente == '3'){ ?>
                        <option value="<?php echo $tipoLente ?>">Progesivo</option>
                        <option value="1">Monofocal</option>
                        <option value="2">Bifocal</option>
                        <option value="4">Otros</option>
                    <?php } else if ($tipoLente == '4'){ ?>
                     <option value="<?php echo $tipoLente ?>">Otros</option>
                     <option value="1">Monofocal</option>
                     <option value="2">Bifocal</option>
                     <option value="3">Progesivo</option>            
                    <?php } ?>
                 </select>
               
                </div>
                <input type="hidden" class="form-control" style="border: 2px solid green;" id="usaAntiguoFMD" value="<?php echo $row['usa_antiguo']; ?>">
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" ><!-- id="result-usoDos"  -->
             <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                   id="observacion1FMD"><?php echo $observacion_general; ?></textarea>
                </div>
             </div>
       </div>                            
     </fieldset>
     <fieldset class="border p-2"  id="result-usoTresFMD">
       <legend class="w-auto h6 prueba">Medidas de Lentes Antiguo</legend>
       <div class="row justify-content-center" style="margin-top:-10px;">
           <!-- -->
           <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" >
               <div id="output"></div>
           </div>  
       </div>                            
     </fieldset>
 


     <fieldset class="border p-2"  id="optomestristaAdmin">
       <legend class="w-auto h6 prueba">Optometrista</legend>
       <fieldset class="border p-2 mt-8">

       <legend class="w-auto h6 prueba">Agudeza Visual Lejos</legend>
       <div class="row justify-content-center" style="margin-top:10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" >
           <div id="output2" class="table-responsive">
    </div>    
       </div>  
       <div class="row justify-content-center" >
         </div>  
       </fieldset> 
       <br>
       <fieldset class="border p-2 mt-8">
       <legend class="w-auto h6 prueba">Agudeza Visual Proxima (Lectura)</legend>
       <div class="row justify-content-center" style="margin-top:-10px;"  >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" >
            <div id="output3"></div>
            </div>
       </div>  
       </fieldset>   


       <fieldset class="border p-2 mt-8" >
       <legend class="w-auto h6 prueba">Medida Lentes Actual</legend>
       <div class="row justify-content-center" style="margin-top:-10px;" >
       <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4 ">
       <input type="hidden" class="form-control" id="usaNuevoMD" value="">
                <div class="form-group">
                    <label >Tipo de Diseño</label>
                    <select class="dropdown form-control form-control-sm " name="tipo2" id="tipoOptMD">
                    <?php  if ($tipoLenteActual == '' ){ ?>
                        <option value="<?php echo $tipoLenteActual; ?>">Ninguna</option>
                     <?php } else if ($tipoLenteActual == '1'){ ?>
                        <option value="<?php echo $tipoLenteActual; ?>">Monofocal</option>
                    <?php } else if ($tipoLenteActual == '2'){ ?>
                        <option value="<?php echo $tipoLenteActual; ?>">Bifocal</option>
                    <?php } else if ($tipoLenteActual == '3'){ ?>
                        <option value="<?php echo $tipoLenteActual; ?>">Progesivo</option>
                    <?php } else if ($tipoLenteActual == '4'){ ?>
                        <option value="<?php echo $tipoLenteActual; ?>">Otros</option>
                    <?php } ?>                   
                     <option value="1">Monofocal</option>
                     <option value="2">Bifocal</option>
                     <option value="3">Progesivo</option>
                     <option value="4">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-8" >
            <div id="output4"></div>
            </div>
       </div>  

         </fieldset>    
         <fieldset class="border p-2 mt-8">
       <legend class="w-auto h6 prueba">D.X.</legend>
         <div class="row justify-content-center" >
<div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12"  id=dataCheck>
                    
                 <div class="form-group">         
 <input type="checkbox" id="inlineCheckbox1MD"> HIPERMETROPIAO <br>
<input type="checkbox" id="inlineCheckbox2MD"> MIOPIA <br>
<input type="checkbox" id="inlineCheckbox3MD"> ASTIGMATISMO <br>
<input type="checkbox" id="inlineCheckbox4MD"> BILATERAL <br>
<input type="checkbox" id="inlineCheckbox5MD"> PRESBICIA <br>
<input type="checkbox" id="inlineCheckbox6MD"  id="inlineCheckbox6MD" onchange="changeOtrosMD()"> Otros 
 <input type="text" class="form-control form-control-sm"  id="otrosMD" disabled  value="<?php echo $mx6_text; ?>">
                </div>
         
         </div>
 
         </fieldset>   


         <fieldset class="border p-2 mt-8">
       <legend class="w-auto h6 prueba">Producto</legend>
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12" >
           
  <div class="input-group pt-0 ">
    <label  class="col-md-2  mt-4 l" >ARMAZON</label>
    <input type="hidden" name="armazon" id="armazonMD" value="Armazon">
    <div class="col-md-4">
    <legend class="w-auto h6 l text-center">Codigo/Nombre</legend>
                    <input  class="form-control form-control-sm" list="nameSearchse" name="armazonCodigo" id="armazonCodigoMD" type="text"  autofocus>
                    <datalist id="nameSearchse">
                    <option select value="Buscar Armazon"></option>
                     <?php $queryCargo = "SELECT  dt.*, tp.tipo_nombre FROM ingreso_dt dt,  tipo_producto tp
                       WHERE dt.fk_tipo_producto = '1' AND dt.fk_tipo_producto = tp.id_tipo_producto AND dt.estado = '1' ";
                       $resultado1 = $con->query($queryCargo);
                       while($row2=$resultado1->fetch_assoc()){ ?>
                        <option value="<?php echo $row2['codigo_producto']; ?>">
                     <?php } ?>
                    </datalist>   
    </div>

    <div class="col-md-4">
    <legend class="w-auto h6 l text-center">Valor</legend>
      <input type="text" class="form-control" id="armazonValormd" style="border: 2px solid green;" onkeyup="SumaTotalMD()" >
    </div>
  </div>

  <div class="input-group pt-0  mt-4" >
    <label  class="col-md-2 l" >LUNAS</label>
    <input type="hidden" name="luna" id="lunaMD" value="Lunas" >
    <div class="col-md-4">
      <select  class="form-control form-control-sm " name="lunasCodigo" id="lunasCodigoMD" >
               
                   <?php    $query = "SELECT * FROM tipo_lente";
	                         $resultado1 = $con->query($query);                            
                             while($row=$resultado1->fetch_assoc()){ ?>
                     <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                     <?php } ?>
                    </select>
    </div>
    <div class="col-md-4">
      <input type="number" class="form-control" id="lunasValormd" style="border: 2px solid green;" onkeyup="SumaTotalMD()" >
    </div>
  </div>
  <div class="input-group pt-0  mt-4" >
    <label  class="col-md-2 l" style="color:red;">TOTAL (Incluye Iva)</label>
    <div class="col-md-2">   
    </div>
    <div class="col-md-2">
    <span style="color:green;font-weight:bold;float:right;">$</span>
    </div>
    <div class="col-md-4">
      <input type="number" class="form-control" style="border: 2px solid green;" id="totalValormd" >  
    </div>
  </div>


            </div>
       </div>  

 
         </fieldset>  


     </fieldset>
  

     <div class="row justify-content-center" >
<div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12 mt-4">
                <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="observacion6md"></textarea>
                </div>
            </div>
         </div> 

         </div> 

 

         
    
                            </div>
                            <div class="row justify-content-right " style="float:right;" >
         <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12 mt-10">
         <button class="btn btn-primary btn-lg"  onclick="validaEditFicha()" 
                    style="font-weight: bold;font-size:14px;letter-spacing: 1px; cursor:pointer" id="btnUpdate">
                    <i class="fa fa-floppy-o fa-lg" aria-hidden="true" style="font-size: 20px; margin-right:5px; ">
                    </i>ACTUALIZAR</button>
                    </div>     </div>                 <!-- end card-->
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
    <script src="assets/js/general.js"></script>
<!--   <script src="assets/js/modals.js"></script> -->
    <script src="jsValidacion/fichaEditPaciente.js"></script>
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