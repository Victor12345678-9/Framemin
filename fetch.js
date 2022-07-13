// var formularios = document.getElementById("forms");


function deleteDepartamento(idDepartamento) {

    console.log(idDepartamento);

    // // const data = new FormData(form);
    fetch("html/products/" + idDepartamento, {
        method: "DELETE"

    })

    .then(response => response.json())
        .then(data => { console.log(data) })
        .catch(error => console.log(error))

}

function crearDepartamento() {

    alert("crear");
    var form = document.getElementById("nuevoDepartamento");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        console.log("me diste un click");
        const data = new FormData(form);

        fetch("/lindesk/products", {
                method: "POST",
                body: data
            })
            .then(response => response.json())
            .then(data => { console.log(data) })
            .catch(error => console.log(error))

    });
}


function showDepartamento(idDepartamento) {


    var resultado = document.getElementById("resultado");
    alert(idDepartamento);

    fetch("/lindesk/products/" + idDepartamento, {
            method: "GET"

        })
        .then(response => response.json())
        .then(data => document.write(JSON.stringify((data))))

    .catch(error => console.log(error))

}





//     let form = e.target;
//     let _method = form.querySelector("._method").value;
//     let _url = form.action;




//     if (form.id == "show") {
//         let data = new FormData(document.getElementById(form.id));
//         let id = (data.get('codigoDepartamento'));
//         _url = _url + '/' + id;

//     }



//     if (_method == 'GET') {
//         fetch(_url, {
//                 method: _method,

//             })
//             .then(response => response.json())
//             .then(data => { console.log(data) })
//             .catch(error => console.log(error))

//     } else if (_method == 'POST') {
//         const data = new FormData(form)

//         fetch(_url, {
//                 method: _method,
//                 body: data
//             })
//             .then(response => response.json())
//             .then(data => { console.log(data) })
//             .catch(error => console.log(error))

//     } else if (_method == 'PUT') {
//         console.log(_url);
//         const data = new FormData(form);
//         alert(data.get('idDepartamento'));
//         fetch(_url, {
//                 method: _method,


//             })
//             .then(response => response.json())
//             .then(data => { console.log(data) })
//             .catch(error => console.log(error))




//     } else if (_method == 'DELETE') {
//         alert("delete");
//         console.log(_url);
//         const data = new FormData(form);
//         fetch(_url, {
//                 method: _method,
//                 body: data,
//             })
//             .then(response => response.json())
//             .then(data => { console.log(data) })
//             .catch(error => console.log(error))


//     } else if (_method == 'PATCH') {
//         const data = new FormData(form);
//         fetch(_url, {
//                 method: _method,
//                 body: data
//             })
//             .then(response => response.json())
//             .then(data => { console.log(data) })
//             .catch(error => console.log(error