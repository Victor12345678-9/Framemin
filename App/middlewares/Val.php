<?php

class Val{

    public static function validation($blocked=[]){
        foreach ($blocked as $valor) {
            $valor = $valor;
            echo "valor";
        }
    } 

    public static function required($required=[], $params=[]){
        foreach ($params as $clave => $valor) {
            if(in_array($clave, $required)){
                if ($valor == "" or $valor == null or !isset($valor)){
                    return "Son requeridos los datos para el campo: $clave";
                    exit();
                }
            }
        }
    } 
}

?>