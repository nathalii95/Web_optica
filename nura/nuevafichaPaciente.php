
<style type="text/css">
 

 @media (min-width: 1500px) {
     .modal-dialog {
       max-width: 70%;
     }
}

.l{
     font-weight: bold;
 }

 #output,  #output2, #output3, #output4 table, th, td {
  border: 2px solid white;
  border-collapse: collapse;
  border: 3px solid  black;
  border-collapse: collapse;
  background-color: black;
  color:white;
}
  
 </style>
 <?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
	include_once("../php/conexion.php");  
    $nombre = $_SESSION['cargo'];
	$tipo_usuario = $_SESSION['fk_cargo'];
	?>
 <div class="modal fade" id="modalFicha" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="modalFichaLabel" >Ficha Médica</h5>
        <i class="far fa-times-circle" onclick="closeFichaPaciente()" style="cursor: pointer; font-size:20px"></i>
       </div>
       <div class="modal-body">
       <div  id="result-fichaPaciente"></div>


       <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Paciente</legend>
       <input type="hidden" class="form-control" id="tipo_usuario" value="<?php echo $tipo_usuario?>">
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group" >
                    <label >Cédula</label>
                  <!--  <input type="text" class="form-control form-control-sm " name="cedula" id="cedula" placeholder="Buscar Paciente" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"   >-->
                    <input placeholder="Buscar Paciente"  class="form-control form-control-sm" list="nameSearch" id="cedula" type="text"  minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)" autofocus>
                    <datalist id="nameSearch">
       
                     <?php $queryCargo = "SELECT * FROM paciente";
                      $resultado1 = $con->query($queryCargo);
                       while($row=$resultado1->fetch_assoc()){ ?>
                        <option value="<?php echo $row['cedula']; ?>">
                     <?php } ?>
                    </datalist>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control form-control-sm " disabled name="nombre" id="nombre" minlength="10" maxlength="60" onKeyPress="return soloLetras(event)"  >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group">
                    <label >Apellido</label>
                    <input type="text" class="form-control form-control-sm " disabled name="apellido" id="apellido"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event)" >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-2">
                <div class="form-group">
                    <label >Nacimiento</label>
                    <input type="text" class="form-control form-control-sm " disabled name="fechaNacimiento" id="fechaNacimiento"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event)" >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-1">
                <div class="form-group">
                    <label >Edad</label>
                    <input type="text" class="form-control form-control-sm " disabled name="edad" id="edad"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event)" >
                </div>
            </div>
        </div>                            
     </fieldset>
     <fieldset class="border p-2">
      <legend class="w-auto h6 prueba">Datos Extra Paciente </legend>
      <div class="row justify-content-center" >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                <div class="form-group" >
                    <label >Enfermedad</label>
                    <select  class="form-control form-control-sm " name="enfermedad" id="enfermedad">
                    <option value="0">Ninguna</option>
                   <?php    $queryEnfermedad = "SELECT * FROM enfermedad WHERE estado = '1'";
	                         $resultado1 = $con->query($queryEnfermedad);     
                            
                             while($row=$resultado1->fetch_assoc()){ ?>
                              
                     <option value="<?php echo $row['id_enfermedad']; ?>"><?php echo $row['nombre_enfermedad']; ?></option>
                     <?php } ?>
                    </select>
                  
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                <div class="form-group">
                    <label >Ojo Dominante</label>
                    <select class=" form-control form-control-sm " name="ojoDominante" id="ojoDominante">
                     <option value=""></option>
                     <option value="0">Derecho</option>
                     <option value="1">Izquierdo</option>

                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4">
                <div class="form-group">
                    <label >Fecha</label>
                    <?php date_default_timezone_set('America/Guayaquil');?>
                    <input type="fecha" class="form-control form-control-sm " disabled name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>">
                </div>
            </div>
       </div>

       <div class="row justify-content-center" >  
       <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
       <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Referido</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="referido"></textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6">
       <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Motivo Consulta</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="motivo"></textarea>
                </div>
            </div>     
       </div>
    </fieldset>
     <!-- LENTES -->
     <fieldset class="border p-2">
       <legend class="w-auto h6 prueba">Lentes</legend>
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
            <div class="form-group" >
                     <label >Usa Lentes</label>
                     <select class="dropdown form-control form-control-sm " name="usar" id="usar">
                     <option value=""></option>
                     <option value="1">SI</option>
                     <option value="0">No</option>
                    </select>
                 </div>
            </div>
          
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 " id="result-usoUno">
                <div class="form-group">
                    <label >Tipo de Diseño</label>
                    <select class="dropdown form-control form-control-sm " name="tipo" id="tipo">
                     <option value=""></option>
                     <option value="1">Monofocal</option>
                     <option value="2">Bifocal</option>
                     <option value="3">Progesivo</option>
                     <option value="4">Otros</option>
                    </select>
                </div>
                <input type="hidden" class="form-control" style="border: 2px solid green;" id="usaAntiguo" value="">
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" ><!-- id="result-usoDos"  -->
             <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="observacion1"></textarea>
                </div>
             </div>
       </div>                            
     </fieldset>
     <fieldset class="border p-2"  id="result-usoTres">
       <legend class="w-auto h6 prueba">Medidas de Lentes Antiguo</legend>
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div id="output"></div>
       </div>                            
     </fieldset>
 


     <fieldset class="border p-2"  id="optomestristaAdmin">
       <legend class="w-auto h6 prueba">Optometrista</legend>
       <fieldset class="border p-2 mt-8">

       <legend class="w-auto h6 prueba">Agudeza Visual Lejos</legend>
       <div class="row justify-content-center" style="margin-top:10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" >
            <div id="output2"></div>
            </div>
            
       </div>  
       <div class="row justify-content-center" >
         </div>  
       </fieldset> 
       <br>
       <fieldset class="border p-2 mt-8">
       <legend class="w-auto h6 prueba">Agudeza Visual Proxima (Lectura)</legend>
       <div class="row justify-content-center" style="margin-top:-10px;"  >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-6" >
            <div id="output3"></div>
            </div>
       </div>  
       </fieldset>   


       <fieldset class="border p-2 mt-8" >
       <legend class="w-auto h6 prueba">Medida Lentes Actual</legend>
       <div class="row justify-content-center" style="margin-top:-10px;" >
       <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-4 ">
       <input type="hidden" class="form-control" id="usaNuevo" value="">
                <div class="form-group">
                    <label >Tipo de Diseño</label>
                    <select class="dropdown form-control form-control-sm " name="tipo2" id="tipoOpt">
                     <option value=""></option>
                     <option value="1">Monofocal</option>
                     <option value="2">Bifocal</option>
                     <option value="3">Progesivo</option>
                     <option value="4">Otros</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-8" >
            <div id="output4"></div>

            </div>
       </div>  

         </fieldset>    
         <fieldset class="border p-2 mt-8">
       <legend class="w-auto h6 prueba">D.X.</legend>
         <div class="row justify-content-center" >
