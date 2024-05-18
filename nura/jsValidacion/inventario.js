toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "1200",
    "hideDuration": "1200",
    "timeOut": "1200",
    "extendedTimeOut": "1200",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

function SoloNumeros(evt) {
    let key = (event.which) ? event.which : event.keyCode;
    if (key > 31 && (key < 48 || key > 59)) {
        return false;
    }
    return true;
}


$(document).on("click", ".eliminar", function() {
    var parent = $(this).parents().get(0);
    $(parent).remove();
});

$("#adicional").on('click', function() {
    $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
});

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
}

function correovalida() {
    var numeroFactura = $("#numero").val();
    var empresa = $("#empresa").val();
    var ruc = $("#ruc").val();
    var lugar = $("#lugar").val();
    var pago = $("#pago").val();
    var fechaC = $("#fechaCompra").val();
    var fechaI = $("#fechaIngreso").val();
    var observacion = $("#observacion").val();
    var codigo = $("#idCodigo").val();
    var detalle = $("#idDetalle").val();
    var idCompra = $("#idCompra").val();
    var idVenta = $("#idVenta").val();
    var idTipo = $("#idTipo").val();

    if (numeroFactura == "") {
        toastr.error("Ingrese Número de Factura");
        let autFocus = $("#numero").focus();
        return false;
    } else if (empresa == "") {

        toastr.error("Ingrese Nombre Empresa");
        let autFocus = $("#empresa").focus();
        return false;
    } else if (ruc == "") {

        toastr.error("Ingrese Ruc Empresa");
        let autFocus = $("#ruc").focus();
        return false;
    } else if (lugar == "") {

        toastr.error("Ingrese Dirección Empresa");
        let autFocus = $("#lugar").focus();
        return false;
    } else if (pago == 0) {
        toastr.error("Ingrese Forma Pago");
        let autFocus = $("#pago").focus();
        return false;
    }

}

function deleteRow(r) {
    console.log(r);
    var i = r.parentNode.parentNode.rowIndex;
    console.log(i)
    document.getElementById('tabla').deleteRow(i);
}

$(document).ready(function() {
    $('#bt_add').click(function() {
        agregar();

    });
});


var cont = 0;


function agregar() {
    cont++;
    var fila =

        `  <tbody style="width:100%">        

         <tr class="selected" id="fila' + cont + '" ><td style="width: 0%;">&nbsp;</td>
    <td style="width: 8%;"><input type="text" class="form-control form-control-sm" placeholder="Ingrese"  required name="codigo[]" id="idCodigo"></td>
    <td style="width: 10%;">
        <select  class="form-control form-control-sm " required name="tipo[]" id="idTipo${cont}" >
        <option value="0">Seleccione </option>
        <?php include_once("phpEnvioData/conexion.php");  
           $queryCargo = "SELECT * FROM tipo_producto";
                $resultado1 = $con->query($queryCargo);                           
                while($row=$resultado1->fetch_assoc()){ ?>
        <option value="<?php echo $row['id_tipo_producto']; ?>"><?php echo $row['tipo_nombre']; ?></option>
        <?php } ?>
        </select>
    </td>                                                                                  
    <td style="width: 5%;"><input type="number" class="form-control form-control-sm" required name="compra[]" id="idCompra" min="0" placeholder="0"  onKeyPress="return SoloNumeros(event); "  ></td>
    <td style="width: 5%;"><input type="number" class="form-control form-control-sm" required name="venta[]" id="idVenta" min="0" placeholder="0"    onKeyPress="return SoloNumeros(event);" ></td>
    <td style="width: 8%;"><input type="text" class="form-control form-control-sm" required name="marca[]" id="idMarca" placeholder="Ingrese"  ></td>
    <td style="width: 15%;"><textarea  class="form-control form-control-sm" name="detalle[]" id="idDetalle" placeholder="Ingrese Detalle"  ></textarea></td>
    <td style="width: 0%;text-align: center;" >
        <button class="btn btn-danger" placement="top" ngbTooltip="Eliminar Items" onclick="deleteRow(this)" ><i
        class="fa fa-trash-o" ></i>
        </button>
    </td>
</tr>     </tbody>`;


    $('#tabla').append(fila);


    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 13,
        success: function(data) {

            if (data) {
                var tipoId = $("#idTipo" + cont);
                tipoId.find('option').remove();
                tipoId.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) {
                    tipoId.append('<option value="' + v.id_tipo_producto + '">' + v.tipo_nombre + '</option>');
                });

            }
        },
    });
    reordenar();

}

function reordenar() {
    var num = 1;
    $('#tabla tbody tr').each(function() {
        $(this).find('td').eq(0).text(num);
        num++;
    });
}

window.onload = function() {
    agregar();
    var cont = 0;
    cont++;
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 13,

        success: function(data) {
            if (data) {
                var tipoId = $("#idTipo" + cont);
                tipoId.find('option').remove();
                tipoId.append('<option value="0">Seleccione</option>');
                $(data).each(function(i, v) {
                    tipoId.append('<option value="' + v.id_tipo_producto + '">' + v.tipo_nombre + '</option>');
                });

            }
        },
    });
};


