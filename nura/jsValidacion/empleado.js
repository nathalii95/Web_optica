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


async function validaRegistroEmpleado() {

    await this.validaRegistrosDatos(0).then(resp => {
        if (resp) {
            setTimeout(function() {
                envioDato();
            }, 1500);
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
    var usuario = $("#usuario").val();
    var contrasena = $("#contrasena").val();
    var cargo = $("#cargo").val();
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
            let autFocus = $("#nombre").focus();
            toastr.error("Ingrese Nombre");
            return false;
        } else if (apellido == "") {
            let autFocus = $("#apellido").focus();
            toastr.error("Ingrese Apellido");
            return false;
        } else if (genero == "") {
            let autFocus = $("#genero").focus();
            toastr.error("Ingrese Genero");
            return false;
        } else if (fechaNacimiento == "") {
            let autFocus = $("#fechaNacimiento").focus();
            toastr.error("Ingrese Fecha Nacimiento");
            return false;
        } else if (fechaNacimiento == today) {
            let autFocus = $("#fechaNacimiento").focus();
            toastr.error("Ingrese Fecha Nacimiento diferente a Fecha actual");
            return false;
        } else if (edad == "") {
            let autFocus = $("#edad").focus();
            toastr.error("Ingrese Edad");
            return false;
        } else if (telefono == "") {
            let autFocus = $("#telefono").focus();
            toastr.error("Ingrese Telefono");
            return false;
        } else if (civil == "") {
            let autFocus = $("#civil").focus();
            toastr.error("Ingrese Estado Civil");
            return false;
        } else if (correo == "") {
            let autFocus = $("#correo").focus();
            toastr.error("Ingrese correo");
            return false;
        } else if (!validarEmail(correo)) {
            let autFocus = $("#correo").focus();
            this.toastr.error("El correo no es válido !!");
            return false;
        } else if (direccion == "") {
            let autFocus = $("#direccion").focus();
            toastr.error("Ingrese Direccion");
            return false;
        } else if (usuario == "") {
            let autFocus = $("#usuario").focus();
            toastr.error("Ingrese Usuario");
            return false;
        } else if (contrasena == "") {
            let autFocus = $("#contrasena").focus();
            toastr.error("Ingrese Contrasena");
            return false;
        } else if (cargo == "") {
            let autFocus = $("#cargo").focus();
            toastr.error("Ingrese Cargo");
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
            url: 'phpEnvioData/validadato.php?dato=' + 2,
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

function envioDato() {
    swal({
        title: "Atención!!",
        text: "Seguro desea enviar Mensaje?",
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
    var usuario = $("#usuario").val();
    var contrasena = $("#contrasena").val();
    var cargo = $("#cargo").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/guardarEmpleado.php",
        data: 'cedula=' + cedula + '&nombre=' + nombre + '&apellido=' + apellido + '&genero=' +
            genero + '&telefono=' + telefono + '&fechaNacimiento=' + fechaNacimiento + '&edad=' + edad + '&civil=' + civil +
            '&correo=' + correo + '&direccion=' + direccion + '&usuario=' + usuario + '&contrasena=' + contrasena + '&cargo=' + cargo,
        success: function(data) {
            $('#result-empleado').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Paciente", "error");
        }
    });

}
/*  
$(document).ready(function() {
    $('#fechaNacimiento').on('keyup', function() {

        var fechaNacimientos = $("#fechaNacimiento").val();

         var data = new Date(fechaNacimientos);
          var data2 = data.getFullYear() + 1;

          console.log(data2.toString().length);

          if (data2.toString().length != 4) {
              var data3 = "";
               console.log(data3);
                var date = new Date(); 
              $("#fechaNacimiento").val(data3);
          } 

        let hoy = new Date();
        let fechaNacimiento = new Date(fechaNacimientos);
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
        if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())) {

            console.log(edad);
            $("#edad").val(edad);
            return true;
        }


    });
});*/

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

//mMODIFICAR EMPLEADO

$('.editbtn').on('click', function() {
    $tr = $(this).closest('tr');

    var datos = $tr.children("td").map(function() {
        return $(this).text();

    });

    $('#id_empleadoMOD').val(datos[0]);
    $('#cedulaMOD').val(datos[1]);
    $('#nombreMOD').val(datos[3]);
    $('#apellidoMOD').val(datos[4]);

    $('#generoMOD').val(datos[5]);
    $('#fechaNacimientoMOD').val(datos[6]);
    $('#edadMOD').val(datos[7]);
    $('#telefonoMOD').val(datos[8]);
    $('#civilMOD').val(datos[9]);
    $('#correoMOD').val(datos[10]);
    $('#direccionMOD').val(datos[11]);
    $('#usuarioMOD').val(datos[12]);
    $('#contrasenaMOD').val(datos[13]);
    $('#cargoMOD').val(datos[14]);

});

$('.seebtn').on('click', function() {
    $tr = $(this).closest('tr');

    var datos = $tr.children("td").map(function() {
        return $(this).text();

    });


    document.getElementById('cedulaView').innerHTML = datos[1];
    document.getElementById('nombreView').innerHTML = datos[3];
    document.getElementById('apellidoView').innerHTML = datos[4];
    document.getElementById('generoView').innerHTML = datos[5];
    document.getElementById('fechaNacimientoView').innerHTML = datos[6];
    document.getElementById('edadView').innerHTML = datos[7];
    document.getElementById('telefonoView').innerHTML = datos[8];
    document.getElementById('civilView').innerHTML = datos[9];
    document.getElementById('correoView').innerHTML = datos[10];
    document.getElementById('direccionView').innerHTML = datos[11];
    document.getElementById('usuarioView').innerHTML = datos[12];
    document.getElementById('contrasenaView').innerHTML = datos[13];
    document.getElementById('cargoView').innerHTML = datos[15];


});


async function validaEditarEmpleado() {
    await this.commonValidateEmpleado(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Empleado",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editEmpleadoEnvio();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });

        }
    });
}

function commonValidateEmpleado(action) {


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
    var usuario = $("#usuarioMOD").val();
    var contrasena = $("#contrasenaMOD").val();
    var cargo = $("#cargoMOD").val();
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);


    return new Promise((resolve, reject) => {

        if (cedula == "") {
            let autFocus = $("#cedulaMOD").focus();
            toastr.error("Ingrese Cedula");
            return false;
        } else if (nombre == "") {
            let autFocus = $("#nombreMOD").focus();
            toastr.error("Ingrese Nombre");
            return false;
        } else if (apellido == "") {
            let autFocus = $("#apellidoMOD").focus();
            toastr.error("Ingrese Apellido");
            return false;
        } else if (genero == "") {
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
        } else if (usuario == "") {
            let autFocus = $("#usuarioMOD").focus();
            toastr.error("Ingrese Usuario");
            return false;
        } else if (contrasena == "") {
            let autFocus = $("#contrasenaMOD").focus();
            toastr.error("Ingrese Contrasena");
            return false;
        } else if (cargo == "") {
            let autFocus = $("#cargoMOD").focus();
            toastr.error("Ingrese Cargo");
            return false;
        } else {
            return resolve(true);
        }
    });
}

$(document).ready(function() {
    $('#cedulaMOD').on('keyup', function() {

        var cedula = $("#cedulaMOD").val();
        /*         console.log(cedula.length); */
        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 2,
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

$(document).ready(function() {
    $('#fechaNacimientoMOD').on('keyup', function() {

        var fechaNacimientos = $("#fechaNacimientoMOD").val();

        /*   var data = new Date(fechaNacimientos);
          var data2 = data.getFullYear() + 1;

          console.log(data2.toString().length);

          if (data2.toString().length != 4) {
              var data3 = "";
               console.log(data3);
                var date = new Date(); 
              $("#fechaNacimiento").val(data3);
          } */

        let hoy = new Date();
        let fechaNacimiento = new Date(fechaNacimientos);
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
        let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
        if (diferenciaMeses < 0 || (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())) {

            console.log(edad);
            $("#edadMOD").val(edad);
            return true;
        }


    });
});


function editEmpleadoEnvio() {
    var id = $('#id_empleadoMOD').val();
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
    var usuario = $("#usuarioMOD").val();
    var contrasena = $("#contrasenaMOD").val();
    var cargo = $("#cargoMOD").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/editarEmpleado.php",
        data: 'id=' + id + '&cedula=' + cedula + '&nombre=' + nombre + '&apellido=' + apellido + '&genero=' +
            genero + '&telefono=' + telefono + '&fechaNacimiento=' + fechaNacimiento + '&edad=' + edad + '&civil=' + civil +
            '&correo=' + correo + '&direccion=' + direccion + '&usuario=' + usuario + '&contrasena=' + contrasena + '&cargo=' + cargo,
        success: function(data) {
            /*  if (data) {
                 swal("Editar!", "Edición con Éxito", "success");
                 setTimeout(function() {
                       limpiarForm();
                     location.reload();
                 }, 600);
             } */
            $('#result-empleadoEdit').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Paciente", "error");
        }

    });
}


///////  DELETE

$('.deletebtn').on('click', function() {

    $tr = $(this).closest('tr');
    fila = $(this).closest('tr');
    var datos = $tr.children("td").map(function() {

        return $(this).text();

    });

    $('#id_empleadoMOD').val(datos[0]);
    idata = datos[0];
    swal({
        title: "Atención!!",
        text: "Seguro desea eliminar Empleado?",
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
    console.log(id);
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 3,
        data: 'id=' + id,
        success: function(data) {
            console.log(data);
            swal("Eliminar!", "Empleado Eliminado con Éxito", "success");
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(error) {
            setTimeout(function() {
                swal("Eliminar!", "Error al Eliminar Empleado", "error");
            }, 1000);
        }
    });
}