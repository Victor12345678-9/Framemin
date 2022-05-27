<<<<<<< HEAD
<<<<<<< HEAD
var a = window.location.pathname;
var ex = trim(a, "/");
var d = ex.split("/");
var ROOT_PATH_CORE = window.origin + '/' + d[0];

function trim(s, c) {
    if (c === "]") c = "\\]";
    if (c === "^") c = "\\^";
    if (c === "\\") c = "\\\\";
    return s.replace(new RegExp(
        "^[" + c + "]+|[" + c + "]+$", "g"
    ), "");
}






$(document).on('keyup', '#busqueda', function() {
    var valorBusqueda = $(this).val();
    if (valorBusqueda != "") {
        obtener_registros(1, valorBusqueda);
    } else {
        obtener_registros(1, '');
    }
});




$(obtener_registros(1, ''));

function obtener_registros(page, usuarios = '') {
    var datos = { "page": page, usuarios: usuarios };
    $.ajax({
            url: ROOT_PATH_CORE + '/api_tabla',
            type: 'POST',
            data: datos,
        })
        .done(function(resultado) {
            var contenido = JSON.parse(resultado);
            $("#tabla_resultado").html(contenido);
        })
}
=======
=======
>>>>>>> b7956149660fad2c189017c27aa1cd5cac8d0f69
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
<<<<<<< HEAD
});
>>>>>>> b7956149660fad2c189017c27aa1cd5cac8d0f69
=======
});
>>>>>>> b7956149660fad2c189017c27aa1cd5cac8d0f69
