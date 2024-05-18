
<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
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
 textarea,
 select {
	background-color: white !important;
	color: black;
}
 

 </style>
 <div class="modal fade" id="modalEditInventario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" >Editar Estado</h5>
        <i class="far fa-times-circle" onclick="closeEditInventario()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-estado"></div>  
       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Información General</legend>
       <div class="row justify-content-center" >
    
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Numero Factura</label>
                     <input type="text" class="form-control form-control-sm " disabled name="numero" id="numeroMD" onKeyPress="return SoloNumeros(event);"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Empresa</label>
                     <input type="text" class="form-control form-control-sm " disabled name="empresa" id="empresaMD" >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                 <div class="form-group" >
                     <label >Ruc</label>
                     <input type="text" class="form-control form-control-sm " name="ruc" disabled id="rucMD" onKeyPress="return SoloNumeros(event);">
                 </div>
             </div>
         </div> 
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-7">
                 <div class="form-group" >
                     <label >Dirección</label>
                     <input type="text" class="form-control form-control-sm " name="lugar" disabled id="lugarMD"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
             <div class="form-group"  style="height: 28px;">
                    <label >Forma Pago</label>
                    <select  class="form-control form-control-sm " name="pago" disabled id="pagoMD" >
                    <option value="0">Ingrese Forma de Pago</option>
                     <option value="Efectivo">Efectivo</option>
                     <option value="Cheque">Cheque</option>
                     <option value="Trasferencia">Trasferencia</option>
                     <option value="Deposito">Deposito</option>
                    </select>
                </div>
             </div>
         </div>  
         <div class="row justify-content-center" >
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                 <div class="form-group" >
                     <label >Fecha Compra</label>
                     <?php date_default_timezone_set('America/Guayaquil'); ?>
                    <input type="date" class="form-control form-control-sm " disabled name="fechaCompra" id="fechaCompraMD"  value="<?php $hoy=date("Y-m-d"); echo $hoy;?>"  >
                 </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
             <div class="form-group"  style="height: 28px;">
                    <label >Fecha Ingreso</label>
                    <?php date_default_timezone_set('America/Guayaquil'); ?>
                    <input type="date" class="form-control form-control-sm " disabled name="fechaIngreso" id="fechaIngresoMD"   value="<?php $hoy=date("Y-m-d"); echo $hoy;?>"  >
                </div>
             </div>
             <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
             <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea" placeholder="Ingrese Observación"
                                                     id="observacionMD" disabled name="observacion"></textarea>
                </div>
             </div>
         </div>                            
     </fieldset>
     <form  action="phpEnvioData/pruebaDatoEdit.php" method="POST"  onSubmit="return validadEstado()">      
     <fieldset class="border p-2">
     <legend class="w-auto h6 prueba">Ingreso de Productos</legend>
    
            <div class="row justify-content-end" style="margin-top:-20px;">
                <!-- <div class="col-md-3 col-sm-3 col-md-2 col-lg-2 col-xl-12 text-right btn-add">
                    <button type="button" class="btn btn-success" id="bt_addMD"  placement="top" ngbTooltip="Añadir Items" >
                        <i class="fa fa-plus" aria-hidden="true"></i> 
                    </button>
                </div> -->
            </div>
            <div class="row justify-content-center mt-2" style="height: 300px;margin-top:-12px;">
                <div class="col-md-12 params-table1 table-responsive responsive-table">
                    <div class="container">
                        <div class="row">
                        <table style="width:100%" class="table text-center" id="tablaMD">
                            <thead >
                                <tr>
                               <!--  <td  style="visibility:collapse;display: none;">x</td> -->

                                <th style="width: 0%;"scope="col">#</th>
                                    <th  style="width: 8%;" scope="col">Codigo Producto</th>
                                    <th style="width: 20%;" scope="col">Tipo Producto</th>
                                    <th style="width: 5%;" scope="col">Precio Compra</th>
                                    <th style="width: 5%;" scope="col">Precio Venta</th>
                                    <th style="width: 8%;" scope="col">Marca</th>
                                    <th style="width: 15%;" scope="col">Detalle</th>
                                    <th style="width: 8%;" scope="col">Estado</th>    
                                </tr>
                            </thead>
                            </table>
                        </div>
                    </div>
                </div>
             </div> 
        </fieldset>
             <div class="modal-footer">
             <button type="button" class="btn btn-secondary" onclick="closeEditInventario()">Cerrar</button>
             <button type="submit" name="submit" id="submit"  class="btn btn-primary">Guardar</button>
             </div>
     </form>
    </div>    <!-- cerrar modal body-->
     </div>
   </div>
 </div>