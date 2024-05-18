
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
      }
 }
 
 
 
 </style>
 <div class="modal fade" id="modalEditEnfermedad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="enfermedadLabel" >Editar Enfermedad</h5>
        <i class="far fa-times-circle" onclick="closeEditEnfermedad()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-enfermedadEdit"></div>
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba"></legend>
       <div class="row justify-content-center" >
       <input type="hidden" name="id_enfermedadMOD" id="id_enfermedadMOD">
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
                 <div class="form-group" >
                     <label >Nombre</label>
                     <input type="text" class="form-control form-control-sm " name="nombreMD" id="nombreMD"  >
                 </div>
             </div>

         </div>                             
     </fieldset>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary"onclick="closeEditEnfermedad()">Cerrar</button>
         <button type="button" class="btn btn-primary" onclick="validaEditarEnfermedad()">Guardar</button>
       </div>
     </div>
   </div>
 </div>