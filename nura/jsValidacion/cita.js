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


$(document).ready(function() {
    $('#cedulaCita').on('change', function() {
        document.getElementById("fecha").disabled = false;
        /*        document.getElementById("hora").disabled = true; */
        document.getElementById("btnGuardar").disabled = false;
        var cedula = $("#cedulaCita").val();

        $.ajax({
            type: "POST",
            methoxd: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 5,
            data: 'cedula=' + cedula,
            success: function(data) {
                if (data.length == 0) {
                    $('#nombre').val('');
                    $("#apellido").val('');
                } else {
                    var nombre = data[0].nombre;
                    var apellido = data[0].apellido;
                    $("#nombre").val(nombre);
                    $("#apellido").val(apellido);
                    var cedula = $("#cedulaCita").val();
                    $.ajax({
                        type: "POST",
                        method: "POST",
                        url: "phpEnvioData/validar_existCita.php",
                        data: 'cedula=' + cedula,
                        success: function(data) {
                            /*    console.log("hola");
                               console.log(data); */
                            if (data == 0) {
                                $('#result').show();
                                /*  console.log("hola1"); */
                            } else {
                                $('#result-cita').fadeIn(1000).html(data);
                                /*  console.log("hola2"); */
                                setTimeout(function() {
                                    $('#result').hide();
                                    $('#result-cita').hide();
                                    /*   console.log("hola3"); */
                                    setTimeout(function() {
                                        $('#result').show();
                                        $("#cedulaCita").val('');
                                        /* console.log("hola3"); */
                                    }, 30);
                                }, 1000);
                            }
                        }
                    });
                }
            },
        });
    });
});


$(document).ready(function() {
    $('#fecha').on('change', function() {
        $('#result-cita').hide();
        document.getElementById("hora").disabled = false;
        var fecha = $("#fecha").val();
        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 8,
            data: 'fecha=' + fecha,
            success: function(data) {
                console.log(data);
                if (data.length !== 0) {
                    var hora = $("#hora");

                    $(data).each(function(i, v) {

                        if (v.hora == 0) {
                            hora.find('option[value=0]').remove();
                        } else if (v.hora == 1) {
                            hora.find('option[value=1]').remove();
                        } else if (v.hora == 2) {
                            hora.find('option[value=2]').remove();
                        } else if (v.hora == 3) {
                            hora.find('option[value=3]').remove();
                        } else if (v.hora == 4) {
                            hora.find('option[value=4]').remove();
                        } else if (v.hora == 5) {
                            hora.find('option[value=5]').remove();
                        } else if (v.hora == 6) {
                            hora.find('option[value=6]').remove();
                        } else if (v.hora == 7) {
                            hora.find('option[value=7]').remove();
                        } else if (v.hora == 8) {
                            hora.find('option[value=8]').remove();
                        } else if (v.hora == 9) {
                            hora.find('option[value=9]').remove();
                        } else if (v.hora == 10) {
                            hora.find('option[value=10]').remove();
                        } else if (v.hora == 11) {
                            hora.find('option[value=11]').remove();
                        } else if (v.hora == 12) {
                            hora.find('option[value=12]').remove();
                        } else if (v.hora == 13) {
                            hora.find('option[value=13]').remove();
                        } else if (v.hora == 14) {
                            hora.find('option[value=14]').remove();
                        }





                    });

                } else {

                    var horas = $("#hora");
                    /*      horas.find('option').remove();
                         hora.find('option').remove(); */

                    horas.find('option').remove();
                    setTimeout(function() {
                        horas.append('<option value=""></option>');
                        horas.append('<option value="0">9:00 AM</option>');
                        horas.append('<option value="1">9:30 AM</option>');
                        horas.append('<option value="2">10:00 AM</option>');
                        horas.append('<option value="3">10:30 AM</option>');
                        horas.append('<option value="4">11:00 AM</option>');
                        horas.append('<option value="5">11:30 AM</option>');
                        horas.append('<option value="6">12:00 PM</option>');
                        horas.append('<option value="7">12:30 PM</option>');
                        horas.append('<option value="8">14:00 PM</option>');
                        horas.append('<option value="9">14:30 PM</option>');
                        horas.append('<option value="10">15:00 PM</option>');
                        horas.append('<option value="11">15:30 PM</option>');
                        horas.append('<option value="12">16:00 PM</option>');
                        horas.append('<option value="13">16:30 PM</option>');
                        horas.append('<option value="14">17:00 PM</option>');
                    }, 50);
                }
            },
        });
    });
});

