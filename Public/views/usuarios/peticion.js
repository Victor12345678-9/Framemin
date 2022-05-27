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

$(document).on('keyup', '#busqueda', function() {
    var valorBusqueda = $(this).val();
    if (valorBusqueda != "") {
        obtener_registros(1, valorBusqueda);
    } else {
        obtener_registros(1, '');
    }
});