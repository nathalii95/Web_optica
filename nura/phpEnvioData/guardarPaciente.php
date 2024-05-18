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
		$nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $genero = $_POST['genero'];
        $telefono = $_POST['telefono'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $edad = $_POST['edad'];
        $civil = $_POST['civil'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
      
        $enfermedad = $_POST['enfermedad']; 
        $ojo = $_POST['ojo']; 
        $observacion = $_POST['observacion']; 
        $data = mysqli_query($con, "insert into persona(cedula,nombre,apellido,sexo,fecha_nacimineto,edad,estado_civil, telefono, direccion , correo)
        VALUES('$cedula','$nombre','$apellido','$genero','$fechaNacimiento','$edad','$civil','$telefono','$direccion','$correo')");
    

/* 	$query="INSERT INTO persona (cedula,nombre,apellido,sexo,fecha_nacimineto,edad,estado_civil, telefono, direccion , correo) VALUES ($cedula','$nombre','$apellido','$genero','$fechaNacimiento','$edad','$civil','$telefono','$direccion','$correo')";
	$resultado1=$con->query($query);
 */
if(isset($data)){

              $query="SELECT cedula FROM persona ORDER by created_at desc LIMIT 1";
              $resultado=$con->query($query);
              while ($row=$resultado->fetch_assoc()) {
               $cedulaPaciente  = $row['cedula'];
            }

            $cedulaBD = $cedulaPaciente;
            if (isset($cedulaBD)) {
                $query="INSERT INTO paciente (cedula,fk_enfermedad,ojo_dominante,observacion,estado) VALUES ('$cedulaBD','$enfermedad','$ojo','$observacion','1')";
                $resultado=$con->query($query);        
                echo '<script>swal("Guardado", "Registro Exitosamente", "success");
                       setTimeout(function() {
                          window.location.href="paciente.php"
                      }, 5000);</script> ';
           
            } else {
 
                      echo '<script>swal("Error!", "Incorrecto, Error Guardar Paciente", "error");
                      setTimeout(function() {
                         window.location.href="paciente.php"
                     }, 5000);</script> ';
                     
            }

}else{
    echo '<script>swal("Error!", "Incorrecto, Error Guardar Paciente", "error");
    setTimeout(function() {
       window.location.href="paciente.php"
   }, 5000);</script> ';
}

		
	}
	
	
	
?>
