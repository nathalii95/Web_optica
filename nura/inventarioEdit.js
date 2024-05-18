function SoloNumeros(evt) {
    let key = (event.which) ? event.which : event.keyCode;
    if (key > 31 && (key < 48 || key > 59)) {
        return false;
    }
    return true;
}


function correovalidad() {
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

/* 
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById('tablaMD').deleteRow(i);
}
$(document).ready(function() {
    $('#bt_addMD').click(function() {
        agregar();

    });
});

var cont = 0;
function agregar() {
     cont++;
    var fila =
        `  <tbody style="width:100%">        

         <tr class="selected" id="fila'${conts}'" ><td style="width: 0%;">${conts}</td>
    <td style="width: 8%;"><input type="text" class="form-control form-control-sm" placeholder="Ingrese"  required name="codigo[]" id="idCodigo"></td>
    <td style="width: 10%;">
        <select  class="form-control form-control-sm " required name="tipo[]" id="idTipo${conts}" >
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
    <td style="width: 15%;">
    <select  class="form-control form-control-sm " required name="estado[]"  >
    <option value="1">Stock</option>
    <option value="2">Vendido</option>
    <option value="3">Dañado</option>
    </select>
    </td>
    <td style="width: 0%;text-align: center;" >
        <button class="btn btn-danger" placement="top" ngbTooltip="Eliminar Items" onclick="deleteRow(this)" ><i
        class="fa fa-trash-o" ></i>
        </button>
    </td>
</tr>     </tbody>`;
    $('#tablaMD').append(fila);
    reordenar();

}

function reordenar() {
    var num = 1;
    $('#tablaMD tbody tr').each(function() {
        $(this).find('td').eq(0).text(num);
        num++;
    });
} */

var contss = 0;
////////////EDIT
$('.editbtn').on('click', function() {
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
                success: function(data) {
                    console.log("holass222");
                    console.log(data);
                    var tableid = $("#tablaMD");
                    tableid.find('tr td').remove();
                    setTimeout(function() {

                        $(data).each(function(i, v) {
                            contss++;
                            var fila =
                                `  <tbody style="width:100%">                              
                        <tr>
                            <td style="visibility:collapse;display: none;"><input type="text"  name="id[]" disabled   value="${v.id_ingreso_dt}"></td>
                            <td style="width: 0%;">${contss}</td>
                            <td style="width: 8%;"><input type="text" style="text-align: center;" class="form-control  form-control-sm text-center"   name="codigo[]" disabled   value="${v.codigo_producto}"></td>
                            <td style="width: 15%;">
                            <input type="text" style="text-align: center;" class="form-control  form-control-sm text-center"   name="tipo[]" disabled id="idTipo${contss}" value="${v.tipo_nombre}">
                            </td>                                                                                  
                            <td style="width: 5%;"><input type="number"   style="text-align: center;" disabled class="form-control form-control-sm text-center" name="compra[]"  value="${v.precio_compra}"></td>
                            <td style="width: 5%;"><input type="number"  style="text-align: center;"  disabled class="form-control form-control-sm text-center" name="venta[]"  value="${v.precio_venta}"></td>
                            <td style="width: 8%;"><input type="text"  style="text-align: center;" disabled  class="form-control form-control-sm text-center" name="marca[]" value="${v.marca}"></td>
                            <td style="width: 10%;"><textarea type="text"  style="text-align: left;" disabled class="form-control form-control-sm text-left" name="detalle[]">${v.detalle}</textarea></td>
                            <td style="width: 8%;">
                            <select  class="form-control form-control-sm " required name="estado[]"  >
                            <option value="${v.estado}">Stock</option>
                            <option value="2">Vendido</option>
                            <option value="3">Dañado</option>
                            </select>
                            </td>
                            </tr>     </tbody>`;
                            $('#tablaMD').append(fila);

                        });
                    }, 500);
                },
            });
        },
    });
});