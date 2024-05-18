toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "3000",
    "hideDuration": "3000",
    "timeOut": "3000",
    "extendedTimeOut": "3000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
};

/* 
estado 0 = antiguo;
estado 1 = nuevo; */
var dataArray = [];

var arrayData = [{
        tipo: 'LEJOS',
        ojo: 'OD',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 0
    },
    {
        tipo: 'LEJOS',
        ojo: 'OI',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 0
    },
    {
        tipo: 'CERCA',
        ojo: 'OD',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 0
    },
    {
        tipo: 'CERCA',
        ojo: 'OI',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 0
    },
];

var arrayAgudezaLejos = [{
        sinLentes: '/20',
        lenteUso: '/20',
        conCorreciob: '/20',
        ojo: 'A.O',
        tipo: 'lejos'
    },
    {
        sinLentes: '/20',
        lenteUso: '/20',
        conCorreciob: '/20',
        ojo: 'O.D',
        tipo: 'lejos'
    },
    {
        sinLentes: '/20',
        lenteUso: '/20',
        conCorreciob: '/20',
        ojo: 'O.I',
        tipo: 'lejos'
    },

];

var arrayAgudezaLectura = [{
        sinLentes: 0,
        lenteUso: 0,
        conCorreciob: 0,
        ojo: 'A.O',
        tipo: 'lectura'
    },
    {
        sinLentes: 0,
        lenteUso: 0,
        conCorreciob: 0,
        ojo: 'O.D',
        tipo: 'lectura'
    },
    {
        sinLentes: 0,
        lenteUso: 0,
        conCorreciob: 0,
        ojo: 'O.I',
        tipo: 'lectura'
    },

];


var arrayData2 = [{
        tipo: 'LEJOS',
        ojo: 'OD',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 1

    },
    {
        tipo: 'LEJOS',
        ojo: 'OI',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 1
    },
    {
        tipo: 'CERCA',
        ojo: 'OD',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 1
    },
    {
        tipo: 'CERCA',
        ojo: 'OI',
        sph: '',
        cyl: '',
        eje: '',
        estadom: 1
    },
];


function formatNumber(params) {
    this.locality = 'en-EN';
    params = parseFloat(params).toLocaleString(this.locality, {
        minimumFractionDigits: 2
    });
    params = params.replace(/[,.]/g, function(m) { return m === ',' ? '.' : ','; });
    return params;
}


$(document).ready(function() {
    $('#cedula').on('change', function() {
        var cedula = $("#cedula").val();
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
                    var fecha = data[0].fecha_nacimineto;
                    var edad = data[0].edad;
                    $("#nombre").val(nombre);
                    $("#apellido").val(apellido);
                    $("#fechaNacimiento").val(fecha);
                    $("#edad").val(edad);
                }
            },
        });
    });
});

$(document).ready(function() {
    $('#usar').on('change', function() {
        var uso = $("#usar").val();

        if (uso == '0') {
            $('#result-usoUno').hide();
            /*   $('#result-usoDos').hide(); */
            $('#result-usoTres').hide();
            $('#usaAntiguo').val('');

        } else {
            $('#result-usoUno').show();
            /*    $('#result-usoDos').show(); */
            $('#result-usoTres').show();
            $('#usaAntiguo').val(0);

            pruebaValor();


            arrayDisabled1();
        }
    });
});

function SoloNumeros(evt) {
    let key = (event.which) ? event.which : event.keyCode;
    if (key > 31 && (key < 48 || key > 59)) {
        return false;
    }
    return true;
}


