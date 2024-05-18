
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
      }
 }
 
 
 
 </style>
 <div class="modal fade" id="modaleditTipoProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="enfermedadLabel" >Editar Tipo de Producto</h5>
        <i class="far fa-times-circle" onclick="closeEditTipoProducto()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-TipoProductoEdit"></div>
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba"></legend>
       <div class="row justify-content-center" >
       <input type="hidden" name="id_TipoProductoMOD" id="id_TipoProductoMOD">
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
                 <div class="form-group" >
                     <label >Nombre Tipo </label>
                     <input type="text" class="form-control form-control-sm " name="TipoProductoMD" id="TipoProductoMD"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
                 <div class="form-group" >
                     <label >Detalle</label> 
                     <input type="text" class="form-control form-control-sm " name="detalleMD" id="detalleMD"  >
                 </div>
             </div>
         </div>                             
     </fieldset>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary"onclick="closeEditTipoProducto()">Cerrar</button>
         <button type="button" class="btn btn-primary" onclick="validaEditarTipoProducto()">Guardar</button>
       </div>
     </div>
   </div>
 </div>