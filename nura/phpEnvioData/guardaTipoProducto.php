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
<?php

	require "conexion.php";
	
	session_start();
	
	if($_POST){
		
		
		$tipoProduct = $_POST['tipoProduct'];
        $detalle = $_POST['detalle'];

        $data = mysqli_query($con, "insert into tipo_producto(tipo_nombre, detalle, estado) VALUES('$tipoProduct','$detalle','1')");

if(isset($data)){
    echo '<script>swal("Guardado", "Registro Exitosamente", "success");
    setTimeout(function() {
       window.location.href="TipoProducto.php"
   }, 5000);</script> ';


}else{
    echo '<script>swal("Error!", "Incorrecto, Error Guardar  Tipo Producto", "error");
    setTimeout(function() {
       window.location.href="TipoProducto.php"
   }, 5000);</script> ';
}

		
	}
	
	
	
    
   
	
	
	
?>
