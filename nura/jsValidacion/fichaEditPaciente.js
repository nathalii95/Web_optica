window.onload = function() {
    console.log("hola");
    arrayAgudezaLejos = [];
    arrayAgudezaLectura = [];
    arrayData2 = [];
    arrayData = [];
    var usar = $('#usarFMD').val();
    var tipoDiseño = $('#tipoFMD').val();
    if (usar == 0 && tipoDiseño == "") {

        $('#result-usoTresFMD').hide();

    } else {
        $('#result-usoTresFMD').show();
    }
    var tipo_usuario = $("#tipo_usuario").val();
    if (tipo_usuario != 2) {
        visualLejos();
        visualLectura();
        medidasOptometrista();
        checkedData();
        /*    arrayDisabled2(); */
        /*         var usar = $('#usarFMD').val();
                var tipoDiseño = $('#tipoFMD').val(); */
        /* medidaslenteAntigua(); */
        medidaslenteAntigua();
        arrayDisabled1FMD();
        /*   console.log(tipoDiseño)
          console.log(usar) */
        /*   if (usar != 0 && tipoDiseño != "") {
           medidaslenteAntigua();
           arrayDisabled1FMD();
          $('#result-usoTresFMD').hide(); */

        /*         } else {
$('#result-usoTresFMD').show(); 

        }*/




    } else {

        $("#optomestristaAdmin").hide();

    }

};

$(document).ready(function() {
    $('#usarFMD').on('change', function() {
        var uso = $("#usarFMD").val();
        if (uso == '0') {
            $('#result-usoUnoFMD').hide();
            $('#result-usoTresFMD').hide();
            $('#usaAntiguoFMD').val('');
        } else {
            $('#result-usoUnoFMD').show();
            $('#result-usoTresFMD').show();
            $('#usaAntiguoFMD').val(0);

        }
    });
});


function arrayDisabled1FMD() {
    arrayData.forEach(function(d) {
        document.getElementById("lejosODsph" + 0).disabled = true;
        document.getElementById("lejosODsph" + 1).disabled = true;
        document.getElementById("lejosODsph" + 2).disabled = true;
        document.getElementById("lejosODsph" + 3).disabled = true;
        document.getElementById("lejosODcyl" + 0).disabled = true;
        document.getElementById("lejosODcyl" + 1).disabled = true;
        document.getElementById("lejosODcyl" + 2).disabled = true;
        document.getElementById("lejosODcyl" + 3).disabled = true;
        document.getElementById("lejosODeje" + 0).disabled = true;
        document.getElementById("lejosODeje" + 1).disabled = true;
        document.getElementById("lejosODeje" + 2).disabled = true;
        document.getElementById("lejosODeje" + 3).disabled = true;
    });
}


$(document).ready(function() {
    $('#tipoFMD').on('change', function() {
        var lente = $("#usarFMD").val();
        var tipoDiseño = $("#tipoFMD").val();
        if (lente == 1 && tipoDiseño == 1) {
            arrayData.forEach(function(d) {
                document.getElementById("lejosODsph" + 0).disabled = false;
                document.getElementById("lejosODsph" + 1).disabled = false;
                document.getElementById("lejosODcyl" + 0).disabled = false;
                document.getElementById("lejosODcyl" + 1).disabled = false;
                document.getElementById("lejosODeje" + 0).disabled = false;
                document.getElementById("lejosODeje" + 1).disabled = false;
                document.getElementById("lejosODsph" + 2).disabled = true;
                document.getElementById("lejosODsph" + 3).disabled = true;
                document.getElementById("lejosODcyl" + 2).disabled = true;
                document.getElementById("lejosODcyl" + 3).disabled = true;
                document.getElementById("lejosODeje" + 2).disabled = true;
                document.getElementById("lejosODeje" + 3).disabled = true;
                document.getElementById("lejosODsph" + 2).value = '';
                document.getElementById("lejosODsph" + 3).value = '';
                document.getElementById("lejosODcyl" + 2).value = '';
                document.getElementById("lejosODcyl" + 3).value = '';
                document.getElementById("lejosODeje" + 2).value = '';
                document.getElementById("lejosODeje" + 3).value = '';
            });
        } else {
            arrayData.forEach(function(d) {
                document.getElementById("lejosODsph" + 2).disabled = false;
                document.getElementById("lejosODsph" + 3).disabled = false;
                document.getElementById("lejosODcyl" + 2).disabled = false;
                document.getElementById("lejosODcyl" + 3).disabled = false;
                document.getElementById("lejosODeje" + 2).disabled = false;
                document.getElementById("lejosODeje" + 3).disabled = false;
            });
        }

    });
});


