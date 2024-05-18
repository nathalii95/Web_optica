<script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
      <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 80%;
      }
 }
 
 @media only screen and (min-width: 300px),
 (max-width: 1000px) {
.l {
        margin-top: 10px;
      }
 }

 input[type="text"],
 input[type="number"],
 input[type="date"],
 textarea{
	background-color: white !important;
	color: black;
}
 

 </style>
 <div class="modal fade" id="modalseeInventario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="enfermedadLabel" >Vista</h5>
        <i class="far fa-times-circle" onclick="closeseeInventario()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body " id="modalId">
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Información General</legend>
       <div class="row justify-content-center" >
    
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Numero Factura</label>
                     <input type="text" class="form-control form-control-sm " disabled name="numero" id="numeroSee" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Empresa</label>
                     <input type="text" class="form-control form-control-sm "  disabled name="empresa" id="empresaSee" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Ruc</label>
                     <input type="text" class="form-control form-control-sm " disabled name="ruc" id="rucSee">
                 </div>
             </div>
         </div> 
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-7">
                 <div class="form-group" >
                     <label >Dirección</label>
                     <input type="text" class="form-control form-control-sm " disabled name="lugar" id="lugarSee" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
             <div class="form-group"  style="height: 28px;">
                    <label >Forma Pago</label>
                    <input type="text" class="form-control form-control-sm " disabled name="pago" id="pagoSee"  >
                </div>
             </div>
         </div>  
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 l">
                 <div class="form-group" >
                     <label >Fecha Compra</label>
                     <?php date_default_timezone_set('America/Guayaquil'); ?>
                    <input type="date" class="form-control form-control-sm " disabled name="fechaCompra" id="fechaCompraSee" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
             <div class="form-group"  style="height: 28px;">
                    <label >Fecha Ingreso</label>
                    <?php date_default_timezone_set('America/Guayaquil'); ?>
                    <input type="date" class="form-control form-control-sm " disabled name="fechaIngreso" id="fechaIngresoSee" >
                </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6  l">
             <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm"  aria-label="With textarea" disabled placeholder="Ingrese Observacion"
                                                     id="observacionSee" name="observacion"></textarea>
                </div>
             </div>
         </div>                            
     </fieldset>
      
     <fieldset class="border p-2">
     <legend class="w-auto h6 prueba">Productos Ingresado</legend>
<br><br>
            <div class="row justify-content-center mt-2" style="height: 300px;margin-top:-12px;">
                <div class="col-md-12 params-table1 table-responsive responsive-table">
                    <div class="container">
                        <div class="row">
                        <table style="width:100%" class="table text-center" id="tablaSee">
                            <thead style="background-color: rgba(203, 100, 100, 0.85); color: black;">
                                <tr  >
                                <th style="width: 0%;"scope="col">#</th>
                                    <th  style="width: 8%;text-align: center;" scope="col">Código Producto</th>
                                    <th style="width: 14%;text-align: center;" scope="col">Tipo Producto</th>
                                    <th style="width: 5%;text-align: center;" scope="col">Precio Compra</th>
                                    <th style="width: 5%;text-align: center;" scope="col">Precio Venta</th>
                                    <th style="width: 5%;text-align: center;" scope="col">Marca</th>
                                    <th style="width: 10%;text-align: center;" scope="col">Detalle</th>
                                    <th style="width: 8%;text-align: center;" scope="col">Estado</th>
                                </tr>
                            </thead>
                            </table>
                        </div>
                    </div>
                </div>
             </div> 
        </fieldset>
       </div>
       <div class="modal-footer">         
         <button type="button" class="btn btn-dark" onclick="printJS('modalId', 'html')"> <i class="fas fa-print"></i> Imprimir</button>
         <button type="button" class="btn btn-secondary"onclick="closeseeInventario()">Cerrar</button>
       </div>
     </div>
   </div>
 </div>