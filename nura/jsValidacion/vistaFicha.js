window.onload = function() {
    console.log("hola");

    checkedData();
};


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
            (data[0].mx6 == 1) ? document.getElementById("otrosMD").disabled = true: document.getElementById("otrosMD").disabled = true;

            $("#totalValormd").val(parseFloat(data[0].total).toFixed(2));
            $("#observacion6md").val(data[0].observacion_lente);
            $.ajax({
                type: "POST",
                methoxd: "POST",
                dataType: 'JSON',
                contentType: "application/json; charset=utf-8",
                url: 'phpEnvioData/validadato.php?dato=' + 24 + "&id_ficha=" + id_ficha,
                success: function(data) {
                    /*        idArmazon = data[0].id_lenteproducto;
                           console.log(data[0].codigo); */
                    var dataCodigo = data[0].codigo;
                    if (dataCodigo == null) {
                        idArmazon = data[0].id_lenteproducto;
                        $("#armazonCodigoMD").val('');
                        $("#armazonValormd").val(parseFloat(data[0].valor).toFixed(2));
                    } else {
                        idArmazon = data[0].id_lenteproducto;
                        $("#armazonValormd").val(parseFloat(data[0].valor).toFixed(2));
                        $("#armazonCodigoMD").val(data[0].codigo);
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
                    /*      console.log(data[0].codigo);
                         idLunas = data[0].id_lenteproducto;
                         $("#lunasValormd").val(parseFloat(data[0].valor).toFixed(2));
                         $("#lunasCodigoMD").val(data[0].codigo); */
                    var dataLente = data[0].codigo;
                    if (dataLente == null) {
                        idLunas = data[0].id_lenteproducto;
                        $("#lunasCodigoMD").val('');
                        $("#lunasValormd").val(parseFloat(data[0].valor).toFixed(2));
                    } else {
                        idLunas = data[0].id_lenteproducto;
                        $("#lunasValormd").val(parseFloat(data[0].valor).toFixed(2));
                        $("#lunasCodigoMD").val(data[0].codigo);
                    }

                },
            });
        },
        error: function(error) {}
    });
}