function medidaslenteAntigua() {
    var id_ficha = $("#idFMD").val();
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: 'phpEnvioData/validadato.php?dato=' + 31 + "&id_ficha=" + id_ficha,
        type: 'post',
        success: function(data) {
            arrayData = JSON.parse(data);
            /* var a = 0;
             (formatJson.length == 0) ? $('#btnUpdate').attr("disabled", true): $('#btnUpdate').attr("disabled", false);  */
            cabezera = `  <thead>
            <tr> 
            <th  colspan="2"></th>
            <th >SPH</th> 
            <th  >CYL</th> 
            <th >EJE</th> 
          </tr>
        </thead>`;
            tbody = ``;

            arrayData.forEach(function(d, index) {
                tbody = tbody + `<tr> 
                <td style="width: 18%;font-weight:bold;"   id="tipo${index}">${d.tipo}</td> 
                <td style="width: 12%;font-weight:bold;"   id="ojo${index}">${d.ojo}</td> 
                <td  style="width: 20%"><input type="text" class="form-control form-control-sm  "   name="lejosODsph2" id="lejosODsph${index}" value='${d.sph}' onkeyup="myFunction(${index})"></td>
                <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosODcy2l" id="lejosODcyl${index}" value='${d.cyl}' onkeyup="myFunction(${index})" ></td> 
                <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosODeje2" id="lejosODeje${index}"  value='${d.eje}' onkeyup="myFunction(${index})"  ></td> 
              </tr>`;
            });

            $('#output').append(`<table  class="table  text-center" style="width:100%" >` +
                cabezera + `<tbody >` + tbody + `</tbody>` + `</table>`);

        },
        error: function(error) {}
    });
}

function visualLectura() {
    var id_ficha = $("#idFMD").val();
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: 'phpEnvioData/validadato.php?dato=' + 21 + "&id_ficha=" + id_ficha,
        type: 'post',
        success: function(data) {
            arrayAgudezaLectura = JSON.parse(data);
            var a = 0;
            /*  (formatJson.length == 0) ? $('#btnUpdate').attr("disabled", true): $('#btnUpdate').attr("disabled", false);  */
            cabezera = `  <thead>
            <tr> 
          <th  colspan="1"></th>
          <th >Sin Lentes</th> 
          <th  >Lentes en uso</th> 
          <th >Con Correción</th> 
        </tr>
        </thead>`;
            tbody = ``;

            arrayAgudezaLectura.forEach(function(d, index) {
                tbody = tbody + ` <tr > 
                <td style="width: 18%;font-weight:bold;"   id="ojo${index}">${d.tipo_ojo}</td> 
                <td  style="width: 20%">
                      <select  class="form-control form-control-sm " name="lecturaAOL" id="lecturaAOL${index}"  onchange="myFunction3(${index})">
                      <option value="${d.sin_lentes}">Tipo ${d.sin_lentes}</option>
                              <option value="1">Tipo 1</option>
                             <option value="2">Tipo 2</option>
                             <option value="3">Tipo 3</option>
                             <option value="4">Tipo 4</option>
                             <option value="5">Tipo 5</option>
                             <option value="6">Tipo 6</option>
                             <option value="7">Tipo 7</option>
                            </select>
                
                </td>
                <td style="width: 20%">
                <select  class="form-control form-control-sm "name="lecturaODL" id="lecturaODL${index}"  onchange="myFunction3(${index})">
                <option value="${d.lentes_en_uso}">Tipo ${d.lentes_en_uso}</option>
                              <option value="1">Tipo 1</option>
                             <option value="2">Tipo 2</option>
                             <option value="3">Tipo 3</option>
                             <option value="4">Tipo 4</option>
                             <option value="5">Tipo 5</option>
                             <option value="6">Tipo 6</option>
                             <option value="7">Tipo 7</option>
                            </select>
                </td> 
                <td style="width: 20%">
                <select  class="form-control form-control-sm "  name="lecturaOIL" id="lecturaOIL${index}"  onchange="myFunction3(${index})">
                <option value="${d.con_correccion}">Tipo ${d.con_correccion}</option>
                <option value="1">Tipo 1</option>
                 <option value="2">Tipo 2</option>
                 <option value="3">Tipo 3</option>
                 <option value="4">Tipo 4</option>
                 <option value="5">Tipo 5</option>
                 <option value="6">Tipo 6</option>
                 <option value="6">Tipo 7</option>
                </select></td> 
              </tr>`;
            });

            $('#output3').append(`<table  class="table  text-center" style="width:100%" >` +
                cabezera + `<tbody >` + tbody + `</tbody>` + `</table>`);

        },
        error: function(error) {}
    });
}

function visualLejos() {
    var id_ficha = $("#idFMD").val();
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: 'phpEnvioData/validadato.php?dato=' + 20 + "&id_ficha=" + id_ficha,
        type: 'post',
        success: function(data) {
            arrayAgudezaLejos = JSON.parse(data);
            var a = 0;
            /*  (formatJson.length == 0) ? $('#btnUpdate').attr("disabled", true): $('#btnUpdate').attr("disabled", false);  */
            cabezera = `  <thead>
            <tr> 
              <th  colspan="1"></th>
              <th >Sin Lentes</th> 
              <th  >Lentes en uso</th> 
              <th >Con Correción</th> 
            </tr>
        </thead>`;
            tbody = ``;

            arrayAgudezaLejos.forEach(function(d, index) {
                tbody = tbody + `<tr > 
                <td  style="visibility:collapse;display: none;"><input type="hidden"   value="${d.id_agudez}"></td>
                <td style="width: 20%;font-weight:bold;"   id="ojo${index}">${d.tipo_ojo}</td> 
                <td  style="width: 20%"><input type="text" class="form-control form-control-sm  "   name="lejosAO" id="lejosAO${index}" value='${d.sin_lentes}'  onchange="myFunction2(${index})"></td>
                <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosOD" id="lejosOD${index}" value='${d.lentes_en_uso}'  onchange="myFunction2(${index})" ></td> 
                <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosOI" id="lejosOI${index}"  value='${d.con_correccion}'  onchange="myFunction2(${index})" ></td> 
              </tr>`;
            });

            $('#output2').append(`<table  class="table  text-center" style="width:100%" >` +
                cabezera + `<tbody >` + tbody + `</tbody>` + `</table>`);

        },
        error: function(error) {}
    });
}

