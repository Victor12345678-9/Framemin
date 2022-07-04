
//get

formulario.addEventListener("submit", function(e) {

e.preventDefault();
let formulario = document.getElementById('index');
let url = 'http://localhost/lindesk/products'
let _method = 'PUT' //detectar metodo

fetch(url,{
    method: _method
    })
    .then(response => response.json())
    .then(data => {console.log(data)})
    .catch(error => console.log(error))
});

