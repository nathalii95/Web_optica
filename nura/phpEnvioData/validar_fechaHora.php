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
include_once "conexion.php";
sleep(1);
if (isset($_POST)) {
  $cedula = $_POST['cedula']; 
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];

/* ESTADOS
   1 OCUPADO
   2 DISPONIBLE
   3 ATENDIDO
   *--- ESTADOS DE VISTA 
   CANCELADO QUE SE CONVIERTE A 2
*/ 
                  $query="SELECT a.*, p.* FROM agendamiento a, persona p  WHERE a.hora = '".$hora."' AND a.fecha = '".$fecha."' AND a.cedula = p.cedula AND a.estado = '1'";
                  $resultado=$con->query($query);
                  while ($row=$resultado->fetch_assoc()) {
                    $idAgendamiento  = $row['id_agendamiento'];
                   $cedulacita  = $row['cedula'];
                   $fechacita = $row['fecha'];
                   $horacita  = $row['hora'];
                   $estadoCita  = $row['estado'];
                   $nombre_paciente = $row['nombre'];
                   $apellido_paciente = $row['apellido'];
    /* 
                   echo '<p>'.$cedulacita.'///'.$cedula.'</p>'.'<br>';
                   echo '<p>'.$horacita.'///'.$hora.'</p>'.'<br>';    
                   echo '<p>'.$fechacita.'///'.$fecha.'</p>'.'<br>';
                   echo '<p>'.$estadoCita.'</p>'; */

                   }
  /* 
                   echo '<p>'.$cedulacita.'///'.$cedula.'</p>'.'<br>';
                   echo '<p>'.$horacita.'///'.$hora.'</p>'.'<br>';    
                   echo '<p>'.$fechacita.'///'.$fecha.'</p>'.'<br>';
                   echo '<p>'.$estadoCita.'</p>'; */
              
if($cedulacita !== $cedula && $horacita==$hora && $fechacita==$fecha ){
echo '<script>
document.getElementById("btnGuardar").disabled = true;  
</script> '; 
echo '<div class="alert  alert-danger" ><strong> Oh no!</strong> Hora y Fecha <strong>OCUPADA</strong> </div>';

}
else if ( $cedulacita !== $cedula && $horacita!==$hora && $fechacita!==$fecha ){
echo '<script>
document.getElementById("btnGuardar").disabled = false;

</script> '; 
echo '<div class="alert alert-success" ><strong>Enhorabuena!</strong> Cita Disponible.</div>';

} 
} 
   