function medidasOptometrista() {
    var id_ficha = $("#idFMD").val();
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: 'phpEnvioData/validadato.php?dato=' + 22 + "&id_ficha=" + id_ficha,
        type: 'post',
        success: function(data) {
            arrayData2 = JSON.parse(data);
            /* var a = 0;
             (formatJson.length == 0) ? $('#btnUpdate').attr("disabled", true): $('#btnUpdate').attr("disabled", false);  */
            cabezera = `  <thead>
            <tr> 
            <th  colspan="2"></th>
            <th >SPH</th> 
            <th  >CYL</th> 
            <th >EJE</th> 
          </tr>
        </thead>`;
            tbody = ``;

            arrayData2.forEach(function(d, index) {
                tbody = tbody + `<tr > 
                <td style="width: 18%;font-weight:bold;"   id="tipo${index}">${d.tipo}</td> 
                <td style="width: 12%;font-weight:bold;"   id="ojo${index}">${d.ojo}</td> 
                <td  style="width: 20%"><input type="text" class="form-control form-control-sm  "   name="lejosODsph2" id="lejosODsph2${index}" value='${d.sph}' onkeyup="myFunction4(${index})"></td>
                <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosODcy2l" id="lejosODcyl2${index}" value='${d.cyl}' onkeyup="myFunction4(${index})" ></td> 
                <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosODeje2" id="lejosODeje2${index}"  value='${d.eje}' onkeyup="myFunction4(${index})" ></td> 
              </tr>`;
            });

            $('#output4').append(`<table  class="table  text-center" style="width:100%" >` +
                cabezera + `<tbody >` + tbody + `</tbody>` + `</table>`);

        },
        error: function(error) {}
    });
}

function myFunction(index) {
    var sph = $(`#lejosODsph${index}`).val();
    var cyl = $(`#lejosODcyl${index}`).val();
    var eje = $(`#lejosODeje${index}`).val();
    arrayData[index]['sph'] = sph;
    arrayData[index]['cyl'] = cyl;
    arrayData[index]['eje'] = eje;

    if (arrayData[index].tipo == 'CERCA' && arrayData[index].ojo == 'OD' && arrayData[index]['sph'] < 1) {
        let autFocus = $("#lejosODsph" + index).focus();
        $("#lejosODsph" + index).val("");
        this.toastr.error("valor de sph del CERCA del ojo derecho son mayores a uno");
        return false;
    } else if (arrayData[index].tipo == 'CERCA' && arrayData[index].ojo == 'OI' && arrayData[index]['sph'] < 1) {
        let autFocus = $("#lejosODsph" + index).focus();
        $("#lejosODsph" + index).val("");
        this.toastr.error("valor de sph del lejo CERCA  del ojo izquierdo son mayores a uno");
        return false;
    } else if (arrayData[index].tipo == 'LEJOS' && arrayData[index].ojo == 'OD' && arrayData[index]['eje'] > 180) {
        let autFocus = $("#lejosODeje" + index).focus();
        $("#lejosODeje" + index).val("");
        this.toastr.error(" valor de Eje de lejos del ojo derecho mayores a cero y menores a 180 ");
        return false;
    } else if (arrayData[index].tipo == 'LEJOS' && arrayData[index].ojo == 'OI' && arrayData[index]['eje'] > 180) {
        let autFocus = $("#lejosODeje" + index).focus();
        $("#lejosODeje" + index).val("");
        this.toastr.error(" valor de Eje de lejos del ojo izquierdo son mayores a cero y menores a 180");
        return false;
    } else if (arrayData[index].tipo == 'LEJOS' && arrayData[index].ojo == 'OD' && arrayData[index]['cyl'] < 0) {
        /* toastr.error("Los valores de Medida cerca del ojo derecho debe ser mayor a uno"); */
        let autFocus = $("#lejosODcyl" + index).focus();
        $("#lejosODcyl" + index).val("");
        this.toastr.error(" valor de cyl del lejos del ojo derecho son mayores a cero");

        return false;

    } else if (arrayData[index].tipo == 'LEJOS' && arrayData[index].ojo == 'OI' && arrayData[index]['cyl'] < 0) {
        /* toastr.error("Los valores de Medida cerca del ojo derecho debe ser mayor a uno"); */
        let autFocus = $("#lejosODcyl" + index).focus();
        $("#lejosODcyl" + index).val("");
        this.toastr.error(" valor de cyl del lejos del ojo izquierdo son mayores a cero");
        return false;

    }
}


function myFunction2(index) {
    var sinLentes = $(`#lejosAO${index}`).val();
    var lenteUso = $(`#lejosOD${index}`).val();
    var conCorreciob = $(`#lejosOI${index}`).val();
    arrayAgudezaLejos[index]['sin_lentes'] = sinLentes;
    arrayAgudezaLejos[index]['lentes_en_uso'] = lenteUso;
    arrayAgudezaLejos[index]['con_correccion'] = conCorreciob;
}