/* $(document).ready(function() {
    $('#hora').on('change', function() {
        $('#result-cita').html('<div align="center"><img src="assets/images/loader.gif" width="80" height="80" ></div>').fadeOut(1000);
        var cedula = $("#cedulaCita").val();
        var fecha = $("#fecha").val();
        var hora = $("#hora").val();
        $.ajax({
            type: "POST",
            method: "POST",
            url: "phpEnvioData/validar_fechaHora.php",
            data: 'cedula=' + cedula + '&fecha=' + fecha + '&hora=' + hora,
            success: function(data) {
                console.log(data)
                $('#result-cita').fadeIn(800).html(data);
            }
        });

    });
}); */

var fp = flatpickr(document.querySelector('#fecha'), {
    /*   altFormat: "F j, Y", */
    /* altInput: true, */
    dateFormat: "Y-m-d",
    minDate: "today",
    "disable": [
        function(fp) {
            // return true to disable
            return (fp.getDay() === 0 || fp.getDay() === 6);
        }
    ],
    "locale": {
        "firstDayOfWeek": 1, // start week on Monday
        "weekdays": {
            "shorthand": ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            "longhand": ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        "months": {
            "shorthand": ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
            "longhand": ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
    },
    onChange: function(selectedDates, dateStr, instance) {}
});

async function validaRegistroCita() {

    await this.validaRegistrosDatos(0).then(resp => {
        if (resp) {
            setTimeout(function() {
                envioDato();
            }, 1500);
        }
    });
}


function validaRegistrosDatos(action) {
    var cedula = $("#cedulaCita").val();
    var fecha = $("#fecha").val();
    var hora = $("#hora").val();
    return new Promise((resolve, reject) => {

        if (cedula == "") {
            let autFocus = $("#cedulaCita").focus();
            toastr.error("Seleccione Cedula");
            return false;
        } else if (fecha == "") {
            let autFocus = $("#fecha").focus();
            toastr.error("Selecciones Fecha");

        } else if (hora == "") {
            let autFocus = $("#hora").focus();
            toastr.error("Selecciones Hora");

        } else {
            return resolve(true);
        }

    });

}

function envioDato() {
    swal({
        title: "Atención!!",
        text: "Seguro desea guardar Cita?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            saveCita();
        } else {
            swal("Error al Enviar Datos !");
            location.reload();
        }
    });
}

function saveCita() {

    var cedula = $("#cedulaCita").val();
    var fecha = $("#fecha").val();
    var hora = $("#hora").val();
    var observacion = $("#observacion").val();
    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/guardarCita.php",
        data: 'cedula=' + cedula + '&fecha=' + fecha + '&hora=' + hora + '&observacion=' + observacion,
        success: function(data) {
            $('#result-cita').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Cita", "error");
        }
    });

}

////EDITAR CITA


