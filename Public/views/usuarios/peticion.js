$(obtener_registros());

function obtener_registros(usuarios) {
    $.ajax({
        url: 'http://localhost/framemin-main/Public/views/usuarios/consulta.php',
        type: 'POST',

        data: { usuarios: usuarios },
    })

    .done(function(resultado) {
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function() {
    var valorBusqueda = $(this).val();
    if (valorBusqueda != "") {
        obtener_registros(valorBusqueda);
    } else {
        obtener_registros();
    }
});