function myFunction3(index) {
    var sinLentes = $(`#lecturaAOL${index}`).val();
    var lenteUso = $(`#lecturaODL${index}`).val();
    var conCorreciob = $(`#lecturaOIL${index}`).val();
    arrayAgudezaLectura[index]['sin_lentes'] = sinLentes;
    arrayAgudezaLectura[index]['lentes_en_uso'] = lenteUso;
    arrayAgudezaLectura[index]['con_correccion'] = conCorreciob;
}


function myFunction4(index) {
    var sph = $(`#lejosODsph2${index}`).val();
    var cyl = $(`#lejosODcyl2${index}`).val();
    var eje = $(`#lejosODeje2${index}`).val();
    arrayData2[index]['sph'] = sph;
    arrayData2[index]['cyl'] = cyl;
    arrayData2[index]['eje'] = eje;

    if (arrayData2[index].tipo == 'CERCA' && arrayData2[index].ojo == 'OD' && arrayData2[index]['sph'] < 1) {
        let autFocus = $("#lejosODsph2" + index).focus();
        $("#lejosODsph2" + index).val("");
        this.toastr.error("valor de sph del CERCA del ojo derecho son mayores a uno");
        return false;
    } else if (arrayData2[index].tipo == 'CERCA' && arrayData2[index].ojo == 'OI' && arrayData2[index]['sph'] < 1) {
        let autFocus = $("#lejosODsph2" + index).focus();
        $("#lejosODsph2" + index).val("");
        this.toastr.error("valor de sph del CERCA del ojo izquierdo son mayores a uno");
        return false;
    } else if (arrayData2[index].tipo == 'LEJOS' && arrayData2[index].ojo == 'OD' && arrayData2[index]['eje'] > 180) {
        let autFocus = $("#lejosODeje2" + index).focus();
        $("#lejosODeje2" + index).val("");
        this.toastr.error(" valor de Eje de lejos del ojo derecho mayores a cero y menores a 180 ");
        return false;
    } else if (arrayData2[index].tipo == 'LEJOS' && arrayData2[index].ojo == 'OI' && arrayData2[index]['eje'] > 180) {
        let autFocus = $("#lejosODeje2" + index).focus();
        $("#lejosODeje2" + index).val("");
        this.toastr.error(" valor de Eje de lejos del ojo izquierdo son mayores a cero y menores a 180");
        return false;
    } else if (arrayData2[index].tipo == 'LEJOS' && arrayData2[index].ojo == 'OD' && arrayData2[index]['cyl'] < 0) {
        /* toastr.error("Los valores de Medida cerca del ojo derecho debe ser mayor a uno"); */
        let autFocus = $("#lejosODcyl2" + index).focus();
        this.toastr.error(" valor de cyl del lejos del ojo derecho son mayores a cero");
        $("#lejosODcyl2" + index).val("");
        return false;

    } else if (arrayData2[index].tipo == 'LEJOS' && arrayData2[index].ojo == 'OI' && arrayData2[index]['cyl'] < 0) {
        /* toastr.error("Los valores de Medida cerca del ojo derecho debe ser mayor a uno"); */
        let autFocus = $("#lejosODcyl2" + index).focus();
        this.toastr.error(" valor de cyl del lejos del ojo izquierdo son mayores a cero");
        $("#lejosODcyl2" + index).val("");
        return false;

    }
}


function SumaTotalMD() {
    valorLuna = document.getElementById('lunasValormd').value;
    valorArmazon = document.getElementById('armazonValormd').value;
    var total = parseInt(valorArmazon) + parseInt(valorLuna);
    if (isNaN(total)) {
        $("#totalValormd").val('');
    } else {
        $("#totalValormd").val(total);
    }


}

function arrayDisabled2() {
    arrayData2.forEach(function(d) {
        document.getElementById("lejosODsph2" + 0).disabled = true;
        document.getElementById("lejosODsph2" + 1).disabled = true;
        document.getElementById("lejosODsph2" + 2).disabled = true;
        document.getElementById("lejosODsph2" + 3).disabled = true;
        document.getElementById("lejosODcyl2" + 0).disabled = true;
        document.getElementById("lejosODcyl2" + 1).disabled = true;
        document.getElementById("lejosODcyl2" + 2).disabled = true;
        document.getElementById("lejosODcyl2" + 3).disabled = true;
        document.getElementById("lejosODeje2" + 0).disabled = true;
        document.getElementById("lejosODeje2" + 1).disabled = true;
        document.getElementById("lejosODeje2" + 2).disabled = true;
        document.getElementById("lejosODeje2" + 3).disabled = true;
    });
}

