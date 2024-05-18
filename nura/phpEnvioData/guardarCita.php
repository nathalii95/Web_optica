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
		
		
		$cedula = $_POST['cedula'];
       
        $fecha = $_POST['fecha'];
       
        $hora = $_POST['hora'];
       
        $observacion = $_POST['observacion'];

       
        $data = mysqli_query($con, "insert into agendamiento(cedula,fecha,hora, observacion, estado) VALUES('$cedula','$fecha','$hora','$observacion','1')");

if(isset($data)){
    echo '<script>swal("Guardado", "Registro Exitosamente", "success");
    setTimeout(function() {
       window.location.href="cita.php"
   }, 5000);</script> ';


}else{
    echo '<script>swal("Error!", "Incorrecto, Error Guardar Cita", "error");
    setTimeout(function() {
       window.location.href="cita.php"
   }, 5000);</script> ';
}

		
	}
	
	
	