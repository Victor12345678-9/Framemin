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

let pageDefault = 1;
let pageActual = '';

if (typeof d[2] === 'undefined') {
    pageDefault = 1;
} else {
    pageDefault = d[2];
}

if (typeof d[3] === 'undefined') {
    pageActual = '';
} else {
    pageActual = d[3];
}

$(obtener_registros(pageDefault, pageActual));

function obtener_registros(pageDefault, productos = '') {
    var datos = { "page": pageDefault, productos: productos };
    $.ajax({
            url: ROOT_PATH_CORE + '/apiProductos',
            type: 'POST',
            data: datos,
        })
        .done(function(resultado) {
            var contenido = JSON.parse(resultado);
            $("#tabla_resultado").html(contenido.tabla);
            $("#paginacion").html(contenido.paginacion);
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