$(document).ready(function() {
    $('#tipoOptMD').on('change', function() {
        var tipoDiseño = $("#tipoOptMD").val();
        if (tipoDiseño == 1) {

            arrayData2.forEach(function(d) {
                document.getElementById("lejosODsph2" + 0).disabled = false;
                document.getElementById("lejosODsph2" + 1).disabled = false;
                document.getElementById("lejosODcyl2" + 0).disabled = false;
                document.getElementById("lejosODcyl2" + 1).disabled = false;
                document.getElementById("lejosODeje2" + 0).disabled = false;
                document.getElementById("lejosODeje2" + 1).disabled = false;
                document.getElementById("lejosODsph2" + 2).disabled = true;
                document.getElementById("lejosODsph2" + 3).disabled = true;
                document.getElementById("lejosODcyl2" + 2).disabled = true;
                document.getElementById("lejosODcyl2" + 3).disabled = true;
                document.getElementById("lejosODeje2" + 2).disabled = true;
                document.getElementById("lejosODeje2" + 3).disabled = true;
                document.getElementById("lejosODsph2" + 2).value = '';
                document.getElementById("lejosODsph2" + 3).value = '';
                document.getElementById("lejosODcyl2" + 2).value = '';
                document.getElementById("lejosODcyl2" + 3).value = '';
                document.getElementById("lejosODeje2" + 2).value = '';
                document.getElementById("lejosODeje2" + 3).value = '';
            });
            $("#usaNuevoMD").val(1);
        } else {

            arrayData2.forEach(function(d) {
                document.getElementById("lejosODsph2" + 2).disabled = false;
                document.getElementById("lejosODsph2" + 3).disabled = false;
                document.getElementById("lejosODcyl2" + 2).disabled = false;
                document.getElementById("lejosODcyl2" + 3).disabled = false;
                document.getElementById("lejosODeje2" + 2).disabled = false;
                document.getElementById("lejosODeje2" + 3).disabled = false;
            });
            $("#usaNuevoMD").val(1);
        }

    });
});


function changeOtrosMD() {

    if (document.getElementById('inlineCheckbox6MD').checked) {
        document.getElementById("otrosMD").disabled = false;
    } else {
        document.getElementById("otrosMD").disabled = true;
    }
}


function checkedData() {
    var id_ficha = $("#idFMD").val();
    $.ajax({
        type: "POST",
        methoxd: "POST",
        dataType: 'JSON',
        contentType: "application/json; charset=utf-8",
        url: 'phpEnvioData/validadato.php?dato=' + 23 + "&id_ficha=" + id_ficha,
        success: function(data) {

            (data[0].mx1 == 1) ? document.getElementById('inlineCheckbox1MD').checked = true: document.getElementById('inlineCheckbox1MD').checked = false;
            (data[0].mx2 == 1) ? document.getElementById('inlineCheckbox2MD').checked = true: document.getElementById('inlineCheckbox2MD').checked = false;
            (data[0].mx3 == 1) ? document.getElementById('inlineCheckbox3MD').checked = true: document.getElementById('inlineCheckbox3MD').checked = false;
            (data[0].mx4 == 1) ? document.getElementById('inlineCheckbox4MD').checked = true: document.getElementById('inlineCheckbox4MD').checked = false;
            (data[0].mx5 == 1) ? document.getElementById('inlineCheckbox5MD').checked = true: document.getElementById('inlineCheckbox5MD').checked = false;
            (data[0].mx6 == 1) ? document.getElementById('inlineCheckbox6MD').checked = true: document.getElementById('inlineCheckbox6MD').checked = false;
            (data[0].mx6 == 1) ? document.getElementById("otrosMD").disabled = false: document.getElementById("otrosMD").disabled = true;

            $("#totalValormd").val(parseFloat(data[0].total).toFixed(2));
            $("#observacion6md").val(data[0].observacion_lente);
            $.ajax({
                type: "POST",
                methoxd: "POST",
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                url: 'phpEnvioData/validadato.php?dato=' + 24 + "&id_ficha=" + id_ficha,
                success: function(data) {

                    if (data.length > 0) {
                        idArmazon = data[0].id_lenteproducto;
                        $("#armazonValormd").val(parseFloat(data[0].valor).toFixed(2));
                        $("#armazonCodigoMD").val(data[0].codigo);
                        /*   $("#armazonCodigoMD").prepend('<option selected="selected" value="' + data[0].codigo + '">' + data[0].codigo + '</option>'); */
                    } else {
                        $("#armazonCodigoMD").prepend('<option selected="selected" value=""></option>');
                    }
                },
            });
            $.ajax({
                type: "POST",
                methoxd: "POST",
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                url: 'phpEnvioData/validadato.php?dato=' + 25 + "&id_ficha=" + id_ficha,
                success: function(data) {
                    if (data.length > 0) {
                        idLunas = data[0].id_lenteproducto;
                        $("#lunasValormd").val(parseFloat(data[0].valor).toFixed(2));
                        $("#lunasCodigoMD").prepend('<option selected="selected" value="' + data[0].codigo + '">' + data[0].codigo + '</option>');
                    } else {
                        $("#lunasCodigoMD").prepend('<option selected="selected" value=""></option>');
                    }
                },
            });
        },
        error: function(error) {}
    });
}



async function validaEditFicha() {
    await this.commonValidateFichaedit(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea guardar Ficha Médica",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editFichaEnvioCab();
                } else {
                    swal("Error al Editar !");
                    /* location.reload(); */
                }
            });
        }
    });
}