var fp = flatpickr(document.querySelector('#fechaMD'), {
    /*   altFormat: "F j, Y", */
    /* altInput: true, */
    dateFormat: "Y-m-d",
    minDate: "today",
    "disable": [
        function(fp) {
            // return true to disable
            return (fp.getDay() === 0 || fp.getDay() === 6);
        }
    ],
    "locale": {
        "firstDayOfWeek": 1, // start week on Monday
        "weekdays": {
            "shorthand": ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            "longhand": ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        },
        "months": {
            "shorthand": ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
            "longhand": ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
    },
    onChange: function(selectedDates, dateStr, instance) {
        /*  console.log('date: ', dateStr); */
    }
});


/* $(document).ready(function() {
    $('#horaMD').on('change', function() {
        var cedula = $("#cedulaCitaMD").val();
        var fecha = $("#fechaMD").val();
        var hora = $("#horaMD").val();
        $.ajax({
            type: "POST",
            method: "POST",
            url: "phpEnvioData/validar_fechaHora.php",
            data: 'cedula=' + cedula + '&fecha=' + fecha + '&hora=' + hora,
            success: function(data) {
                $('#result-citaEdit').fadeIn(1000).html(data);
            }
        });

    });
}); */


$(document).ready(function() {
    $('#fechaMD').on('change', function() {
        $('#result-citaEdit').hide();
        document.getElementById("horaMD").disabled = false;
    });
});


$(document).ready(function() {
    $('#fechaMD').on('change', function() {
        var fecha = $("#fechaMD").val();
        $('#result-citaEdit').hide();
        document.getElementById("horaMD").disabled = false;
        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 8,
            data: 'fecha=' + fecha,
            success: function(data) {
                console.log(data);
                if (data.length !== 0) {
                    var hora = $("#horaMD");

                    $(data).each(function(i, v) {

                        if (v.hora == 0) {
                            hora.find('option[value=0]').remove();
                        } else if (v.hora == 1) {
                            hora.find('option[value=1]').remove();
                        } else if (v.hora == 2) {
                            hora.find('option[value=2]').remove();
                        } else if (v.hora == 3) {
                            hora.find('option[value=3]').remove();
                        } else if (v.hora == 4) {
                            hora.find('option[value=4]').remove();
                        } else if (v.hora == 5) {
                            hora.find('option[value=5]').remove();
                        } else if (v.hora == 6) {
                            hora.find('option[value=6]').remove();
                        } else if (v.hora == 7) {
                            hora.find('option[value=7]').remove();
                        } else if (v.hora == 8) {
                            hora.find('option[value=8]').remove();
                        } else if (v.hora == 9) {
                            hora.find('option[value=9]').remove();
                        } else if (v.hora == 10) {
                            hora.find('option[value=10]').remove();
                        } else if (v.hora == 11) {
                            hora.find('option[value=11]').remove();
                        } else if (v.hora == 12) {
                            hora.find('option[value=12]').remove();
                        } else if (v.hora == 13) {
                            hora.find('option[value=13]').remove();
                        } else if (v.hora == 14) {
                            hora.find('option[value=14]').remove();
                        }
                    });
                } else {
                    /*    var horaShow = $("#horaMD").val(); */
                    var horas = $("#horaMD");
                    /*      horas.find('option').remove();
                         hora.find('option').remove(); */
                    horas.find('option').remove();
                    setTimeout(function() {
                        horas.append('<option value=""></option>');
                        horas.append('<option value="0">9:00 AM</option>');
                        horas.append('<option value="1">9:30 AM</option>');
                        horas.append('<option value="2">10:00 AM</option>');
                        horas.append('<option value="3">10:30 AM</option>');
                        horas.append('<option value="4">11:00 AM</option>');
                        horas.append('<option value="5">11:30 AM</option>');
                        horas.append('<option value="6">12:00 PM</option>');
                        horas.append('<option value="7">12:30 PM</option>');
                        horas.append('<option value="8">14:00 PM</option>');
                        horas.append('<option value="9">14:30 PM</option>');
                        horas.append('<option value="10">15:00 PM</option>');
                        horas.append('<option value="11">15:30 PM</option>');
                        horas.append('<option value="12">16:00 PM</option>');
                        horas.append('<option value="13">16:30 PM</option>');
                        horas.append('<option value="14">17:00 PM</option>');
                    }, 50);
                }
            },
        });
    });
});

async function validaEditarCita() {
    await this.commonValidateCita(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Cita",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editCitaEnvio();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });
        }
    });
}

