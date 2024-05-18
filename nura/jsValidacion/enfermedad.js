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


async function validaRegistroEnfermedad() {

    await this.validaRegistrosDatos(0).then(resp => {
        if (resp) {
            setTimeout(function() {
                envioDato();
            }, 1500);
        }
    });
}


function validaRegistrosDatos(action) {
    var nombre = $("#nombre").val();

    return new Promise((resolve, reject) => {

        if (nombre == "") {
            let autFocus = $("#nombre").focus();
            toastr.error("Ingrese Enfermedad");
            return false;
        } else {
            return resolve(true);
        }

    });

}

function envioDato() {
    swal({
        title: "Atención!!",
        text: "Seguro desea guardar información?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            saveEnfermedad();
        } else {
            swal("Error al Enviar Datos !");
            location.reload();
        }
    });
}

function saveEnfermedad() {

    var nombre = $("#nombre").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/guardarEnfermedad.php",
        data: 'nombre=' + nombre,
        success: function(data) {
            $('#result-enfermedad').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Enfermedad", "error");
        }
    });

}

////EDITAR ENFERMEDAD

async function validaEditarEnfermedad() {
    await this.commonValidateEnfermedad(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Enfermedad",
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

function commonValidateEnfermedad(action) {

    var nombre = $("#nombreMD").val();


    return new Promise((resolve, reject) => {

        if (nombre == "") {
            let autFocus = $("#nombreMD").focus();
            toastr.error("Ingrese Enfermedad");
            return false;
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

    $('#id_enfermedadMOD').val(datos[1]);
    $('#nombreMD').val(datos[2]);


});

function editEmpleadoEnvio() {
    var id = $('#id_enfermedadMOD').val();
    var nombre = $("#nombreMD").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/editarEnfermedad.php",
        data: 'id=' + id + '&nombre=' + nombre,
        success: function(data) {
            /*  if (data) {
                 swal("Editar!", "Edición con Éxito", "success");
                 setTimeout(function() {
                       limpiarForm();
                     location.reload();
                 }, 600);
             } */
            $('#result-enfermedadEdit').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Enfermedad", "error");
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

    $('#id_enfermedadMOD').val(datos[1]);
    idata = datos[1];
    swal({
        title: "Atención!!",
        text: "Seguro desea eliminar Enfermedad?",
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
        url: 'phpEnvioData/validadato.php?dato=' + 4,
        data: 'id=' + id,
        success: function(data) {

            swal("Eliminar!", "Enfermedad Eliminado con Éxito", "success");
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(error) {
            setTimeout(function() {
                swal("Eliminar!", "Error al Eliminar Enfermedad", "error");
            }, 1000);
        }
    });
}