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
		
        $id = $_POST['id'];
		$nombre = $_POST['nombre'];
        $detalleMD = $_POST['detalleMD'];
       
        $data =  mysqli_query($con, "UPDATE tipo_producto set  tipo_nombre = '$nombre', detalle = '$detalleMD', estado = '1' where id_tipo_producto = '$id'");

if(isset($data)){

                echo '<script>swal("Actualizar", "Actualización Exitosa", "success");
                       setTimeout(function() {
                          window.location.href="TipoProducto.php"
                      }, 1000);</script> ';
           
    

}else{
    echo '<script>swal("Error!", "Incorrecto, Error Actualizar Tipo Empleado", "error");
    setTimeout(function() {
       window.location.href="TipoProducto.php"
   }, 1000);</script> ';
}

		
	}
	
	
	
?>