////////////VISTA 
$('.seebtn').on('click', function() {
    $tr = $(this).closest('tr');

    var datos = $tr.children("td").map(function() {
        return $(this).text();

    });

    var id = datos[0];
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 15,
        data: 'id=' + id,
        success: function(data) {
            $('#numeroSee').val(data[0].num_factura);
            $('#empresaSee').val(data[0].empresa);
            $('#rucSee').val(data[0].ruc);
            $('#lugarSee').val(data[0].lugar);
            $('#pagoSee').val(data[0].forma_pago);
            $('#fechaCompraSee').val(data[0].fecha_compra);
            $('#fechaIngresoSee').val(data[0].fecha_ingreso);
            $('#observacionSee').val(data[0].observaciones);

            $.ajax({
                type: "POST",
                method: "POST",
                dataType: 'JSON',
                url: 'phpEnvioData/validadato.php?dato=' + 16,
                data: 'id=' + id,
                success: function(data) {
                    console.log("holass222");
                    console.log(data);
                    var tableid = $("#tablaSee");
                    tableid.find('tr td').remove();

                    setTimeout(function() {
                        var conts = 0;
                        $(data).each(function(i, v) {
                            conts++;
                            var fila =
                                `  <tbody style="width:100%">        
                        
                                 <tr>
                                 <td style="width: 0%;text-align: center;">${conts}</td>
                            <td style="width: 15%;text-align: center;">${v.codigo_producto}</td>
                            <td style="width: 15%;text-align: center;">${v.tipo_nombre}</td>                                                                                  
                            <td style="width: 15%;text-align: center;">${v.precio_compra}</td>
                            <td style="width: 15%;text-align: center;">${v.precio_venta}</td>
                            <td style="width: 15%;text-align: center;">${v.marca}</td>
                            <td style="width: 10%text-align: center;;">${v.detalle}</td>
                            <td style="width: 18%;text-align: center;">${v.nombre}</td>
                        </tr>     </tbody>`;

                            $('#tablaSee').append(fila);
                        });
                    }, 500);
                },
            });
        },
    });
});



////////////EDIT
var dataArray = [];
var contss = 0;
$('.editbtn').on('click', function() {

    /* document.getElementById("submit").disabled = true;
     */
    $tr = $(this).closest('tr');
    var datos = $tr.children("td").map(function() {
        return $(this).text();
    });

    var id = datos[0];
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 15,
        data: 'id=' + id,
        success: function(data) {
            $('#numeroMD').val(data[0].num_factura);
            $('#empresaMD').val(data[0].empresa);
            $('#rucMD').val(data[0].ruc);
            $('#lugarMD').val(data[0].lugar);
            $('#pagoMD').val(data[0].forma_pago);
            $('#fechaCompraMD').val(data[0].fecha_compra);
            $('#fechaIngresoMD').val(data[0].fecha_ingreso);
            $('#observacionMD').val(data[0].observaciones);

            $.ajax({
                type: "POST",
                method: "POST",
                dataType: 'JSON',
                url: 'phpEnvioData/validadato.php?dato=' + 16,
                data: 'id=' + id,
                success: function(dataDT) {

                    var tableid = $("#tablaMD");
                    tableid.find('tr td').remove();
                    setTimeout(function() {

                        $(dataDT).each(function(i, v) {
                            contss++;
                            var fila =
                                ` 
                         <tbody style="width:100%">                              
                        <tr>
                        <td  style="visibility:collapse;display: none;"><input type="hidden"  name="id[]"  value="${v.id_ingreso_dt}"></td>
                        <td  style="visibility:collapse;display: none;"><input type="hidden"  name="idIngreso"    value="${v.fk_ingreso}"></td>
                            <td style="width: 0%;">${contss}</td>
                            <td style="width: 8%;"><input type="text" style="text-align: center;" class="form-control  form-control-sm text-center" id="idCodigo${i}"  name="codigo[]" disabled   value="${v.codigo_producto}"></td>
                            <td style="width: 20%;">
                            <input type="text" style="text-align: center;" class="form-control  form-control-sm text-center"   name="tipo[]" disabled id="idTipo${i}" value="${v.tipo_nombre}">
                            </td>                                                                                  
                            <td style="width: 5%;"><input type="number"   style="text-align: center;"  class="form-control form-control-sm text-center" name="compra[]" id="idcompra${i}" onkeyup="myFunction2(${i})"  value="${v.precio_compra}"></td>
                            <td style="width: 5%;"><input type="number"  style="text-align: center;"   class="form-control form-control-sm text-center" name="venta[]"  id="idventa${i}"  onkeyup="myFunction2(${i})" value="${v.precio_venta}"></td>
                            <td style="width: 8%;"><input type="text"  style="text-align: center;"   class="form-control form-control-sm text-center" name="marca[]" id="idmarca${i}" onkeyup="myFunction2(${i})" value="${v.marca}"></td>
                            <td style="width: 15%;"><input type="text"  style="text-align: left;"  class="form-control form-control-sm text-left" name="detalle[]" id="iddetalle${i}" onkeyup="myFunction2(${i})" value="${v.detalle}"></textarea></td>
                            <td style="width: 8%;">
                            <select  class="form-control form-control-sm " id="idestado${i}" required name="estado[]"  onchange="myFunction3(${i})"  >
                            <option value="${v.estado}">${v.nombre}</option>
                            <option value="1">Stock</option>
                            <option value="2">Vendido</option>
                            <option value="3">Dañado</option>
                            </select>
                            </td>
                            </tr>     </tbody>`;
                            $('#tablaMD').append(fila);
                            dataArray.push(v);
                        });

                    }, 500);
                },
            });
        },
    });

});

