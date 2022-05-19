function calcular_edad() {
    var form = document.getElementById('fechaNacimiento').value; //fecha de nacimiento en el formulario
    var fechaNacimiento = form.split('-');
    console.log(fechaNacimiento);
    var annoNac = fechaNacimiento[0];
    var mesNac = fechaNacimiento[1];
    var diaNac = fechaNacimiento[2];

    var fechaHoy = new Date(); // detecto la fecha actual y asigno el dia, mes y anno a variables distintas

    var annoActual = fechaHoy.getFullYear();
    var mesActual = fechaHoy.getMonth() + 1; //Añadimos el +1 por que getMonth Empieza desde 0 
    var diaActual = fechaHoy.getDate();

    var edad = annoActual - annoNac;
    if (mesNac > mesActual) {
        //alert('mes de nacimiento mayor');
        edad--;
    }
    if (mesNac == mesActual) {
        //alert('mes igual');
        if (diaNac > diaActual) {
            //alert('dia de nacimiento mayor');
            edad--;
        }
    }
    document.getElementById('edad').value = edad;

};