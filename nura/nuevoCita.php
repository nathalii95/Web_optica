
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 40%;
      }
 }
 
 .l{
      font-weight: bold;
  }
 
 </style>
 <div class="modal fade" id="modalnewCita" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="cargoLabel" >Nueva Cita</h5>
        <i class="far fa-times-circle" onclick="closenewCita()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-cita"></div>
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Información CIta</legend>
       <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4 ">
                <div class="form-group">
                    <label class="l"  >Cédula</label>
                    <div  id="result">
                    <input placeholder=""  class="form-control form-control-sm" list="nameSearch" id="cedulaCita" type="text"  autofocus>
                    <datalist id="nameSearch">
       
                     <?php $queryCargo = "SELECT * FROM paciente";
                      $resultado1 = $con->query($queryCargo);
                       while($row=$resultado1->fetch_assoc()){ ?>
                        <option value="<?php echo $row['cedula']; ?>">
                     <?php } ?>
                    </datalist>
</div>

                </div>
            </div>



             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Nombre</label>
                     <input type="text" class="form-control form-control-sm " id="nombre" disabled >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Apellido</label>
                     <input type="text" class="form-control form-control-sm " id="apellido" disabled>
                 </div>
             </div>
         </div> 
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Fecha</label>
                     <?php date_default_timezone_set('America/Guayaquil');?>
                <!--      <input type="date" class="form-control form-control-sm " name="cargos" id="cargos"  > -->

                <input type='text' class="form-control form-control-sm" style="background: white;" id="fecha" value="<?php echo date("Y-m-d");?>" name="fecha" >
            </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Hora</label>
                     <select class="form-control form-control-sm " name="hora" id="hora">
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
                     <label >Tipo Cita</label>
                     <input type="text" class="form-control form-control-sm " value="OPTOMETRIA" disabled>
                 </div>
             </div>
        
         </div>     
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12">
             <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="observacion"></textarea>
                </div>
             </div>
      
         </div>                         
     </fieldset>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary"onclick="closenewCita()">Cerrar</button>
         <button type="button" class="btn btn-primary"  onclick="validaRegistroCita()" id="btnGuardar" >Guardar</button>
       </div>
     </div>
   </div>
 </div>