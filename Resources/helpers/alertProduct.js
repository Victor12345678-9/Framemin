//////////////SWEET ALERT USUARIOS////////////



var a = window.location.pathname;
var ex = trim(a, "/");
var d = ex.split("/");
var ROOT_PATH_CORE = window.origin + '/' + d[0];

var w = a.substr(-1);
if (w == "_") {
    Swal.fire({
        position: 'top-between',
        icon: 'success',
        title: 'Tus cambios han sido guardados',
        showConfirmButton: false,
        timer: 1500
    })
}
$(document).on('click', '#delete_product', function(e) {
    var ProductId = $(this).data('id');

    SwalDelete(ProductId);
    e.preventDefault();
});

function SwalDelete(ProductId) {
    Swal.fire({
        title: '¿Realmente Desea Eliminar?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar ',
        confirmButtonText: 'Confirmar',
    }).then((result) => {

        if (result.isConfirmed) {
            window.location = ROOT_PATH_CORE + "/deleteProduct/" + ProductId
        }

    })
}

function trim(s, c) {
    if (c === "]") c = "\\]";
    if (c === "^") c = "\\^";
    if (c === "\\") c = "\\\\";
    return s.replace(new RegExp(
        "^[" + c + "]+|[" + c + "]+$", "g"
    ), "");
}

//////////////SWEET ALERT USUARIOS////////////