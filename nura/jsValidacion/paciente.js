toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "1000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
};

async function validaRegistroPaciente() {

    await this.validaRegistrosDatos(0).then(resp => {
        if (resp) {
            setTimeout(function() {
                envioDato();
            }, 1000);
        }
    });
}

function envioDato() {
    swal({
        title: "Atención!!",
        text: "Seguro desea guardar Paciente?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            savePac();
        } else {
            swal("Error al Enviar Datos !");
            location.reload();
        }
    });
}

function validaRegistrosDatos(action) {

    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var genero = $("#genero").val();
    var telefono = $("#telefono").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var edad = $("#edad").val();
    var civil = $("#civil").val();
    var correo = $("#correo").val();
    var direccion = $("#direccion").val();
    var enfermedad = $("#enfermedad").val();
    var ojo = $("#ojo").val();
    var observacion = $("#observacion").val();
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    return new Promise((resolve, reject) => {

        if (cedula == "") {
            let autFocus = $("#cedula").focus();
            toastr.error("Ingrese Cedula");
            return false;
        }
        /*  else if (!validaCedula()) {

                } */
        /* else if (!ExistCedula()) {

               }  */
        else if (nombre == "") {
            toastr.error("Ingrese Nombre");
            return false;
        } else if (apellido == "") {
            toastr.error("Ingrese Apellido");
            return false;
        } else if (genero == "") {
            toastr.error("Ingrese Genero");
            return false;
        } else if (fechaNacimiento == "") {
            toastr.error("Ingrese Fecha Nacimiento");
            return false;
        } else if (fechaNacimiento == today) {
            toastr.error("Ingrese Fecha Nacimiento diferente a Fecha actual");
            return false;
        } else if (edad == "") {
            toastr.error("Ingrese Edad");
            return false;
        } else if (telefono == "") {
            toastr.error("Ingrese Telefono");
            return false;
        } else if (civil == "") {
            toastr.error("Ingrese Estado Civil");
            return false;
        } else if (correo == "") {
            toastr.error("Ingrese correo");
            return false;
        } else if (!validarEmail(correo)) {
            let autFocus = $("#correo").focus();
            this.toastr.error("El correo no es válido !!");
            return false;
        } else {
            return resolve(true);
        }

    });


}


$(document).ready(function() {
    $('#cedula').on('keyup', function() {

        var cedula = $("#cedula").val();
        /*         console.log(cedula.length); */
        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 1,
            data: 'cedula=' + cedula,
            success: function(data) {
                if (data[0].cedula !== undefined) {
                    if (data[0].cedula == cedula) {
                        document.getElementById('cedula').style.border = '0.2em solid red';
                        toastr.error("Cedula ya Registrada");
                        setTimeout(function() {
                            $("#cedula").val('');
                            document.getElementById('cedula').style.border = '';
                        }, 1000);
                    } else {
                        document.getElementById('cedula').style.border = '0.2em solid green';
                        toastr.success("Cedula no Registrada");
                    }
                }
            }
        });
    });
});


/* $(document).ready(function() {
    $('#fechaNacimiento').on('keyup', function() {

        var fechaNacimientos = $("#fechaNacimiento").val();
 */
/*   var data = new Date(fechaNacimientos);
  var data2 = data.getFullYear() + 1;

  console.log(data2.toString().length);

  if (data2.toString().length != 4) {
      var data3 = "";
       console.log(data3);
        var date = new Date(); 
      $("#fechaNacimiento").val(data3);
  } */

/*     let hoy = new Date();
        let fechaNacimiento = new Date(fechaNacimientos);
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
        if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
            $("#edad").val(edad);
            return true;
        }


    });
}); */




function savePac() {

    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var genero = $("#genero").val();
    var telefono = $("#telefono").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var edad = $("#edad").val();
    var civil = $("#civil").val();
    var correo = $("#correo").val();
    var direccion = $("#direccion").val();
    var enfermedad = $("#enfermedad").val();
    var ojo = $("#ojo").val();
    var observacion = $("#observacion").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/guardarPaciente.php",
        data: 'cedula=' + cedula + '&nombre=' + nombre + '&apellido=' + apellido + '&genero=' +
            genero + '&telefono=' + telefono + '&fechaNacimiento=' + fechaNacimiento + '&edad=' + edad + '&civil=' + civil +
            '&correo=' + correo + '&direccion=' + direccion + '&enfermedad=' + enfermedad + '&ojo=' + ojo + '&observacion=' + observacion,
        success: function(data) {
            $('#result-paciente').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Paciente", "error");
        }
    });

}


