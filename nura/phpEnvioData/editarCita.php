
<?php

	require "conexion.php";
	
	session_start();
	
	if($_POST){
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $estado = $_POST['estado'];
        $observacion = $_POST['observacion'];
/* 
        echo '<p>'.$id.'</p>'.'<br>';
        echo '<p>'.$fecha.'</p>'.'<br>';    
        echo '<p>'.$hora.'</p>'.'<br>';
        echo '<p>'.$estado.'</p>';
        echo '<p>'.$observacion.'</p>'; 
        echo '<p>xxxxx</p>'; */
       
        $data =  mysqli_query($con, "UPDATE agendamiento SET fecha = '$fecha',  hora = '$hora', observacion = '$observacion', estado = '$estado', updated_at  = CURRENT_TIMESTAMP  WHERE  id_agendamiento = '$id' ");

if(isset($data)){

                echo '<script>swal("Actualizar", "Actualización Exitosa", "success");
                       setTimeout(function() {
                          window.location.href="cita.php"
                      }, 1000);</script> ';
           
    

}else{
    echo '<script>swal("Error!", "Incorrecto, Error Actualizar Cita", "error");
    setTimeout(function() {
       window.location.href="cita.php"
   }, 1000);</script> ';
}

		
	}
	
	
	
?>
