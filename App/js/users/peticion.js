alert("hola");

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

let page = 1;
let buscar = '';

if (typeof d[2] === 'undefined') {
    page = 1;
} else {
    page = d[2];
}

if (typeof d[3] === 'undefined') {
    buscar = '';
} else {
    buscar = d[3];
}

$(obtener_registros(page, buscar));

function obtener_registros(page, usuarios = '') {
    var datos = { "page": page, usuarios: usuarios };
    $.ajax({
            url: ROOT_PATH_CORE + '/apiUsuarios',
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

$(document).ready(function() {
    $('#selectedPages').on('change', function() {
        let resultadosPorPagina = $('#selectedPages').val();
        let page = 1;

        var datos = { "page": page };


        console.log(resultadosPorPagina);
        $.ajax({
            type: 'POST',
            url: ROOT_PATH_CORE + '/pruebas',
            data: datos,
            success: function(data) {

            }
        });
    });

});