<div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12">
                    
                 <div class="form-group">         
 <input type="checkbox" id="inlineCheckbox1"> HIPERMETROPIAO <br>
<input type="checkbox" id="inlineCheckbox2"> MIOPIA <br>
<input type="checkbox" id="inlineCheckbox3"> ASTIGMATISMO <br>
<input type="checkbox" id="inlineCheckbox4"> BILATERAL <br>
<input type="checkbox" id="inlineCheckbox5"> PRESBICIA <br>
<input type="checkbox" id="inlineCheckbox6"  id="inlineCheckbox6" onchange="changeOtros()"> Otros 
 <input type="text" class="form-control form-control-sm"  id="otros" disabled >
                </div>
         
         </div>
 
         </fieldset>   


         <fieldset class="border p-2 mt-8">
       <legend class="w-auto h6 prueba">Producto</legend>
       <div class="row justify-content-center" style="margin-top:-10px;">
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12" >
           
  <div class="input-group pt-0 ">
    <label  class="col-md-2  mt-4 l" >ARMAZON</label>
    <input type="hidden" name="armazon" id="armazon" value="Armazon">
    <div class="col-md-4">
                    <legend class="w-auto h6 l text-center">Código/Nombre</legend>
                    <input placeholder="Buscar Armazon"  class="form-control form-control-sm" list="nameSearchs"  id="armazonCodigo" type="text"  autofocus>
                    <datalist id="nameSearchs">
                    <option value=""></option>
                     <?php $queryCargo = "SELECT dt.codigo_producto FROM ingreso_dt dt,  tipo_producto tp WHERE dt.fk_tipo_producto = '1' AND dt.fk_tipo_producto = tp.id_tipo_producto AND dt.estado = '1' ";
                      $resultado1 = $con->query($queryCargo);
                       while($row2=$resultado1->fetch_assoc()){ ?>
                        <option value="<?php echo $row2['codigo_producto']; ?>">
                     <?php } ?>
                    </datalist>
               
    </div>

    <div class="col-md-4">
    <legend class="w-auto h6 l text-center">Valor</legend>
      <input type="text" class="form-control" id="armazonValor" style="border: 2px solid green;" onkeyup="SumaTotal()" >
    </div>

  </div>

  <div class="input-group pt-0  mt-4" >
    <label  class="col-md-2 l" >LUNAS</label>
    <input type="hidden" name="luna" id="luna" value="Lunas" >
    <div class="col-md-4">
      <select  class="form-control form-control-sm " name="lunasCodigo" id="lunasCodigo" >
                    <option value=""></option>
                   <?php    $query = "SELECT * FROM tipo_lente";
	                         $resultado1 = $con->query($query);                            
                             while($row=$resultado1->fetch_assoc()){ ?>
                     <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                     <?php } ?>
                    </select>
                  
    </div>
    <div class="col-md-4">
    <input type="number" class="form-control" id="lunasValor" style="border: 2px solid green;" onkeyup="SumaTotal()">
    </div>
  </div>
  <div class="input-group pt-0  mt-4" >
    <label  class="col-md-2 l" style="color:red;">TOTAL (Incluye Iva)</label>
    <div class="col-md-2">   
    </div>
    <div class="col-md-2">
    <span style="color:green;font-weight:bold;float:right;">$</span>
    </div>
    <div class="col-md-4">
      <input type="number" class="form-control" style="border: 2px solid green;" id="totalValor" >
    </div>
  </div>
            </div>
       </div>  

 
         </fieldset>  


     </fieldset>
  

     <div class="row justify-content-center" >
<div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-12 mt-4">
                <div class="input-group pt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="background-color: rgba(203, 100, 100, 0.85); color: white;">Observación</span>
                                                </div>
                                                <textarea class="form-control form-control-sm" aria-label="With textarea"
                                                     id="observacion6"></textarea>
                </div>
            </div>
         </div> 
  
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" onclick="closeFichaPaciente()">Cerrar</button>
         <button type="button" class="btn btn-primary" onclick="validaGuardarFicha()" id="btnGuardar">Guardar</button>
       </div>
     </div>
   </div>
 </div>


