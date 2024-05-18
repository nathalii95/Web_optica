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


async function validaRegistroTipoProducto() {

    await this.validaRegistrosDatos(0).then(resp => {
        if (resp) {
            setTimeout(function() {
                envioDato();
            }, 1500);
        }
    });
}


function validaRegistrosDatos(action) {
    var tipoProduct = $("#nombreTipo").val();

    return new Promise((resolve, reject) => {

        if (tipoProduct == "") {
            let autFocus = $("#nombreTipo").focus();
            toastr.error("Ingrese Nombre Tipo Producto");
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

    var tipoProduct = $("#nombreTipo").val();
    var detalle = $("#detalle").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/guardaTipoProducto.php",
        data: 'tipoProduct=' + tipoProduct + '&detalle=' + detalle,
        success: function(data) {
            $('#result-tipoProduct').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Nombre Tipo Producto", "error");
        }
    });

}


////EDITAR ENFERMEDAD

async function validaEditarTipoProducto() {
    await this.commonValidateTipoProducto(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Tipo Producto",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editTipoProductoEnvio();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });

        }
    });
}

function commonValidateTipoProducto(action) {

    var nombre = $("#TipoProductoMD").val();

    return new Promise((resolve, reject) => {

        if (nombre == "") {
            let autFocus = $("#TipoProductoMD").focus();
            toastr.error("Ingrese Nombre Tipo");
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
    console.log(datos);
    $('#id_TipoProductoMOD').val(datos[1]);
    $('#TipoProductoMD').val(datos[2]);
    $('#detalleMD').val(datos[3]);


});

function editTipoProductoEnvio() {
    var id = $('#id_TipoProductoMOD').val();
    var nombre = $("#TipoProductoMD").val();
    var detalleMD = $("#detalleMD").val();

    $.ajax({
        type: "POST",
        method: "POST",
        url: "phpEnvioData/editarTipoProducto.php",
        data: 'id=' + id + '&nombre=' + nombre + '&detalleMD=' + detalleMD,
        success: function(data) {
            $('#result-TipoProductoEdit').fadeIn(1000).html(data);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Tipo Producto", "error");
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

    $('#id_TipoProductoMOD').val(datos[1]);
    idata = datos[1];
    swal({
        title: "Atención!!",
        text: "Seguro desea eliminar  Tipo Producto?",
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
        url: 'phpEnvioData/validadato.php?dato=' + 14,
        data: 'id=' + id,
        success: function(data) {

            swal("Eliminar!", "Tipo Producto Eliminado con Éxito", "success");
            setTimeout(function() {
                location.reload();
            }, 1000);
        },
        error: function(error) {
            setTimeout(function() {
                swal("Eliminar!", "Error al Eliminar  Tipo Producto", "error");
            }, 1000);
        }
    });
}