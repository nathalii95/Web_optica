
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/a1c839e625.js" crossorigin="anonymous"></script>
   
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="../../css/toastr.css" rel="stylesheet">
      <script src="../../js/toastr.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}</script>
</head>
<body >

<?php
error_reporting(0);
include('conexion.php');	

$numFactura = $_POST['numero'];
$empresa = $_POST['empresa'];
$ruc  = $_POST['ruc'];
$lugar = $_POST['lugar'];
$pago  = $_POST['pago'];
$fechaCompra  = $_POST['fechaCompra'];
$fechaIngreso  = $_POST['fechaIngreso'];
$observacion  = $_POST['observacion'];

$codigo=$_POST['codigo'];
$tipo=$_POST['tipo'];
$compra=$_POST['compra'];
$venta=$_POST['venta'];
$marca=$_POST['marca'];
$detalle=$_POST['detalle']; 

$data = mysqli_query($con, "insert into ingreso(num_factura,empresa,ruc,lugar,forma_pago,fecha_compra,fecha_ingreso,observaciones,estado,created_at,updated_at)
VALUES('$numFactura','$empresa','$ruc','$lugar','$pago','$fechaCompra','$fechaIngreso','$observacion','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");

if(isset($data)){
	
	$query="select max(id_ingreso) as maxId from ingreso";
	$resultado=$con->query($query);
	while ($row=$resultado->fetch_assoc()) {
	 $idFicha  = $row['maxId'];
  }

  $idFichaBD = $idFicha;
  if (isset($idFichaBD)) { 


	for($i=0; $i< count($codigo); ++$i)
   
	{ 
	 $query="INSERT INTO ingreso_dt (fk_ingreso ,codigo_producto,fk_tipo_producto,precio_compra,precio_venta,detalle ,marca ,estado,created_at,updated_at) VALUES ('".$idFichaBD."','".$codigo[$i]."','".$tipo[$i]."','".$compra[$i]."','".$venta[$i]."','".$detalle[$i]."','".$marca[$i]."','1',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";	
	 $resultado=$con->query($query);
	}	
					  if(isset($resultado)){
					  echo '<script>
					  var da = swal("Guardar!", "Guardado, Factura Inventario Guardada Exitosamente", "success");			
					  $("#result-ficha").fadeIn(1000).html(da);
					  setTimeout(function() {
						window.location.href="../inventario.php";
					}, 2000);</script> ';
		 }
 
  } else {
			echo '<script>
			alert("Error!", "Incorrecto, Error Guardar Factura Inventario");
			setTimeout(function() {
			   window.location.href="../inventario.php"
		   }, 500);</script> ';	   
  }
}

?>
    <script src="../assets/js/modernizr.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/detect.js"></script>
    <script src="../assets/js/fastclick.js"></script>
    <script src="../assets/js/jquery.blockUI.js"></script>
    <script src="../assets/js/jquery.nicescroll.js"></script>
    <script src="../assets/js/general.js"></script>
    <script src="../assets/js/modals.js"></script>
  <!--  <script src="../jsValidacion/enfermedad.js"></script>-->
 
    <script src="../assets/js/pikeadmin.js"></script>

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
    <script src="../assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>
</body>

</html>