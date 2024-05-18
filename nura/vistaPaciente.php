<style type="text/css">
 

 @media (min-width: 1500px) {
      .modal-dialog {
        max-width: 70%;
      }
 }

 .l{
     font-weight: bold;
 }
 /* 
.modal-header {
    padding: unset !important;
    background-color: #325D9C;
    color: white;
    height: 70px;
    border-bottom: unset;
    border: 1px solid rgba(107, 107, 107, 0.3);
   
   
}*/

.modal-title {
        font-weight: bold;
    }
/* .close {
        margin: -6px -1px 0 auto;
        outline: unset;
        color: white;
    }

.modal-body {
    font-family: 'Poppins1';
    background-color: #fafafa;
    border: 1px solid rgba(107, 107, 107, 0.3);
    border-radius: 0px 0px 5px 5px;
    border-top: unset !important;
}  */
 </style>

<div class="modal fade bd-example-modal-lg " id="modalSeePaciente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
         <h5 class="modal-title" id="empleadoLabel" >Vista Paciente</h5>
        <i class="far fa-times-circle" onclick="closeSeePaciente()" style="cursor: pointer; font-size:20px"></i>
       </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12">
                        <fieldset class="border p-2 mb-1 mt-2">
                            <legend class="w-auto h6">Información Completa</legend><br>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label class="l">Cédula</label>
                                        <p id="cedulapaView" ></p>
                                      <!--  <input type="text" id="cedulaView" >-->
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label class="l">Nombre</label>
                                        <p id="nombrepaView"></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label class="l">Apellido</label>
                                        <p  id="apellidopaView"></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label class="l">Genero</label>
                                        <p  id="generopaView" ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label class="l">Nacimiento</label>
                                        <p id="fechaNacimientopaView" ></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 8px;">
                            
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label class="l">Edad</label>
                                        <p id="edadpaView"  ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label class="l">Correo</label>
                                        <p id="correopaView"  ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label class="l">Dirección</label>
                                        <p  id="direccionpaView" ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label class="l">Telefono</label>
                                        <p id="telefonopaView" ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label class="l">Estado Civil</label>
                                        <p id="civilpaView" ></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row" style="margin-top: 8px;">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label class="l">Enfermedad</label>
                                        <p  id="enfermedadView" ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label class="l">Ojo Dominante</label>
                                        <p id="ojoView" ></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label class="l">Observación</label>
                                        <p  id="observacionView" ></p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" aria-label="Close" style="font-weight: bold"  onclick="closeSeePaciente()">
                    CERRAR
                  </button>
            </div>
        </div>
    </div>
</div>