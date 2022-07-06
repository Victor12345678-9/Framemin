//get

var formularios = document.getElementById("forms");
formularios.addEventListener("submit", function(e) {
    var form = e.target;

    var campos = form.querySelectorAll('.texto');

    for (var i = 0; i < campos.length; i++) {
        if (campos[i].value === "") {

            campos[i].focus();
            return e.preventDefault();
        }

    }



    let data = new FormData(document.getElementById(form.id));

    var metodo = document.getElementsByTagName("_method").value;

    console.log(metodo);

    if (form.id === 'index') {
        data = null;

    }


    // esta línea no es necesaria pero el resultado desaparecería si se envía el form aquí
    e.preventDefault();

    let id = data.get('codigoDepartamento');

    let url = 'http://localhost/lindesk/products/' + id;

    let _method = form.name //detectar metodo

    fetch(url, {
            method: _method,

        })
        .then(response => response.json())
        .then(data => { console.log(data) })
        .catch(error => console.log(error))
});