function pruebaValor() {

    var output = document.getElementById('output');
    var table = ` <table  style="width:100%" class="text-center" >
    <thead>
        <tr> 
          <th  colspan="2"></th>
          <th >SPH</th> 
          <th  >CYL</th> 
          <th >EJE</th> 
        </tr>
    </thead><tbody>`;

    arrayData.forEach(function(d, index) {
        table += ` <tr > 
        <td style="width: 18%;font-weight:bold;"  onload="myFunction(${index})" id="tipo${index}">${d.tipo}</td> 
        <td style="width: 12%;font-weight:bold;"  onload="myFunction(${index})" id="ojo${index}">${d.ojo}</td> 
        <td  style="width: 20%"><input type="number" class="form-control form-control-sm  "   name="lejosODsph" id="lejosODsph${index}" value='${d.sph}'  onkeyup="myFunction(${index})"  ></td>
        <td style="width: 20%"><input type="number" class="form-control form-control-sm "  name="lejosODcyl" id="lejosODcyl${index}" value='${d.cyl}' onKeyPress="return SoloNumeros(event);"  onkeyup="myFunction(${index})"  ></td> 
        <td style="width: 20%"><input type="number" class="form-control form-control-sm "  name="lejosODeje" id="lejosODeje${index}"  value='${d.eje}' onKeyPress="return SoloNumeros(event);" onkeyup="myFunction(${index})" min="0"  ></td> 
      </tr>`;
        /*       dataArray.push(arrayData); */
    });

    /* console.log(dataArray); */

    table += "</tbody></table>";
    output.innerHTML = table;
}


