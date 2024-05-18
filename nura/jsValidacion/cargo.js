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

async function validaRegistroCargo() {

    await this.validaRegistrosDatos(0).then(resp => {
        if (resp) {
            setTimeout(function() {
                envioDato();
            }, 1500);
        }
    });
}



function validaRegistrosDatos(action) {
    var cargo = $("#cargos").val();
    console.log(cargo);
    console.log("holas");
    return new Promise((resolve, reject) => {

        if (cargo == "") {
            let autFocus = $("#cargos").focus();
            toastr.error("Ingrese Nombre Cargo");
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
            saveCargo();
        } else {
            swal("Error al Enviar Datos !");
            location.reload();
        }
    });
}

function saveCargo() {

    var cargo = $("#cargos").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/guardarCargo.php",
        data: 'cargo=' + cargo,
        success: function(data) {
            $('#result-cargo').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Cargo", "error");
        }
    });

}

////EDITAR Cargo

async function validaEditarCargo() {
    await this.commonValidateCargo(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Cargo",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editCargoEnvio();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });

        }
    });
}

function commonValidateCargo(action) {
    var cargo = $("#cargoMD").val();

    return new Promise((resolve, reject) => {

        if (cargo == "") {
            let autFocus = $("#cargoMD").focus();
            toastr.error("Ingrese Cargo");
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

    $('#id_cargoMOD').val(datos[1]);
    $('#cargoMD').val(datos[2]);


});

function editCargoEnvio() {
    var id = $('#id_cargoMOD').val();
    var cargo = $("#cargoMD").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/editarCargo.php",
        data: 'id=' + id + '&cargo=' + cargo,
        success: function(data) {
            $('#result-cargoEdit').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Cargo", "error");
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

    $('#id_cargoMOD').val(datos[1]);
    idata = datos[1];
    swal({
        title: "Atención!!",
        text: "Seguro desea eliminar Cargo?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            deleteCargo(idata);
        } else {
            swal("Error al Eliminar !");
        }
    });

});

function deleteCargo(idata) {
    var id = idata;
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 5,
        data: 'id=' + id,
        success: function(data) {

            swal("Eliminar!", "Cargo Eliminado con Éxito", "success");
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(error) {
            setTimeout(function() {
                swal("Eliminar!", "Error al Eliminar Cargo", "error");
            }, 1000);
        }
    });
}