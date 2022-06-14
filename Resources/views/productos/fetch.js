var formulario = document.getElementById("form");
var respuesta = document.getElementById("mensajes");

formulario.addEventListener("submit", function(e) {
    e.preventDefault();
    console.log("me diste un click");

    var datos = new FormData(formulario);


    fetch("insertProduct", {
            method: "POST",
            body: datos,
        })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data === "error") {


                setTimeout(function() {
                    mensajes.innerHTML =
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Rellene Todos Los Campos! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    $("mensajes");
                }, 100);

                setTimeout(function() {
                    mensajes.innerHTML = "";
                }, 4000);


            } else {
                setTimeout(function() {
                    mensajes.innerHTML =
                        '<div class="alert alert-success alert-dismissible fade show" role="alert"> Datos Guardados! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    $("mensajes");
                }, 100);

                setTimeout(function() {
                    mensajes.innerHTML = "";
                }, 4000);
            }
        });

});