function commonValidateFichaedit(action) {

    return new Promise((resolve, reject) => {
        console.log(arrayAgudezaLectura);
        var tipo_usuario = $("#tipo_usuario").val();
        var tipoOpt = $("#tipoOptMD").val();
        var usoLente = $("#usarFMD").val();
        var tipo = $("#tipoFMD").val();
        var codigoArmazon = document.getElementById('armazonCodigoMD').value;
        var valorArmazon = document.getElementById('armazonValormd').value;
        var valorLuna = document.getElementById('lunasValormd').value;
        var codigoLuna = document.getElementById('lunasCodigoMD').value;
        var mx1 = document.getElementById('inlineCheckbox1MD').checked;
        var mx2 = document.getElementById('inlineCheckbox2MD').checked;
        var mx3 = document.getElementById('inlineCheckbox3MD').checked;
        var mx4 = document.getElementById('inlineCheckbox4MD').checked;
        var mx5 = document.getElementById('inlineCheckbox5MD').checked;
        var mx6 = document.getElementById('inlineCheckbox6MD').checked;
        var mx6_text = document.getElementById('otrosMD').value;
        if ((usoLente == undefined || usoLente == "")) {
            toastr.error("Selecione Si el Paciente Utiliza lentes o NO ");
            return false;
        } else if (usoLente == 1 && (tipo == undefined || tipo == "")) {
            toastr.error("Selecione Tipo medida de diseño Antiguo");
            return false;
        }

        if (usoLente == 1 && tipo != "" && arrayData.length == 4) {
            for (let index = 0; index < arrayData.length; index++) {
                if (arrayData[index]['tipo'] == 'LEJOS' && arrayData[index]['ojo'] == 'OD' && arrayData[index]['sph'] == "" && arrayData[index]['cyl'] == "" && arrayData[index]['eje'] == "") {
                    toastr.error("Los valores de medida Lejos de ojo Derecho  no puede ser vacio vacios medida de lentes Antiguo ");
                    return false;
                } else if (arrayData[index]['tipo'] == 'LEJOS' && arrayData[index]['ojo'] == 'OI' && arrayData[index]['sph'] == "" && arrayData[index]['cyl'] == "" && arrayData[index]['eje'] == "") {
                    toastr.error("Los valores de medida Lejos de ojo Izquierdo no puede ser vacio vacios medida de lentes Antiguo");
                    return false;
                } else if (tipo != 1 && arrayData[index]['tipo'] == 'CERCA' && arrayData[index]['ojo'] == 'OD' && arrayData[index]['sph'] == "" && arrayData[index]['cyl'] == "" && arrayData[index]['eje'] == "") {
                    toastr.error("Los valores de medida CERCA de ojo Derecho no puede ser vacio vacios medida de lentes Antiguo");
                    return false;
                } else if (tipo != 1 && arrayData[index]['tipo'] == 'CERCA' && arrayData[index]['ojo'] == 'IZ' && arrayData[index]['sph'] == "" && arrayData[index]['cyl'] == "" && arrayData[index]['eje'] == "") {
                    toastr.error("Los valores de medida CERCA de ojo Izquierdo no puede ser vacio vacios medida de lentes Antiguo");
                    return false;
                }
            }
        }

        if (arrayAgudezaLejos.length == 3) {
            for (let index = 0; index < arrayAgudezaLejos.length; index++) {
                if (arrayAgudezaLejos[index]['tipo_ojo'] == 'A.O' && arrayAgudezaLejos[index]['sin_lentes'] == '/20' && arrayAgudezaLejos[index]['lentes_en_uso'] == '/20' && arrayAgudezaLejos[index]['con_correccion'] == '/20') {
                    toastr.error("Ingrese valores dirente a /20 en AGUDEZA VISUAL LEJOS");
                    return false;
                } else if (arrayAgudezaLejos[index]['tipo_ojo'] == 'A.O' && arrayAgudezaLejos[index]['sin_lentes'] == '' && arrayAgudezaLejos[index]['lentes_en_uso'] == '' && arrayAgudezaLejos[index]['con_correccion'] == '') {
                    toastr.error("No ingrese valores vacios en AGUDEZA VISUAL LEJOS ");
                    return false;
                } else if (arrayAgudezaLejos[index]['tipo_ojo'] == 'O.D' && arrayAgudezaLejos[index]['sin_lentes'] == '/20' && arrayAgudezaLejos[index]['lentes_en_uso'] == '/20' && arrayAgudezaLejos[index]['con_correccion'] == '/20') {
                    toastr.error("Ingrese los valores /20  en AGUDEZA VISUAL LEJOS");
                    return false;
                } else if (arrayAgudezaLejos[index]['tipo_ojo'] == 'O.D' && arrayAgudezaLejos[index]['sin_lentes'] == '' && arrayAgudezaLejos[index]['lentes_en_uso'] == '' && arrayAgudezaLejos[index]['con_correccion'] == '') {
                    toastr.error("No ingrese valores vacios en AGUDEZA VISUAL LEJOS ");
                    return false;
                } else if (arrayAgudezaLejos[index]['tipo_ojo'] == 'O.I' && arrayAgudezaLejos[index]['sin_lentes'] == '/20' && arrayAgudezaLejos[index]['lentes_en_uso'] == '/20' && arrayAgudezaLejos[index]['con_correccion'] == '/20') {
                    toastr.error("Ingrese los valores diferente /20 correspondiente ");
                    return false;
                } else if (arrayAgudezaLejos[index]['tipo_ojo'] == 'O.I' && arrayAgudezaLejos[index]['sin_lentes'] == '' && arrayAgudezaLejos[index]['lentes_en_uso'] == '' && arrayAgudezaLejos[index]['con_correccion'] == '') {
                    toastr.error("No ingrese valores vacios AGUDEZA VISUAL LEJOS ");
                    return false;
                }
            }
        }

        if (arrayAgudezaLectura.length == 3) {

            for (let index = 0; index < arrayAgudezaLectura.length; index++) {
                if (arrayAgudezaLectura[index]['tipo_ojo'] == 'A.O' && arrayAgudezaLectura[index]['sin_lentes'] == 0 && arrayAgudezaLectura[index]['lentes_en_uso'] == 0 && arrayAgudezaLectura[index]['con_correccion'] == 0) {
                    toastr.error("Los valores de AMBOS OJO NO deben ser Tipo 0 de Agudeza Visual Proxima");
                    return false;
                } else if (arrayAgudezaLectura[index]['tipo_ojo'] == 'O.D' && arrayAgudezaLectura[index]['sin_lentes'] == 0 && arrayAgudezaLectura[index]['lentes_en_uso'] == 0 && arrayAgudezaLectura[index]['con_correccion'] == 0) {
                    toastr.error("Los valores de OJO DERECHO NO  deben ser Tipo 0 de Agudeza Visual Proxima");
                    return false;
                } else if (arrayAgudezaLectura[index]['tipo_ojo'] == 'O.I' && arrayAgudezaLectura[index]['sin_lentes'] == 0 && arrayAgudezaLectura[index]['lentes_en_uso'] == 0 && arrayAgudezaLectura[index]['con_correccion'] == 0) {
                    toastr.error("Los valores de OJO IZQUIERDO NO  deben ser Tipo 0 de Agudeza Visual Proxima");;
                    return false;
                }
            }

        }

        if (tipoOpt != "" && arrayData2.length == 4) {
            for (let index = 0; index < arrayData2.length; index++) {
                if (arrayData2[index]['tipo'] == 'LEJOS' && arrayData2[index]['ojo'] == 'OD' && arrayData2[index]['sph'] == "" && arrayData2[index]['cyl'] == "" && arrayData2[index]['eje'] == "") {
                    toastr.error("Los valores de medida Lejos de ojo Derecho  no puede ser vacio vacios medida de lentes Nuevo ");
                    return false;
                } else if (arrayData2[index]['tipo'] == 'LEJOS' && arrayData2[index]['ojo'] == 'OI' && arrayData2[index]['sph'] == "" && arrayData2[index]['cyl'] == "" && arrayData2[index]['eje'] == "") {
                    toastr.error("Los valores de medida Lejos de ojo Izquierdo no puede ser vacio vacios medida de lentes Nuevo");
                    return false;
                } else if (tipoOpt != 1 && arrayData2[index]['tipo'] == 'CERCA' && arrayData2[index]['ojo'] == 'OD' && arrayData2[index]['sph'] == "" && arrayData2[index]['cyl'] == "" && arrayData2[index]['eje'] == "") {
                    toastr.error("Los valores de medida CERCA de ojo Derecho no puede ser vacio vacios medida de lentes Nuevo");
                    return false;
                } else if (tipoOpt != 1 && arrayData2[index]['tipo'] == 'CERCA' && arrayData2[index]['ojo'] == 'IZ' && arrayData2[index]['sph'] == "" && arrayData2[index]['cyl'] == "" && arrayData2[index]['eje'] == "") {
                    toastr.error("Los valores de medida CERCA de ojo Izquierdo no puede ser vacio vacios medida de lentes Nuevo");
                    return false;
                }
            }
        }

        if (tipoOpt == "" || tipoOpt == undefined) {
            toastr.error("Selecione Tipo medida de diseño Actual");
            return false;
        } else if (mx1 == false && mx2 == false && mx3 == false && mx4 == false && mx5 == false && mx6 == false) {
            toastr.error("Selecione algun tipo de D.X.");
            return false;
        } else if (mx6 == true && mx6_text == "") {
            toastr.error("Ingrese texto Otro tipo de D.X");
            $("#otros").focus();
            return false;
        } else {

            return resolve(true);
        }
        return resolve(true);
    });

}

