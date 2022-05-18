

$(document).ready(function(){
     $('#nuevo').submit(function(){
         var datos=$('#nuevo').serialize();
         $.ajax({
             type:"POST",
             url:"insertUser",
             data:datos,
             success:function(r){

                
               setTimeout(function() {
                 document.getElementById("mensajes").innerHTML='<div class="alert alert-success alert-dismissible fade show" role="alert"> Datos Guardados! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                 $("mensajes");
             },100);
         
             setTimeout(function() {
               document.getElementById("mensajes").innerHTML='';
             },4000);
                   
            
               },
               error: function() {
                 alert('Error');
               }
            
         });

         return false;
     });
 });
