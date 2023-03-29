'use strict'


$(document).ready(function() {

    // Detecta cuando se selecciona un checkbox
    $('input[name=user_type]').on('change', function() {
        // Obtiene el valor del checkbox seleccionado
        var selected = $(this).val();
        console.log(selected);

        // Muestra u oculta los campos de registro correspondientes
        if (selected == 'particular') {
            $('.particular-fields').show();
            $('.empresa-fields').hide();
        } else if (selected == 'empresa') {
            $('.particular-fields').hide();
            $('.empresa-fields').show();
        } else {
            $('.particular-fields').hide();
            $('.empresa-fields').hide();
        }
    });
});


function reenviar(){
    // Redirigir a la siguiente página con el parámetro "id"
    window.location.href = 'siguiente-pagina.php?id=123';

// Enviar una petición GET con los parámetros a la siguiente página
// $.get('products', { id: 13 }, function(response) {
//    console.log(response);
// });
}

function createTypeUser(){
    $('input[name=user_type]').on('change', function() {
        var particular = $(this).val();
        $.ajax({
            url: window.location.href = '/crear-variable',
            type: 'POST',
            data: {
                user_type: user_type ? particular : ''
            },
            success: function(response) {
                console.log('La variable ha sido creada con éxito.');
            },
            error: function(xhr) {
                console.log('Ha ocurrido un error al crear la variable.');
            }
        });
    });
}







