const body = document.querySelector("body");
const modal = document.querySelector(".modal");
const modalButton = document.querySelector(".modal-button");
const closeButton = document.querySelector(".close-button");
const scrollDown = document.querySelector(".scroll-down");
let isOpened = false;

const openModal = () => {
    modal.classList.add("is-open");
    body.style.overflow = "hidden";
};

const closeModal = () => {
    modal.classList.remove("is-open");
    body.style.overflow = "initial";
};

window.addEventListener("scroll", () => {
    if (window.scrollY > window.innerHeight / 3 && !isOpened) {
        isOpened = true;
        scrollDown.style.display = "none";
        openModal();
    }
});

modalButton.addEventListener("click", openModal);
closeButton.addEventListener("click", closeModal);

document.onkeydown = evt => {
    evt = evt || window.event;
    evt.keyCode === 27 ? closeModal() : false;
};


toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

window.onload = function() {
    $("#usuario").val('');
    $("#contrasena").val('');
};


$(document).ready(function() {

    $('#validaIngresar').on('click', function() {
        var usuario = $("#usuario").val();
        var contrasena = $("#contrasena").val();

        if (usuario == "") {
            let autFocus = $("#usuario").focus();
            toastr.error("Ingrese Usuario");
            return false;
        } else if (contrasena == "") {
            let autFocus = $("#contrasena").focus();
            toastr.error("Ingrese contrasena");
            return false;
        } else {
            $.ajax({
                type: "POST",
                method: "POST",
                url: "php/validarDatosLogin.php",
                data: 'usuario=' + usuario + '&contrasena=' + contrasena,
                success: function(data) {
                    $('#result-hora').fadeIn(1000).html(data);
                }
            });
        }

        /*  $('#result-hora').html('<div align="center"><img src="images/loader.gif" width="80" height="80" ></div>').fadeOut(1000);

        var dataString = $("#hora").val();
        var paciente = $("#id_nombre").val();
        var especialidad = $("#nombrecapae").val();
        var especialista = $("#cursoe").val();
        var fecha = $("#fecha").val();

        $.ajax({
            type: "POST",
            method: "POST",
            url: "php/validar_edit.php",
            data: 'Dpaciente=' + paciente + '&Despecialidad=' + especialidad + '&Despecialista=' + especialista + '&Dfecha=' + fecha + '&Dhora=' + dataString,
            success: function(data) {
                $('#result-hora').fadeIn(1000).html(data);
            }
        }); */




    });
});