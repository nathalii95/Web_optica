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
}
function limpiarCampos(){
    $("#usuario").val('');
	$("#contrasena").val('');
}
</script>
<?php

	require "conexion.php";
	
	session_start();
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['contrasena'];
	
		$sql = "SELECT e.id_empleado, e.contrasena, e.usuario, e.fk_cargo, c.cargo , e.estado, p.*
			   FROM empleado e, cargo c , persona p
			   WHERE e.fk_cargo = c.id_cargo 
			   and e.usuario = '$usuario' 
			   and e.cedula = p.cedula
			   and e.estado = '1'";
		/* echo $sql; */
		$resultado = $con->query($sql);
		$num = $resultado->num_rows; 
	if($num>0) {
						$row = $resultado->fetch_assoc();
						$password_bd = $row['contrasena'];				
						$pass_c = ($password);
						
						if($password_bd == $pass_c){
							
							$_SESSION['id_empleado'] = $row['id_empleado'];
							$_SESSION['nombre'] = $row['nombre'];
							$_SESSION['cargo'] = $row['cargo'];
							$_SESSION['usuario'] = $row['usuario'];
							$_SESSION['fk_cargo'] = $row['fk_cargo'];

							echo '<script>   
										swal({
											title: "Atención!!",
											text: "Bienvenido al Sistema",
											icon: "warning",
											buttons: true,
											dangerMode: true,
										}).then((result) => {
											if (result) {
												window.location.href = "./nura/index.php";
											} else {
												location.reload();
											}
										});
			
							</script> ';

						} else{
							echo '<script>swal("Error!", "Contraseña Incorrecta", "error");
							limpiarCampos();</script> ';
						}
			
				}else{
					echo '<script>swal("Error!", "Usuario No Existe", "error");
					limpiarCampos();</script> ';
 	

				 }
		
		
		
	}
	
	
	
?>
