
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
<div class="modal fade" id="cargo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cargoLabel" >Nueva Cargo</h5>
       <i class="far fa-times-circle" onclick="closeNewCargo()" style="cursor: pointer; font-size:20px"></i>
      </div>
      <div class="modal-body">
      <div  id="result-cargo"></div>
      <fieldset class="border p-2">
      <legend class="w-auto h6 prueba">Información General</legend>
      <div class="row justify-content-center" >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
                <div class="form-group" >
                    <label >Nombre</label>
                    <input type="text" class="form-control form-control-sm " name="cargos" id="cargos"  >
                </div>
            </div>
        </div>                             
    </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"onclick="closeNewCargo()">Cerrar</button>
        <button type="button" class="btn btn-primary"  onclick="validaRegistroCargo()" >Guardar</button>
      </div>
    </div>
  </div>
</div>