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

       
        $data =  mysqli_query($con, "UPDATE enfermedad set  nombre_enfermedad = '$nombre', estado = '1' where  	id_enfermedad = '$id'");

if(isset($data)){

                echo '<script>swal("Actualizar", "Actualización Exitosa", "success");
                       setTimeout(function() {
                          window.location.href="enfermedad.php"
                      }, 1000);</script> ';
           
    

}else{
    echo '<script>swal("Error!", "Incorrecto, Error Actualizar Empleado", "error");
    setTimeout(function() {
       window.location.href="enfermedad.php"
   }, 1000);</script> ';
}

		
	}
	
	
	
?>