$(document).ready(function() {
    $('#armazonCodigoMD').on('change', function() {
        console.log("hola3")
        var codigoArmazon = $("#armazonCodigoMD").val();
        $.ajax({
            type: "POST",
            methoxd: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 19,
            data: 'codigoArmazon=' + codigoArmazon,
            success: function(data) {
                console.log(data[0].precio_venta)
                $("#armazonValormd").val(data[0].precio_venta);
                $("#totalValormd").val(data[0].precio_venta);
                SumaTotalMD();
            },
        });
    });
});

$(document).ready(function() {
    $('#lunasCodigoMD').on('change', function() {
        console.log("hola3")
        var codigoArmazon = $("#lunasCodigoMD").val();
        $("#lunasValormd").val(parseInt(0));
        SumaTotalMD();

    });
});

function editFichaEnvioCab() {
    var mx1 = document.getElementById('inlineCheckbox1MD').checked;
    var mx2 = document.getElementById('inlineCheckbox2MD').checked;
    var mx3 = document.getElementById('inlineCheckbox3MD').checked;
    var mx4 = document.getElementById('inlineCheckbox4MD').checked;
    var mx5 = document.getElementById('inlineCheckbox5MD').checked;
    var mx6 = document.getElementById('inlineCheckbox6MD').checked;
    var mx6_text = $("#otrosMD").val();
    var tipolenten = $("#tipoOptMD").val();
    var tipolentea = $("#tipoFMD").val();
    var usa_lente = $("#usarFMD").val();
    var dataInformationUser = {
        id: $("#idFMD").val(),
        referido: ($("#referidoFMD").val() == "" ? null : $("#referidoFMD").val()),
        motivo_consulta: ($("#motivoFMD").val() == "" ? null : $("#motivoFMD").val()),
        observacion1: ($("#observacion1FMD").val() == "" ? null : $("#observacion1FMD").val()),
        observacion_general: ($("#observacion6md").val() == "" ? null : $("#observacion6md").val()),
        tipo_lente_a: (tipolentea == "") ? null : tipolentea,
        usa_lente_a: (usa_lente == "") ? null : usa_lente,
        enfermedad: $("#enfermedadFMD").val(),
        ojoDominante: $("#ojoDominanteFMD").val(),
        cedula: $("#cedulaFMD").val(),

        mx1: (mx1 == true) ? 1 : 0,
        mx2: (mx2 == true) ? 1 : 0,
        mx3: (mx3 == true) ? 1 : 0,
        mx4: (mx4 == true) ? 1 : 0,
        mx5: (mx5 == true) ? 1 : 0,
        mx6: (mx6 == true) ? 1 : 0,
        mx1_text: (mx1 == true) ? 'Hipermetropia' : null,
        mx2_text: (mx2 == true) ? 'Miopia' : null,
        mx3_text: (mx3 == true) ? 'Atigmatismo' : null,
        mx4_text: (mx4 == true) ? 'Bilateral' : null,
        mx5_text: (mx5 == true) ? 'Presbicia' : null,
        mx6_text: (mx6 == true) ? mx6_text : null,
        usa_nuevo: 1,
        tipo_lente_n: tipolenten,
        total: ($("#totalValormd").val() == 0 ? 0 : $("#totalValormd").val()),
    }
    console.log(dataInformationUser);
    $.ajax({

        data: dataInformationUser,
        url: 'phpEnvioData/validadato.php?dato=' + 26,
        type: 'post',
        success: function(data) {
            console.log(data)
            console.log(data.statusCode)
            console.log(data = 200)
            console.log("hola")
            if (data == 200) {
                editCotizacion();
            } else {

            }
            /* 
                        if() */
        },
        error: function(error) {}
    });
}


