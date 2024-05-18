
<style type="text/css">
 

@media (min-width: 1500px) {
     .modal-dialog {
       max-width: 70%;
     }
}



</style>
<div class="modal fade" id="enfermedad" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enfermedadLabel" >Nueva Enfermedad</h5>
       <i class="far fa-times-circle" onclick="closeNewEnfermedad()" style="cursor: pointer; font-size:20px"></i>
      </div>
      <div class="modal-body">
      <div  id="result-enfermedad"></div>
      <fieldset class="border p-2">
      <legend class="w-auto h6 prueba">Información General</legend>
      <div class="row justify-content-center" >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
                <div class="form-group" >
                    <label >Nombre</label>
                    <input type="text" class="form-control form-control-sm " name="nombre" id="nombre"  >
                </div>
            </div>
        </div>                             
    </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"onclick="closeNewEnfermedad()">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="validaRegistroEnfermedad()">Guardar</button>
      </div>
    </div>
  </div>
</div>