
<style type="text/css">
 

@media (min-width: 1500px) {
     .modal-dialog {
       max-width: 70%;
     }
}



</style>
<?php  
	session_start();
	if (!isset($_SESSION['id_empleado'])) {
	  header('Location: ../index.php');
	}
/* 	include_once("../php/conexion.php");  
    $query=" SELECT * 
    FROM enfermedad 
    ORDER BY id_enfermedad ";
	$resultado=$con->query($query); */
    $num = 0;
	?>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" >Nuevo Paciente</h5>
       <i class="far fa-times-circle" onclick="closeNuevoPaciente()" style="cursor: pointer; font-size:20px"></i>
      </div>
      <div class="modal-body">
      <div  id="result-paciente"></div>
      <fieldset class="border p-2">
      <legend class="w-auto h6 prueba">Datos Personales</legend>
      
      <div class="row justify-content-center" >
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group" >
                    <label >Cédula</label>
                    <input type="text" class="form-control form-control-sm " name="cedula" id="cedula" placeholder="Ingresar Cédula" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"   >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control form-control-sm " name="nombre" id="nombre" minlength="10" maxlength="60" onKeyPress="return soloLetras(event)"  >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group">
                    <label >Apellido</label>
                    <input type="text" class="form-control form-control-sm " name="apellido" id="apellido"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event)" >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group"  style="height: 28px;">
                    <label >Genero</label>
                    <select  class="form-control form-control-sm " name="genero" id="genero">
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
                    <input type="date" class="form-control form-control-sm " name="fechaNacimiento" id="fechaNacimiento"  max="<?php $hoy=date("Y-m-d"); echo $hoy;?>"  >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group" >
                    <label >Edad</label>
                    <input type="text" class="form-control form-control-sm " name="edad" id="edad" minlength="3" maxlength="3" onKeyPress="return SoloNumeros(event)"  >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3 ">
                <div class="form-group" >
                    <label >Teléfono</label>
                <input type="text" class="form-control form-control-sm " name="telefono" id="telefono" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event)"  >
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-3">
                <div class="form-group"  style="height: 28px;">
                    <label >Estado Civil</label>
                    <select  class="form-control form-control-sm " name="civil" id="civil">
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
                    <input type="email" placeholder="ejemplo@ejemplo.com" class="form-control form-control-sm " name="correo" id="correo"  >
                </div>
            </div>

            <div class="col-md-12 col-sm-6 col-md-2 col-lg-6 col-xl-5">
            <div class="form-group">
                    <label >Dirección</label>
                    <input type="text" class="form-control form-control-sm " name="direccion" id="direccion"  >
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
<br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeNuevoPaciente()">Cerrar</button>
        <button type="button" class="btn btn-primary"  onclick="validaRegistroPaciente()"   >Guardar</button>
      </div>
    </div>
  </div>
</div>