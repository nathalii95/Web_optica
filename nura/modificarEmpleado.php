
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
      }
 }
 
 .l{
     font-weight: bold;
 }
 </style>

<?php
/* session_start();
if (@!$_SESSION['nombre']) {
  header("Location:../index.php");
}
 */
	
	

?>
 <div class="modal fade" id="modalEditEmpleado" data-bs-backdrop="static" data-bs-keyboard="false" 
 tabindex="-1" aria-labelledby="empleadoLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="empleadoLabel" >Editar Empleado</h5>
        <i class="far fa-times-circle" onclick="closeEditEmpleado()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-empleadoEdit"></div>
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Datos Personales</legend>
       <div class="row justify-content-center" >

       
       <input type="hidden" name="id_empleadoMOD" id="id_empleadoMOD">
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label class="l" >Cédula</label>
                     <input type="text" disabled class="form-control form-control-sm " name="cedula" id="cedulaMOD"   placeholder="Ingresar Cédula" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"   >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group">
                     <label class="l"  >Nombre</label>
                     <input type="text" class="form-control form-control-sm " name="nombre" id="nombreMOD" minlength="10" maxlength="60" onKeyPress="return soloLetras(event)"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group">
                     <label class="l"  >Apellido</label>
                     <input type="text" class="form-control form-control-sm " name="apellido" id="apellidoMOD"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event)" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group"  style="height: 28px;">
                     <label class="l"  >Genero</label>
                     <select  class="form-control form-control-sm " name="genero" id="generoMOD">
                     <option></option>
                      <option value="Masculino">Masculino</option>
                      <option value="Femenino">Femenino</option>
                     </select>
                 </div>
             </div>
 
            
         </div>
         <div class="row justify-content-center" >
         <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label class="l"  >Nacimiento</label>
                     <?php date_default_timezone_set('America/Guayaquil'); ?>
                     <input type="date" class="form-control form-control-sm " name="fechaNacimiento" id="fechaNacimientoMOD" max="<?php echo date("d-m-Y"); ?>"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label class="l"  >Edad</label>
                     <input type="text" class="form-control form-control-sm " name="edad" id="edadMOD" minlength="3" maxlength="3" onKeyPress="return SoloNumeros(event)" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group" >
                     <label class="l"  >Teléfono</label>
                 <input type="text" class="form-control form-control-sm " name="telefono" id="telefonoMOD" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"   >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group"  style="height: 28px;">
                     <label class="l"  >Estado Civil</label>
                     <select  class="form-control form-control-sm " name="civil" id="civilMOD">
                     <option></option>
                      <option value="Soltero">Soltero</option>
                      <option value="Casado">Casado</option>
                      <option value="Viudo">Viudo</option>
                      <option value="Divorciado">Divorciado</option>
                     </select>
                 </div>
             </div>
         </div>
 
         <div class="row justify-content-center" >
         <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
                  <div class="form-group" >
                     <label class="l"  >Correo</label>
                     <input type="email" class="form-control form-control-sm " name="correo" id="correoMOD"  >
                 </div>
             </div>
 
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
             <div class="form-group">
                     <label class="l"  >Dirección</label>
                     <input type="text" class="form-control form-control-sm " name="direccion" id="direccionMOD"  >
                 </div>
             </div>
         </div>                               
     </fieldset>
 <br>
     <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Datos Usuario </legend>
       <div class="row justify-content-left" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label class="l"  >Usuario</label>
                     <input type="text" class="form-control form-control-sm " name="usuario" id="usuarioMOD"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group">
                     <label class="l"  >Contraseña</label>
                     <input type="text" class="form-control form-control-sm " name="contrasena" id="contrasenaMOD"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group">
                     <label class="l"  >Cargo</label>
                     <select  class="form-control form-control-sm " name="cargo" id="cargoMOD">
                     <option></option>
                      <?php    $queryCargo = "SELECT * FROM cargo";
                              $resultado1 = $con->query($queryCargo);                           
                              while($row=$resultado1->fetch_assoc()){ ?>
                      <option value="<?php echo $row['id_cargo']; ?>"><?php echo $row['cargo']; ?></option>
                      <?php } ?>
                     </select>
                 </div>
             </div>
           
         </div>
                        
     </fieldset>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary"onclick="closeEditEmpleado()">Cerrar</button>
         <button type="button" class="btn btn-primary" onclick="validaEditarEmpleado()">Guardar</button>
       </div>
     </div>
   </div>
 </div>