function ExistCedula() {
    var cedula = $("#cedula").val();
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadatoPaciente.php?dato=' + 1,
        data: 'cedula=' + cedula,
        success: function(data) {
            if (data.length == 0) {
                return true;
            } else {
                let autFocus = $("#cedula").focus();
                $('#result-paciente').hide();
                toastr.error("Cedua Ya Registrada");
                return false;
            }
        },

    });
    return true;
}

function validarEmail(valor) {
    if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)) {
        return true;
    } else {
        return false;
    }
}

function SoloNumeros(evt) {
    let key = (event.which) ? event.which : event.keyCode;
    if (key > 31 && (key < 48 || key > 59)) {
        return false;
    }
    return true;
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        /*    alert('Tecla numerica no aceptada'); */
        return false;
    }
}

//mMODIFICAR PACIENTE

$('.editbtn').on('click', function() {
    $tr = $(this).closest('tr');

    var datos = $tr.children("td").map(function() {
        return $(this).text();
    });
    $('#id_pacienteMOD').val(datos[0]);
    $('#cedulaMOD').val(datos[1]);
    $('#nombreMOD').val(datos[7]);
    $('#apellidoMOD').val(datos[8]);
    $('#generoMOD').val(datos[9]);
    $('#fechaNacimientoMOD').val(datos[10]);
    $('#edadMOD').val(datos[3]);
    $('#telefonoMOD').val(datos[4]);
    $('#civilMOD').val(datos[11]);
    $('#correoMOD').val(datos[12]);
    $('#direccionMOD').val(datos[13]);
    $('#enfermedadMOD').val(datos[14]);
    $('#ojoMOD').val(datos[17]);
    $('#observacionMOD').val(datos[16]);

});


$('.seebtnPaciente').on('click', function() {
    $tr = $(this).closest('tr');

    var datos = $tr.children("td").map(function() {
        return $(this).text();

    });

    document.getElementById('cedulapaView').innerHTML = datos[1];
    document.getElementById('nombrepaView').innerHTML = datos[7];
    document.getElementById('apellidopaView').innerHTML = datos[8];
    document.getElementById('generopaView').innerHTML = datos[9];
    document.getElementById('fechaNacimientopaView').innerHTML = datos[10];
    document.getElementById('edadpaView').innerHTML = datos[3];
    document.getElementById('correopaView').innerHTML = datos[12];
    document.getElementById('direccionpaView').innerHTML = datos[13];
    document.getElementById('telefonopaView').innerHTML = datos[4];
    document.getElementById('civilpaView').innerHTML = datos[11];
    document.getElementById('enfermedadView').innerHTML = datos[5];
    document.getElementById('ojoView').innerHTML = datos[15];
    document.getElementById('observacionView').innerHTML = datos[16];


});

async function validaEditarPaciente() {
    await this.commonValidatePaciente(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Paciente",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editPacienteEnvio();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });

        }
    });
}