function ProductoOptometrista() {
    nombreLuna = document.getElementById('lunaMD').value;
    nombreArmazon = document.getElementById('armazonMD').value;
    codigoArmazon = document.getElementById('armazonCodigoMD').value;
    valorArmazon = document.getElementById('armazonValormd').value;
    valorLuna = document.getElementById('lunasValormd').value;
    codigoLuna = document.getElementById('lunasCodigoMD').value;
    dataProducto = [{
            id: (idArmazon == undefined) ? "" : idArmazon,
            producto: nombreArmazon,
            codigo: (codigoArmazon != "") ? codigoArmazon : "",
            valor: (valorArmazon != 0) ? valorArmazon : 0,
        },
        {
            id: (idLunas == undefined) ? "" : idLunas,
            producto: nombreLuna,
            codigo: (codigoLuna != "") ? codigoLuna : "",
            valor: (valorLuna != 0) ? valorLuna : 0,
        }
    ];

}

function editCotizacion() {
    ProductoOptometrista();
    var id = $("#idFMD").val();
    arrayData.forEach(function(d) {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 32 + "&id=" + id + "&id_medida=" + d.id_medida + "&ojo=" + d.ojo + "&sph=" + d.sph + "&cyl=" + d.cyl + "&eje=" + d.eje + "&tipo=" + d.tipo,
            type: 'post',
            success: function(data) {
                // dataBd = JSON.parse(data); 
            },
            error: function(error) {}
        });

    });
    arrayAgudezaLejos.forEach(function(d) {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 27 + "&id_agudez=" + d.id_agudez + "&id=" + id + "&sin_lentes=" + d.sin_lentes + "&lentes_en_uso=" + d.lentes_en_uso + "&con_correccion=" + d.con_correccion + "&tipo_ojo=" + d.tipo_ojo,


            type: 'post',
            success: function(data) {
                /*     dataBd = JSON.parse(data);
                    console.log(data) */
            },
            error: function(error) {}
        });
    });
    arrayAgudezaLectura.forEach(function(d) {
        $.ajax({
            type: "POST",
            methoxd: "POST",
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 28 + "&id=" + id + "&id_agudez=" + d.id_agudez + "&sin_lentes=" + d.sin_lentes + "&lentes_en_uso=" + d.lentes_en_uso + "&con_correccion=" + d.con_correccion + "&tipo_ojo=" + d.tipo_ojo,
            success: function(data) {
                /*      dataBdagudez = JSON.parse(data); */
            },
            error: function(error) {}
        });
    });
    arrayData2.forEach(function(d) {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 29 + "&id=" + id + "&id_medida=" + d.id_medida + "&ojo=" + d.ojo + "&sph=" + d.sph + "&cyl=" + d.cyl + "&eje=" + d.eje + "&tipo=" + d.tipo,
            type: 'post',
            success: function(data) {
                /*  dataBd = JSON.parse(data); */
            },
            error: function(error) {}
        });

    });
    dataProducto.forEach(function(d) {
        $.ajax({
            type: "POST",
            methoxd: "POST",
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 30 + "&id=" + id + "&id_lenteproducto=" + d.id + "&codigo=" + d.codigo + "&producto_nombre=" + d.producto + "&valor=" + d.valor,
            success: function(data) {
                /*     dataBd = JSON.parse(data); */
            },
            error: function(error) {}
        });
    });
    swal({
            text: "Datos Ingresado con Éxito",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "Ok",
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = `fichaPaciente.php`;
                //window.location.href = `OrdenExito.php?id=${maxId[0].maxId.replace(/\b0+/g, '')}`
            }
        });
}