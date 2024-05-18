
<style type="text/css">
 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
      }
 }
 
 </style>
 <div class="modal fade" id="modalEditCita" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="citadLabel" >Editar Cita</h5>
        <i class="far fa-times-circle" onclick="closeEditCita()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-citaEdit"></div>
      
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Información CIta</legend>
       <input type="hidden" name="id_agendamiento" id="id_agendamiento">
       <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4 ">
                <div class="form-group">
                    <label class="l"  >Cédula</label>
                 
                    <input placeholder=""  class="form-control form-control-sm" list="nameSearch" id="cedulaCitaMD" type="text"  autofocus disabled>
                    <datalist id="nameSearch">
                     <?php $queryCargo = "SELECT * FROM paciente";
                      $resultado1 = $con->query($queryCargo);
                       while($row=$resultado1->fetch_assoc()){ ?>
                        <option value="<?php echo $row['cedula']; ?>">
                     <?php } ?>
                    </datalist>
                </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Nombre</label>
                     <input type="text" class="form-control form-control-sm " id="nombreSMD" disabled >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Apellido</label>
                     <input type="text" class="form-control form-control-sm " id="apellidoMD" disabled>
                 </div>
             </div>
         </div> 
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Fecha</label>
                     <?php date_default_timezone_set('America/Guayaquil');?>
                <input type='text' class="form-control form-control-sm" style="background: white;" id="fechaMD" value="<?php echo date("Y-m-d");?>" name="fecha" >
            </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Hora</label>
                     <select class="form-control form-control-sm " name="hora" id="horaMD">
                     <option value=""></option>
                     <option value="0">9:00 AM</option>
                     <option value="1">9:30 AM</option>
                     <option value="2">10:00 AM</option>
                     <option value="3">10:30 AM</option>
                     <option value="4">11:00 AM</option>
                     <option value="5">11:30 AM</option>

                     <option value="6">12:00 PM</option>
                     <option value="7">12:30 PM</option>
                     <option value="8">14:00 PM</option>
                     <option value="9">14:30 PM</option>
                     <option value="10">15:00 PM</option>
                     <option value="11">15:30 PM</option>
                     <option value="12">16:00 PM</option>
                     <option value="13">16:30 PM</option>
                     <option value="14">17:00 PM</option>
                    </select>
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Estado</label>             
                     <select class="form-control form-control-sm " name="estadonMD" id="estadoMD">
                     <option value=""></option>
                     <option value="1">OCUPADO</option>
                     <option value="2">CANCELADO</option>
                     <option value="3">ATENDIDO</option>
                    </select>
                 </div>
             </div>

         </div>     
         <div class="row justify-content-center" >
         <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Tipo Cita</label>
                     <input type="text" class="form-control form-control-sm " value="OPTOMETRIA" disabled>
                 </div>
             </div>
         <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-8">
             <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="observacionMD"></textarea>
                </div>
             </div>
      
         </div>                             
     </fieldset>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary"onclick="closeEditCita()">Cerrar</button>
         <button type="button" class="btn btn-primary" onclick="validaEditarCita()" id="btnGuardar">Guardar</button>
       </div>
     </div>
   </div>
 </div>