function commonValidatePaciente(action) {


    var cedula = $("#cedulaMOD").val();
    var nombre = $("#nombreMOD").val();
    var apellido = $("#apellidoMOD").val();
    var genero = $("#generoMOD").val();
    var telefono = $("#telefonoMOD").val();
    var fechaNacimiento = $("#fechaNacimientoMOD").val();
    var edad = $("#edadMOD").val();
    var civil = $("#civilMOD").val();
    var correo = $("#correoMOD").val();
    var direccion = $("#direccionMOD").val();
    var enfermedad = $("#enfermedadMOD").val();
    var ojo = $("#ojoMOD").val();
    var observacion = $("#observacionMOD").val();
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);


    return new Promise((resolve, reject) => {

        if (genero == "") {
            let autFocus = $("#generoMOD").focus();
            toastr.error("Ingrese Genero");
            return false;
        } else if (fechaNacimiento == "") {
            let autFocus = $("#fechaNacimientoMOD").focus();
            toastr.error("Ingrese Fecha Nacimiento");
            return false;
        } else if (fechaNacimiento == today) {
            let autFocus = $("#fechaNacimientoMOD").focus();
            toastr.error("Ingrese Fecha Nacimiento diferente a Fecha actual");
            return false;
        } else if (edad == "") {
            let autFocus = $("#edadMOD").focus();
            toastr.error("Ingrese Edad");
            return false;
        } else if (telefono == "") {
            let autFocus = $("#telefonoMOD").focus();
            toastr.error("Ingrese Telefono");
            return false;
        } else if (civil == "") {
            let autFocus = $("#civilMOD").focus();
            toastr.error("Ingrese Estado Civil");
            return false;
        } else if (correo == "") {
            let autFocus = $("#correoMOD").focus();
            toastr.error("Ingrese correo");
            return false;
        } else if (!validarEmail(correo)) {
            let autFocus = $("#correoMOD").focus();
            this.toastr.error("El correo no es válido !!");
            return false;
        } else if (direccion == "") {
            let autFocus = $("#direccionMOD").focus();
            toastr.error("Ingrese Direccion");
            return false;
        } else {
            return resolve(true);
        }
    });
}


function editPacienteEnvio() {
    var id = $('#id_pacienteMOD').val();
    var cedula = $("#cedulaMOD").val();
    var nombre = $("#nombreMOD").val();
    var apellido = $("#apellidoMOD").val();
    var genero = $("#generoMOD").val();
    var telefono = $("#telefonoMOD").val();
    var fechaNacimiento = $("#fechaNacimientoMOD").val();
    var edad = $("#edadMOD").val();
    var civil = $("#civilMOD").val();
    var correo = $("#correoMOD").val();
    var direccion = $("#direccionMOD").val();
    var enfermedad = $("#enfermedadMOD").val();
    var ojo = $("#ojoMOD").val();
    var observacion = $("#observacionMOD").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/editarPaciente.php",
        data: 'id=' + id + '&cedula=' + cedula + '&nombre=' + nombre + '&apellido=' + apellido + '&genero=' +
            genero + '&telefono=' + telefono + '&fechaNacimiento=' + fechaNacimiento + '&edad=' + edad + '&civil=' + civil +
            '&correo=' + correo + '&direccion=' + direccion + '&enfermedad=' + enfermedad + '&ojo=' + ojo + '&observacion=' + observacion,
        success: function(data) {
            /*  if (data) {
                 swal("Editar!", "Edición con Éxito", "success");
                 setTimeout(function() {
                       limpiarForm();
                     location.reload();
                 }, 600);
             } */
            $('#result-editPaciente').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Paciente", "error");
        }

    });
}

/* 
$(document).ready(function() {
    $('#fechaNacimientoMOD').on('keyup', function() {

        var fechaNacimientos = $("#fechaNacimientoMOD").val();

        let hoy = new Date();
        let fechaNacimiento = new Date(fechaNacimientos);
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
        if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())) {

            $("#edadMOD").val(edad);
            return true;
        }

    });
});

 */

///////  DELETE

$('.deletebtn').on('click', function() {

    $tr = $(this).closest('tr');
    fila = $(this).closest('tr');
    var datos = $tr.children("td").map(function() {

        return $(this).text();

    });

    $('#id_pacienteMOD').val(datos[0]);
    idata = datos[0];
    swal({
        title: "Atención!!",
        text: "Seguro desea eliminar Paciente?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            deleteCita(idata);
        } else {
            swal("Error al Eliminar !");
        }
    });

});

function deleteCita(idata) {
    var id = idata;
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 7,
        data: 'id=' + id,
        success: function(data) {
            console.log(data);
            swal("Eliminar!", "Paciente Eliminado con Éxito", "success");
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(error) {
            setTimeout(function() {
                swal("Eliminar!", "Error al Eliminar Paciente", "error");
            }, 1000);
        }
    });
}