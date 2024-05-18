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
      
        $usuario = $_POST['usuario']; 
        $contrasena = $_POST['contrasena']; 

        $cargo = $_POST['cargo']; 

        $data =  mysqli_query($con, "UPDATE empleado set  usuario = '$usuario' , contrasena = '$contrasena' , estado = '1', fk_cargo = '$cargo' , updated_at  = CURRENT_TIMESTAMP  where id_empleado = '$id'");
        
        /* mysqli_query($con, "insert into persona(cedula,nombre,apellido,sexo,fecha_nacimineto,edad,estado_civil, telefono, direccion , correo)
        VALUES('$cedula','$nombre','$apellido','$genero','$fechaNacimiento','$edad','$civil','$telefono','$direccion','$correo')");
     */

     

/* 	$query="INSERT INTO persona (cedula,nombre,apellido,sexo,fecha_nacimineto,edad,estado_civil, telefono, direccion , correo) VALUES ($cedula','$nombre','$apellido','$genero','$fechaNacimiento','$edad','$civil','$telefono','$direccion','$correo')";
	$resultado1=$con->query($query);
 */
if(isset($data)){

              $query="SELECT cedula FROM empleado ORDER by updated_at desc LIMIT 1";
              $resultado=$con->query($query);
              while ($row=$resultado->fetch_assoc()) {
               $cedulaPaciente  = $row['cedula'];
            }

            $cedulaBD = $cedulaPaciente;
            if (isset($cedulaBD)) {
                $query="UPDATE persona set nombre  = '$nombre', apellido  = '$apellido', sexo = '$genero', fecha_nacimineto = '$fechaNacimiento' , edad  = '$edad',estado_civil = '$civil', telefono  = '$telefono', direccion  = '$direccion' , correo  = '$correo', updated_at  = CURRENT_TIMESTAMP  where cedula = '$cedulaBD' ";
                
               /*  echo $query; */
                $resultado=$con->query($query);
              
                echo '<script>swal("Actualizar", "Actualización Exitos", "success");
                       setTimeout(function() {
                          window.location.href="empleado.php"
                      }, 1000);</script> ';
           
            } else {
 
                      echo '<script>swal("Error!", "Incorrecto, Error Actualizar Empleado", "error");
                      setTimeout(function() {
                         window.location.href="empleado.php"
                     }, 1000);</script> ';
                     
            }

}else{
    echo '<script>swal("Error!", "Incorrecto, Error Actualizar Empleado", "error");
    setTimeout(function() {
       window.location.href="empleado.php"
   }, 1000);</script> ';
}

		
	}
	
	
	
?>