function commonValidateCita(action) {
    var cedula = $("#cedulaCitaMD").val();
    var fecha = $("#fechaMD").val();
    var hora = $("#horaMD").val();
    var estado = $("#estadoMD").val();
    /*  console.log(estado); */
    return new Promise((resolve, reject) => {
        if (fecha == "") {
            let autFocus = $("#fechaMD").focus();
            toastr.error("Selecciones Fecha");
        } else if (hora == "") {
            let autFocus = $("#horaMD").focus();
            toastr.error("Selecciones Hora");
        } else if (estado == '1') {
            let autFocus = $("#estadoMD").focus();
            toastr.error("Estado es diferente a Ocupado");
        } else {
            return resolve(true);
        }
    });
}

$('.editbtn').on('click', function() {
    $tr = $(this).closest('tr');
    var datos = $tr.children("td").map(function() {

        return $(this).text();
    });
    $('#id_agendamiento').val(datos[0]);
    $('#cedulaCitaMD').val(datos[4]);
    $('#fechaMD').val(datos[6]);
    $('#horaMD').val(datos[1]);
    $('#estadoMD').val(datos[2]);

    $('#apellidoMD').val(datos[3]);
    $('#nombreSMD').val(datos[5]);
    $('#observacionMD').val(datos[9]);
});

window.onload = function() {
    /*   $tr = $(this).closest('tr');
      var datos = $tr.children("td").map(function() {

          return $(this).text();
      });

      $('#horaMD').val(datos[1]);
      var data = datos[1];
      $('#horaMD').val(datos[1]);
      var horas = $("#horaMD");

      horas.append('<option value="' + data + '">' + data + '</option>');
      horas.append('<option value=""></option>');
      horas.append('<option value="0">9:00 AM</option>');
      horas.append('<option value="1">9:30 AM</option>');
      horas.append('<option value="2">10:00 AM</option>');
      horas.append('<option value="3">10:30 AM</option>');
      horas.append('<option value="4">11:00 AM</option>');
      horas.append('<option value="5">11:30 AM</option>');
      horas.append('<option value="6">12:00 PM</option>');
      horas.append('<option value="7">12:30 PM</option>');
      horas.append('<option value="8">14:00 PM</option>');
      horas.append('<option value="9">14:30 PM</option>');

      horas.append('<option value="10">15:00 PM</option>');
      horas.append('<option value="11">15:30 PM</option>');
      horas.append('<option value="12">16:00 PM</option>');

      horas.append('<option value="13">16:30 PM</option>');
      horas.append('<option value="14">17:00 PM</option>'); */
};

function editCitaEnvio() {
    var id = $("#id_agendamiento").val();
    var cedula = $("#cedulaCitaMD").val();
    var fecha = $("#fechaMD").val();
    var hora = $("#horaMD").val();
    var estado = $("#estadoMD").val();
    var observacion = $("#observacionMD").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/editarCita.php",
        data: 'id=' + id + '&cedula=' + cedula + '&fecha=' + fecha + '&hora=' + hora + '&estado=' + estado + '&observacion=' + observacion,
        success: function(data) {
            $('#result-citaEdit').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Editar!", "Error al Editar ", "error");
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

    $('#id_agendamiento').val(datos[0]);
    idata = datos[0];
    console.log(idata);
    swal({
        title: "Atención!!",
        text: "Seguro desea cancelar Cita?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            deleteCita(idata);
        } else {
            swal("Error al cancelar !");
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
        url: 'phpEnvioData/validadato.php?dato=' + 4,
        data: 'id=' + id,
        success: function(data) {
            if (data) {
                swal("Eliminar!", "Cita Eliminado con Éxito", "success");
                setTimeout(function() {
                    location.reload();
                }, 1000);

            }
        },
        error: function(error) {
            setTimeout(function() {
                swal("Eliminar!", "Error al Cancelar Cita", "error");
            }, 1000);
        }
    });
}