function arrayDisabled1() {
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

window.onload = function() {
    $('.fichaBtn').on('click', function() {

        var tipo_usuario = $("#tipo_usuario").val();
        if (tipo_usuario != 2) {
            $("#totalValor").val(0);
            $("#lunasValor").val(0);
            $("#armazonValor").val(0);
            $("#armazonCodigo").val("");
            $("#lunasCodigo").val("");

            $("#cedula").val("");
            $("#nombre").val("");
            $("#apellido").val("");
            $("#fechaNacimiento").val("");
            $("#edad").val("");
            $("#enfermedad").val("");
            $("#ojoDominante").val("");
            $("#referido").val("");
            $("#motivo").val("");
            $("#usar").val("");
            $("#tipo").val('');
            $("#observacion1").val('');
            $("#tipoOpt").val('');
            $("#otros").val('');
            $("#observacion6").val('');

            document.getElementById("otros").disabled = true;
            document.getElementById('inlineCheckbox1').checked = false;
            document.getElementById('inlineCheckbox2').checked = false;
            document.getElementById('inlineCheckbox3').checked = false;
            document.getElementById('inlineCheckbox4').checked = false;
            document.getElementById('inlineCheckbox5').checked = false;
            document.getElementById('inlineCheckbox6').checked = false;

            visualLejos();
            visualLectura();
            medidasOptometrista();

        } else {

            $("#optomestristaAdmin").hide();

        }
    });

};

function visualLejos() {
    var output = document.getElementById('output2');
    var table = ` <table  style="width:100%" class="text-center" >
    <thead>
        <tr> 
          <th  colspan="1"></th>
          <th >Sin Lentes</th> 
          <th  >Lentes en uso</th> 
          <th >Con Correción</th> 
        </tr>
    </thead><tbody>`;

    arrayAgudezaLejos.forEach(function(d, index) {
        table += ` <tr > 
        <td style="width: 18%;font-weight:bold;"   id="ojo${index}">${d.ojo}</td> 
        <td  style="width: 20%"><input type="text" class="form-control form-control-sm  "   name="lejosAO" id="lejosAO${index}" value='${d.sinLentes}'  onkeyup="myFunction2(${index})"></td>
        <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosOD" id="lejosOD${index}" value='${d.lenteUso}'  onkeyup="myFunction2(${index})" ></td> 
        <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosOI" id="lejosOI${index}"  value='${d.conCorreciob}'  onkeyup="myFunction2(${index})" ></td> 
      </tr>`;

    });

    table += "</tbody></table>";
    output.innerHTML = table;
}

function visualLectura() {
    var output = document.getElementById('output3');
    var table = ` <table  style="width:100%" class="text-center" >
    <thead>
        <tr> 
          <th  colspan="1"></th>
          <th >Sin Lentes</th> 
          <th  >Lentes en uso</th> 
          <th >Con Correción</th> 
        </tr>
    </thead><tbody>`;

    arrayAgudezaLectura.forEach(function(d, index) {
        table += ` <tr > 
        <td style="width: 18%;font-weight:bold;"   id="ojo${index}">${d.ojo}</td> 
        <td  style="width: 20%">
              <select  class="form-control form-control-sm " name="lecturaAOL" id="lecturaAOL${index}" value='${d.sinLentes}' onchange="myFunction3(${index})">
                       <option value=""></option>
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
        <select  class="form-control form-control-sm "name="lecturaODL" id="lecturaODL${index}" value='${d.lenteUso}' onchange="myFunction3(${index})">
                      <option value=""></option>
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
        <select  class="form-control form-control-sm "  name="lecturaOIL" id="lecturaOIL${index}"  value='${d.conCorreciob}' onchange="myFunction3(${index})">
        <option value=""></option>
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

    table += "</tbody></table>";
    output.innerHTML = table;

}



function myFunction2(index) {
    var sinLentes = $(`#lejosAO${index}`).val();
    var lenteUso = $(`#lejosOD${index}`).val();
    var conCorreciob = $(`#lejosOI${index}`).val();
    arrayAgudezaLejos[index]['sinLentes'] = sinLentes;
    arrayAgudezaLejos[index]['lenteUso'] = lenteUso;
    arrayAgudezaLejos[index]['conCorreciob'] = conCorreciob;
}


function myFunction3(index) {
    var sinLentes = $(`#lecturaAOL${index}`).val();
    var lenteUso = $(`#lecturaODL${index}`).val();
    var conCorreciob = $(`#lecturaOIL${index}`).val();
    arrayAgudezaLectura[index]['sinLentes'] = sinLentes;
    arrayAgudezaLectura[index]['lenteUso'] = lenteUso;
    arrayAgudezaLectura[index]['conCorreciob'] = conCorreciob;
}



function medidasOptometrista() {
    var output = document.getElementById('output4');
    var table = ` <table  style="width:100%" class="text-center" >
    <thead>
        <tr> 
          <th  colspan="2"></th>
          <th >SPH</th> 
          <th  >CYL</th> 
          <th >EJE</th> 
        </tr>
    </thead><tbody>`;

    arrayData2.forEach(function(d, index) {
        table += ` <tr > 
        <td style="width: 18%;font-weight:bold;"   id="tipo${index}">${d.tipo}</td> 
        <td style="width: 12%;font-weight:bold;"   id="ojo${index}">${d.ojo}</td> 
        <td  style="width: 20%"><input type="text" class="form-control form-control-sm  "   name="lejosODsph2" id="lejosODsph2${index}" value='${d.sph}' onkeyup="myFunction4(${index})"></td>
        <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosODcy2l" id="lejosODcyl2${index}" value='${d.cyl}' onkeyup="myFunction4(${index})" ></td> 
        <td style="width: 20%"><input type="text" class="form-control form-control-sm "  name="lejosODeje2" id="lejosODeje2${index}"  value='${d.eje}' onkeyup="myFunction4(${index})"  min="0" ></td> 
      </tr>`;

    });

    table += "</tbody></table>";
    output.innerHTML = table;

}


function changeOtros() {

    if (document.getElementById('inlineCheckbox6').checked) {
        document.getElementById("otros").disabled = false;
    } else {
        document.getElementById("otros").disabled = true;
    }
}

function SumaTotal() {
    valorLuna = document.getElementById('lunasValor').value;
    valorArmazon = document.getElementById('armazonValor').value;
    var total = parseInt(valorArmazon) + parseInt(valorLuna);
    if (isNaN(total)) {
        $("#totalValor").val('');
    } else {
        $("#totalValor").val(total);
    }

}


function ProductoOptometrista() {

    nombreArmazon = document.getElementById('armazon').value;
    codigoArmazon = document.getElementById('armazonCodigo').value;
    valorArmazon = document.getElementById('armazonValor').value;
    valorLuna = document.getElementById('lunasValor').value;
    codigoLuna = document.getElementById('lunasCodigo').value;
    nombreLuna = document.getElementById('luna').value;
    /*  tipoArmazon = document.getElementById('armazonTipo').value; */
    /*   tipoLuna = document.getElementById('lunasTipo').value; */
    dataProducto = [{
            nombre: nombreArmazon,
            codigo: (codigoArmazon != "") ? codigoArmazon : "",
            /*   tipo: (tipoArmazon != "") ? tipoArmazon : null, */
            valor: (valorArmazon != 0) ? valorArmazon : 0,
        },
        {
            nombre: nombreLuna,
            codigo: (codigoLuna != "") ? codigoLuna : "",
            /* tipo: (tipoLuna != "") ? tipoLuna : null, */
            valor: (valorLuna != 0) ? valorLuna : 0,
        }
    ];
    /*  seleccionados2.push(dataProducto); */
}


$(document).ready(function() {
    $('#tipo').on('change', function() {
        var lente = $("#usar").val();
        var tipoDiseño = $("#tipo").val();
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


$(document).ready(function() {
    $('#tipoOpt').on('change', function() {
        var tipoDiseño = $("#tipoOpt").val();
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
            $("#usaNuevo").val(1);
        } else {

            arrayData2.forEach(function(d) {
                document.getElementById("lejosODsph2" + 2).disabled = false;
                document.getElementById("lejosODsph2" + 3).disabled = false;
                document.getElementById("lejosODcyl2" + 2).disabled = false;
                document.getElementById("lejosODcyl2" + 3).disabled = false;
                document.getElementById("lejosODeje2" + 2).disabled = false;
                document.getElementById("lejosODeje2" + 3).disabled = false;
            });
            $("#usaNuevo").val('');
        }

    });
});


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

function myFunction4(index) {
    var sph = $(`#lejosODsph2${index}`).val();
    var cyl = $(`#lejosODcyl2${index}`).val();
    var eje = $(`#lejosODeje2${index}`).val();
    arrayData2[index]['sph'] = sph;
    arrayData2[index]['cyl'] = cyl;
    arrayData2[index]['eje'] = eje;

    if (arrayData2[index].tipo == 'CERCA' && arrayData2[index].ojo == 'OD' && arrayData2[index]['sph'] > 1) {
        let autFocus = $("#lejosODsph2" + index).focus();
        $("#lejosODsph2" + index).val("");
        this.toastr.error("valor de sph del lejos del ojo derecho son mayores a uno");
        return false;
    } else if (arrayData2[index].tipo == 'CERCA' && arrayData2[index].ojo == 'OI' && arrayData2[index]['sph'] > 1) {
        let autFocus = $("#lejosODsph2" + index).focus();
        $("#lejosODsph2" + index).val("");
        this.toastr.error("valor de sph del lejos del ojo izquierdo son mayores a uno");
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


async function validaGuardarFicha() {
    await this.commonValidateFicha(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea guardar Ficha Médica",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    newFichaEnvioCab();
                } else {
                    swal("Error al Guardar !");
                    /* location.reload(); */
                }
            });
        }
    });
}

function commonValidateFicha(action) {

    return new Promise((resolve, reject) => {
        var tipo_usuario = $("#tipo_usuario").val();
        var cedula = $("#cedula").val();
        var enfermedad = $("#enfermedad").val();
        var ojoDominante = $("#ojoDominante").val();
        var usoLente = $("#usar").val();
        var tipo = $("#tipo").val();
        var tipoOpt = $("#tipoOpt").val();
        var codigoArmazon = document.getElementById('armazonCodigo').value;
        var valorArmazon = document.getElementById('armazonValor').value;
        var valorLuna = document.getElementById('lunasValor').value;
        var codigoLuna = document.getElementById('lunasCodigo').value;
        var mx1 = document.getElementById('inlineCheckbox1').checked;
        var mx2 = document.getElementById('inlineCheckbox2').checked;
        var mx3 = document.getElementById('inlineCheckbox3').checked;
        var mx4 = document.getElementById('inlineCheckbox4').checked;
        var mx5 = document.getElementById('inlineCheckbox5').checked;
        var mx6 = document.getElementById('inlineCheckbox6').checked;
        var mx6_text = document.getElementById('otros').value;

        if (tipo_usuario == 2) {
            if (cedula == undefined || cedula == "") {
                toastr.error("Seleccione Cedula");
                return false;
            } else if ((enfermedad == undefined || enfermedad == "")) {
                toastr.error("Selecione Tipo Enfermedad");
                return false;

            } else if ((ojoDominante == undefined || ojoDominante == "")) {
                toastr.error("Selecione ojo Dominante");
                return false;

            } else if ((usoLente == undefined || usoLente == "")) {
                toastr.error("Selecione Si el Paciente Utiliza lentes o NO ");
                return false;

            } else if (usoLente == 1 && (tipo == undefined || tipo == "")) {
                toastr.error("Selecione Tipo medida de diseño Antiguo");

                return false;
            } else {
                return resolve(true);
            }


        } else {
            if (cedula == undefined || cedula == "") {
                toastr.error("Seleccione Cedula");
                return false;
            } else if ((enfermedad == undefined || enfermedad == "")) {
                toastr.error("Selecione Tipo Enfermedad");
                return false;

            } else if ((ojoDominante == undefined || ojoDominante == "")) {
                toastr.error("Selecione ojo Dominante");
                return false;

            } else if ((usoLente == undefined || usoLente == "")) {
                toastr.error("Selecione Si el Paciente Utiliza lentes o NO ");
                return false;

            } else if (usoLente == 1 && (tipo == undefined || tipo == "")) {
                toastr.error("Selecione Tipo medida de diseño Antiguo(Existente)");

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
                    if (arrayAgudezaLejos[index]['ojo'] == 'A.O' && arrayAgudezaLejos[index]['sinLentes'] == '/20' && arrayAgudezaLejos[index]['lenteUso'] == '/20' && arrayAgudezaLejos[index]['conCorreciob'] == '/20') {
                        toastr.error("Ingrese valores dirente a /20 en AGUDEZA VISUAL LEJOS");
                        return false;
                    } else if (arrayAgudezaLejos[index]['ojo'] == 'A.O' && arrayAgudezaLejos[index]['sinLentes'] == '' && arrayAgudezaLejos[index]['lenteUso'] == '' && arrayAgudezaLejos[index]['conCorreciob'] == '') {
                        toastr.error("No ingrese valores vacios en AGUDEZA VISUAL LEJOS ");
                        return false;
                    } else if (arrayAgudezaLejos[index]['ojo'] == 'O.D' && arrayAgudezaLejos[index]['sinLentes'] == '/20' && arrayAgudezaLejos[index]['lenteUso'] == '/20' && arrayAgudezaLejos[index]['conCorreciob'] == '/20') {
                        toastr.error("Ingrese los valores /20  en AGUDEZA VISUAL LEJOS");
                        return false;
                    } else if (arrayAgudezaLejos[index]['ojo'] == 'O.D' && arrayAgudezaLejos[index]['sinLentes'] == '' && arrayAgudezaLejos[index]['lenteUso'] == '' && arrayAgudezaLejos[index]['conCorreciob'] == '') {
                        toastr.error("No ingrese valores vacios en AGUDEZA VISUAL LEJOS ");
                        return false;
                    } else if (arrayAgudezaLejos[index]['ojo'] == 'O.I' && arrayAgudezaLejos[index]['sinLentes'] == '/20' && arrayAgudezaLejos[index]['lenteUso'] == '/20' && arrayAgudezaLejos[index]['conCorreciob'] == '/20') {
                        toastr.error("Ingrese los valores diferente /20 correspondiente ");
                        return false;
                    } else if (arrayAgudezaLejos[index]['ojo'] == 'O.I' && arrayAgudezaLejos[index]['sinLentes'] == '' && arrayAgudezaLejos[index]['lenteUso'] == '' && arrayAgudezaLejos[index]['conCorreciob'] == '') {
                        toastr.error("No ingrese valores vacios AGUDEZA VISUAL LEJOS ");
                        return false;
                    }
                }
            }

            if (arrayAgudezaLectura.length == 3) {

                for (let index = 0; index < arrayAgudezaLectura.length; index++) {
                    if (arrayAgudezaLectura[index]['ojo'] == 'A.O' && arrayAgudezaLectura[index]['sinLentes'] == 0 && arrayAgudezaLectura[index]['lenteUso'] == 0 && arrayAgudezaLectura[index]['conCorreciob'] == 0) {
                        toastr.error("Los valores de AMBOS OJO NO deben ser vacios de Agudeza Visual Proxima");
                        return false;
                    } else if (arrayAgudezaLectura[index]['ojo'] == 'O.D' && arrayAgudezaLectura[index]['sinLentes'] == 0 && arrayAgudezaLectura[index]['lenteUso'] == 0 && arrayAgudezaLectura[index]['conCorreciob'] == 0) {
                        toastr.error("Los valores de OJO DERECHO NO  deben ser vacios de Agudeza Visual Proxima");
                        return false;
                    } else if (arrayAgudezaLectura[index]['ojo'] == 'O.I' && arrayAgudezaLectura[index]['sinLentes'] == 0 && arrayAgudezaLectura[index]['lenteUso'] == 0 && arrayAgudezaLectura[index]['conCorreciob'] == 0) {
                        toastr.error("Los valores de OJO IZQUIERDO NO  deben ser vacios de Agudeza Visual Proxima");;
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
            }
            /* else if (codigoArmazon == "") {
                           toastr.error("Ingrese Codigo Armazon");
                           $("#armazonCodigo").focus();
                           return false;
                       } else if (valorArmazon == 0) {
                           toastr.error("Ingrese Valor de Armazon diferente a 0");
                           $("#armazonValor").focus();
                           return false;
                       } else if (codigoLuna == "") {
                           toastr.error("Ingrese Codigo Luna");
                           $("#lunasCodigo").focus();
                           return false;
                       } else if (valorLuna == 0) {
                           toastr.error("Ingrese Valor de luna diferente a 0");
                           $("#lunasValor").focus();
                           return false;
                       } */
            else {

                return resolve(true);
            }

        }

    });

}

function newFichaEnvioCab() {
    var mx1 = document.getElementById('inlineCheckbox1').checked;
    var mx2 = document.getElementById('inlineCheckbox2').checked;
    var mx3 = document.getElementById('inlineCheckbox3').checked;
    var mx4 = document.getElementById('inlineCheckbox4').checked;
    var mx5 = document.getElementById('inlineCheckbox5').checked;
    var mx6 = document.getElementById('inlineCheckbox6').checked;
    var mx6_text = $("#otros").val();
    var usalentea = $("#usar").val();
    var tipolentea = $("#tipo").val();
    var usa_antiguo = $("#usaAntiguo").val();
    var tipolenten = $("#tipoOpt").val();
    var usa_nuevo = $("#usaNuevo").val();
    var observacion1 = $("#observacion1").val();
    var dataInformationUser = {
        cedula: $("#cedula").val(),
        referido: ($("#referido").val() == "" ? null : $("#referido").val()),
        motivo_consulta: ($("#motivo").val() == "" ? null : $("#motivo").val()),
        fecha_emision: $("#fecha").val(),
        observacion_general: ($("#observacion6").val() == "" ? null : $("#observacion6").val()),
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
        usa_lente_a: usalentea,
        tipo_lente_a: (tipolentea == "") ? null : tipolentea,
        usa_antiguo: (usa_antiguo == "") ? null : usa_antiguo,
        tipo_lente_n: tipolenten,
        usa_nuevo: (tipolenten == "") ? null : usa_nuevo,
        observacion_lente: (observacion1 == "") ? null : observacion1,
        total: ($("#totalValor").val() == 0 ? 0 : $("#totalValor").val()),
        enfermedad: $("#enfermedad").val(),
        ojoDominante: $("#ojoDominante").val(),

    }

    $.ajax({
        /* type: "POST",
        method: "POST", */
        data: dataInformationUser,
        url: 'phpEnvioData/validadato.php?dato=' + 9,
        type: 'post',
        success: function(data) {
            /*       console.log(data); */
            maxId = JSON.parse(data);
            /* maxusa_antiguo =  */
            guardarCotizacion(maxId[0].maxId);
        },
        error: function(error) {}
    });
}


function guardarCotizacion(id) {
    ProductoOptometrista();
    arrayData.forEach(function(d) {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 10 + "&idFicha=" + id + "&tipo=" + d.tipo + "&ojo=" + d.ojo + "&sph=" + d.sph + "&cyl=" + d.cyl + "&eje=" + d.eje + "&estadom=" + d.estadom,
            type: 'post',
            success: function(data) {
                dataBd = JSON.parse(data);
            },
            error: function(error) {}
        });

    });
    arrayAgudezaLejos.forEach(function(d) {
        $.ajax({
            type: "POST",
            methoxd: "POST",
            dataType: 'JSON',
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 11 + "&id=" + id + "&sinLentes=" + d.sinLentes + "&lenteUso=" + d.lenteUso + "&conCorreciob=" + d.conCorreciob + "&ojo=" + d.ojo + "&tipo=" + d.tipo,
            success: function(data) {
                dataBdagudez = JSON.parse(data);
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
            url: 'phpEnvioData/validadato.php?dato=' + 11 + "&id=" + id + "&sinLentes=" + d.sinLentes + "&lenteUso=" + d.lenteUso + "&conCorreciob=" + d.conCorreciob + "&ojo=" + d.ojo + "&tipo=" + d.tipo,
            success: function(data) {
                dataBdagudez = JSON.parse(data);
            },
            error: function(error) {}
        });
    }); -
    arrayData2.forEach(function(d) {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'phpEnvioData/validadato.php?dato=' + 10 + "&idFicha=" + id + "&tipo=" + d.tipo + "&ojo=" + d.ojo + "&sph=" + d.sph + "&cyl=" + d.cyl + "&eje=" + d.eje + "&estadom=" + d.estadom,
            type: 'post',
            success: function(data) {
                dataBd = JSON.parse(data);
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
            url: 'phpEnvioData/validadato.php?dato=' + 12 + "&id=" + id + "&codigo=" + d.codigo + "&nombre=" + d.nombre + "&valor=" + d.valor,
            success: function(data) {
                dataBd = JSON.parse(data);
            },
            error: function(error) {}
        });
    });
    swal({
            text: "Ficha guardada con Éxito",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "Ok",
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = `fichaPaciente.php`
                    //window.location.href = `OrdenExito.php?id=${maxId[0].maxId.replace(/\b0+/g, '')}`
            }
        });
}

$(document).ready(function() {
    $('#armazonCodigo').on('change', function() {
        var codigoArmazon = $("#armazonCodigo").val();
        $.ajax({
            type: "POST",
            methoxd: "POST",
            dataType: 'JSON',
            url: 'phpEnvioData/validadato.php?dato=' + 19,
            data: 'codigoArmazon=' + codigoArmazon,
            success: function(data) {
                $("#armazonValor").val(data[0].precio_venta);
                $("#totalValor").val(data[0].precio_venta);
            },
        });
    });
});