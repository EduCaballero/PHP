$(document).ready(iniciar);

function iniciar() {

    jQuery.validator.setDefaults({
        debug: true, //nunca se envía el formulario y se muestran errores en consola
        success: "valido" //nombre de la clase de los mensages de input correctos
    });
    $("#formulario").validate({
        rules: {
            userName: {
                required: true,
                maxlength: 10
            },

            pass: {
                required: true,
                maxlength: 10
            },
            pass2: {
                required: true,
                maxlength: 10
            }
        },
        messages: {
            userName: {
                required: " Por favor, introduce un nombre",
                maxlength: " El nombre debe contener max 10 letras"
            },
            pass: {
                required: " Por favor, introduce un pass",
                maxlength: "  Máx. debe tener 10 caracteres"
            },
            pass2: {
                required: " Por favor, introduce la confirmación del pass",
                maxlength: " Máx. debe tener 10 caracteres"
            }
        }
    });
}