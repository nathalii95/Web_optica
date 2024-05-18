<?php 
include_once "conexion.php";
sleep(1);
if (isset($_POST)) {
  $cedula = $_POST['cedula']; 
  $nombre = $_POST['nombre']; 
  $apellido = $_POST['apellido']; 
/* ESTADOS
   1 OCUPADO
   2 DISPONIBLE
   3 ATENDIDO
   *--- ESTADOS DE VISTA 
   CANCELADO QUE SE CONVIERTE A 2
*/ 
/*  echo '<p>'.$cedula.'</p>'.'<br>';
echo '<p>'.$fecha.'</p>'.'<br>';
echo '<p>'.$hora.'</p>';
echo '<p>'.$fecha.'</p>';
echo '<p>'.$name.'</p>'; 
echo '<br>';*/
                  $query="SELECT a.*, p.* FROM agendamiento a, persona p WHERE a.cedula = p.cedula ";
                  $resultado=$con->query($query);
                  while ($row=$resultado->fetch_assoc()) {
                   $cedulacita  = $row['cedula'];
                   $estadoCita  = $row['estado'];
                   $nombre_paciente = $row['nombre'];
                   $apellido_paciente = $row['apellido'];
               
if($cedulacita == $cedula && $estadoCita == '1'){  
 /*    echo '<script>
    swal("OH NO!", "CITA EXISTENTE!, para este Paciente '.$nombre.' ' . ' '. $apellido.', Cancele Cita para volver a registrar ", "error");  
   </script> ';  */

   echo '<script>
   swal("OH NO!", "CITA EXISTENTE!, para este Paciente, Cancele Cita para volver a registrar ", "error");
  $("#nombre").val("");
  $("#apellido").val("");  
  document.getElementById("btnGuardar").disabled = true;  
  document.getElementById("fecha").disabled = true; 
  document.getElementById("hora").disabled = true;  
 </script> '; 
  }              
 }    /*             echo '<p>'.$cedulacita.'</p>'; */

} 
    
