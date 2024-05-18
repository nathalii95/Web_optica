
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
      }
 }
 
 
 
 </style>
 <div class="modal fade" id="modalEditPaciente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="modalEdiPacienteLabel" >Modificar Paciente</h5>
        <i class="far fa-times-circle" onclick="closeEdiPaciente()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-editPaciente"></div>
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Datos Personales</legend>
       <div class="row justify-content-center" >
       <input type="hidden" name="id_pacienteMOD" id="id_pacienteMOD">
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label >Cédula</label>
                     <input type="text" class="form-control form-control-sm " name="cedula" id="cedulaMOD" disabled placeholder="Ingresar Cédula" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"   >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group">
                     <label >Nombre</label>
                     <input type="text" class="form-control form-control-sm " name="nombre" id="nombreMOD"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event)"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group">
                     <label >Apellido</label>
                     <input type="text" class="form-control form-control-sm " name="apellido" id="apellidoMOD"   minlength="10" maxlength="60" onKeyPress="return soloLetras(event)" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group"  style="height: 28px;">
                     <label >Genero</label>
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
                     <label >Nacimiento</label>
                                      <?php date_default_timezone_set('America/Guayaquil'); ?>
                     <input type="date" class="form-control form-control-sm " name="fechaNacimiento" id="fechaNacimientoMOD"  max="<?php echo date("d-m-Y"); ?>"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label >Edad</label>
                     <input type="text" class="form-control form-control-sm " name="edad" id="edadMOD" minlength="3" maxlength="3" onKeyPress="return SoloNumeros(event)"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group" >
                     <label >Teléfono</label>
                 <input type="text" class="form-control form-control-sm " name="telefono" id="telefonoMOD" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group"  style="height: 28px;">
                     <label >Estado Civil</label>
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
                     <label >Correo</label>
                     <input type="email" placeholder="ejemplo@ejemplo.com" class="form-control form-control-sm " name="correo" id="correoMOD"  >
                 </div>
             </div>
 
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
             <div class="form-group">
                     <label >Dirección</label>
                     <input type="text" class="form-control form-control-sm " name="direccion" id="direccionMOD"  >
                 </div>
             </div>
         </div>                             
     </fieldset>
 <br>
     <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Datos Extra Paciente </legend>
       <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                 <div class="form-group" >
                     <label >Enfermedad</label>
                     <select  class="form-control form-control-sm " name="enfermedad" id="enfermedadMOD">
                     <option value="0">Ninguna</option>
                    <?php    $queryEnfermedad = "SELECT * FROM enfermedad";
                              $resultado1 = $con->query($queryEnfermedad);     
                             
                              while($row=$resultado1->fetch_assoc()){ ?>
                               
                      <option value="<?php echo $row['id_enfermedad']; ?>"><?php echo $row['nombre_enfermedad']; ?></option>
                      <?php } ?>
                     </select>
                   
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group">
                     <label >Ojo Dominante</label>
                     <select  class="form-control form-control-sm " name="ojo" id="ojoMOD">
                     <option value="NULL"></option>
                      <option value="1">Derecho</option>
                      <option value="0">Izquierdo</option>
                     </select>
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
                 <div class="input-group pt-2">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text"
                                                         style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                 </div>
                                                 <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                      id="observacionMOD"></textarea>
                 </div>
             </div>
           
         </div>
                        
     </fieldset>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" onclick="closeEdiPaciente()">Cerrar</button>
         <button type="button" class="btn btn-primary"  onclick="validaEditarPaciente()"   >Guardar</button>
       </div>
     </div>
   </div>
 </div>