function myFunction3(index) {
    var estado = $(`#idestado${index}`).val();
    dataArray[index]['estado'] = estado;
}

function myFunction2(index) {
    var compra = $(`#idcompra${index}`).val();
    var venta = $(`#idventa${index}`).val();
    var marca = $(`#idmarca${index}`).val();
    var detalle = $(`#iddetalle${index}`).val();

    dataArray[index]['precio_compra'] = compra;
    dataArray[index]['precio_venta'] = venta;
    dataArray[index]['marca'] = marca;
    dataArray[index]['detalle'] = detalle;
}

function validadEstado() {

    for (let index = 0; index < dataArray.length; index++) {

        if (dataArray[index]['estado'] == 1) {
            toastr.error("Modificar Estado del Ingreso");
            let autFocus = $("#idTipo" + index).focus();
            return false;
        } else if (dataArray[index]['estado'] !== 1) {
            return true;
        }
    }
}


/* $('.consultaBtn').on('click', function() {
    $("#tipoConsulta").val(0);
    $("#estadoConsulta").val(0);
    dataConsulta();
}); */

/* 
function filterTipo() {
    var tipo = $("#tipoConsulta").val();
    var estado = $("#estadoConsulta").val();
    if (tipo != 0) {
        envioConsulta(tipo, estado);
    } else {
        envioConsulta(tipo, estado);
    }
}

function filterEstado() {
    var tipo = $("#tipoConsulta").val();
    var estado = $("#estadoConsulta").val();
    if (estado != 0) {
        envioConsulta(tipo, estado);
    } else {
        envioConsulta(tipo, estado);
    }
}

function envioConsulta(tipo, estado) {
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 17,
        data: 'tipo=' + tipo + '&estado=' + estado,
        success: function(data) {
            if (data.length != 0) {
                var tableid = $("#tablaconsulta");
                tableid.find('tr td').remove();

                setTimeout(function() {
                    var conts = 0;
                    $(data).each(function(i, v) {
                        conts++;
                        var fila =
                            `  <tbody style="width:100%" class="text-center">        
                         <tr>
                    <td style="width: 0%;text-align: center;">${conts}</td>
                    <td style="width: 10%;text-align: center;">${v.codigo_producto}</td>
                    <td style="width: 10%;text-align: center;">${v.tipo_nombre}</td>                                                                                  
                    <td style="width: 10%;text-align: center;">${v.precio_compra}</td>
                    <td style="width: 10%;text-align: center;">${v.precio_venta}</td>
                    <td style="width: 10%;text-align: center;">${v.marca}</td>
                    <td style="width: 10%text-align: center;;">${v.detalle}</td>
                    <td style="width: 8%;text-align: center;">${v.nombre}</td>
                </tr>     </tbody>`;

                        $('#tablaconsulta').append(fila);
                    });
                }, 500);

            } else {
                var tableid = $("#tablaconsulta");
                tableid.find('tr td').remove();
            }
        },
    });
}

function dataConsulta() {
    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'phpEnvioData/validadato.php?dato=' + 18,
        success: function(data) {
            var tableid = $("#tablaconsulta");
            setTimeout(function() {
                var conts = 0;
                $(data).each(function(i, v) {
                    conts++;
                    var fila =
                        `  <tbody style="width:100%" class="text-center">        
                        <tr>
                        <td style="width: 0%;text-align: center;">${conts}</td>
                        <td style="width: 10%;text-align: center;">${v.codigo_producto}</td>
                        <td style="width: 10%;text-align: center;">${v.tipo_nombre}</td>                                                                                  
                        <td style="width: 10%;text-align: center;">${v.precio_compra}</td>
                        <td style="width: 10%;text-align: center;">${v.precio_venta}</td>
                        <td style="width: 10%;text-align: center;">${v.marca}</td>
                        <td style="width: 10%text-align: center;;">${v.detalle}</td>
                        <td style="width: 8%;text-align: center;">${v.nombre}</td>
                        </tr></tbody>
                    `;

                    $('#tablaconsulta').append(fila);
                });
            }, 500);
        },
    });

} */