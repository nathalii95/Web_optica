function newPaciente() {
    
    $('#staticBackdrop').modal('show');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    $("#fechaNacimiento").val(today);


}

function closeNuevoPaciente() {

    $("#cedula").val('');
    $("#nombre").val('');
    $("#apellido").val('');
    $("#genero").val('');
    $("#telefono").val('');
    $("#fechaNacimiento").val('');
    $("#edad").val('');
    $("#civil").val('');
    $("#correo").val('');
    $("#direccion").val('');
    $("#enfermedad").val('');
    $("#ojo").val('');
    $("#observacion").val('');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);

    $("#fechaNacimiento").val(today);
    $('#staticBackdrop').modal('hide');
}

function newEnfermedad() {
    $('#enfermedad').modal('show');

}

function closeNewEnfermedad() {
    $('#enfermedad').modal('hide');
}

function editEnfermedad() {
    $('#modalEditEnfermedad').modal('show');
}

function closeEditEnfermedad() {
    $('#modalEditEnfermedad').modal('hide');

}


function newCargo() {
    $('#cargo').modal('show');

}

function closeNewCargo() {
    $('#cargo').modal('hide');
}

function editCargo() {
    $('#modalEditCargo').modal('show');

}

function closeEditCargo() {
    $('#modalEditCargo').modal('hide');
}


function newEmpleado() {
    $('#empleado').modal('show');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    $("#fechaNacimiento").val(today);

}

function closeNewEmpleado() {
    $("#cedula").val('');
    $("#nombre").val('');
    $("#apellido").val('');
    $("#genero").val('');
    $("#telefono").val('');
    $("#fechaNacimiento").val('');
    $("#edad").val('');
    $("#civil").val('');
    $("#correo").val('');
    $("#direccion").val('');
    $("#usuario").val('');
    $("#contrasena").val('');
    $("#cargo").val('');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);

    $("#fechaNacimiento").val(today);
    $('#empleado').modal('hide');
}

function editEmpleado() {
    $('#modalEditEmpleado').modal('show');
}

function closeEditEmpleado() {
    $('#modalEditEmpleado').modal('hide');

}

function seeEmpleado() {
    $('#modalSeeEmpleado').modal('show');

}

function closeSeeEmpleado() {
    $('#modalSeeEmpleado').modal('hide');

}

function seePaciente() {
    $('#modalSeePaciente').modal('show');

}

function closeSeePaciente() {
    $('#modalSeePaciente').modal('hide');

}

function newCita() {
    $('#modalnewCita').modal('show');
    document.getElementById("fecha").disabled = true;
    document.getElementById("hora").disabled = true;
    document.getElementById("btnGuardar").disabled = false;

}

function closenewCita() {
    $('#cedulaCita').val('');
    $('#nombre').val('');
    $("#apellido").val('');
    $("#hora").val('');
    $("#fecha").val('');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    $("#fecha").val(today);
    $('#modalnewCita').modal('hide');
    $('#result-cita').hide();
}

function editCita() {
    $('#modalEditCita').modal('show');
    document.getElementById("fechaMD").disabled = false;
    document.getElementById("horaMD").disabled = true;
    var horas = $("#horaMD");


}



function closeEditCita() {
    $('#modalEditCita').modal('hide');

}

function newFichaPaciente() {
    $('#modalFicha').modal('show');
    $('#result-usoUno').hide();
    $('#result-usoDos').hide();
    $('#result-usoTres').hide();
    /*     $('#resultadoTable').hide(); */
    $('#cedulaCita').val('');
    $('#nombre').val('');
    $("#apellido").val('');
    $('#observacion').val('');
    $("#tipo").val('');
    $("#observacion1").val('');
    $('#output').show();
    $('#output2').show();
    $('#output3').show();
    $('#output4').show();


}

function closeFichaPaciente() {
    $('#modalFicha').modal('hide');
    $('#result-usoUno').hide();
    $('#result-usoDos').hide();
    $('#result-usoTres').hide();
    $('#output').hide();
    $('#output2').hide();
    $('#output3').hide();
    $('#output4').hide();


}

function editPaciente() {
    $('#modalEditPaciente').modal('show');

}

function closeEdiPaciente() {
    $('#modalEditPaciente').modal('hide');
}

function newInventario() {
    $('#modalnewInventario').modal('show');

}

function closenewInventario() {
    $('#modalnewInventario').modal('hide');
}

function newTipoProduct() {
    $('#TipoProducto').modal('show');

}

function closeNewTipoProducto() {
    $('#TipoProducto').modal('hide');
}

function editTipoProducto() {
    $('#modaleditTipoProduct').modal('show');

}

function closeEditTipoProducto() {
    $('#modaleditTipoProduct').modal('hide');
}

function editInventario() {
    $('#modalEditInventario').modal('show');

}

function closeEditInventario() {
    $('#modalEditInventario').modal('hide');
}

function seeInventario() {
    $('#modalseeInventario').modal('show');

}

function closeseeInventario() {
    $('#modalseeInventario').modal('hide');
}

function consultaInventario() {
    $('#modalconsultaInventario').modal('show');


}

function closeconsultaInventario() {
    $('#modalconsultaInventario').modal('hide');
}

/* function editFichaPaciente() {
    $('#modalModificarFicha').modal('show');

}

function closeEditFichaPaciente() {
    $('#modalModificarFicha').modal('hide');
} */

/* 

function seeFichaPaciente() {
    $('#modalseeFichaPaciente').modal('show');

}

function closeseeFichaPaciente() {
    $('#modalseeFichaPaciente').modal('hide');
} */