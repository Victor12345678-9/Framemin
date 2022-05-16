<?php

$rutas = [];

function ruta($accion, $retorno) 
{
    global $rutas;
  
    $accion = trim($accion, '/'); 

    //sustituimos cadenas o carecteres con expresiones regulares

    $accion = preg_replace('/{[^}]+}/', '(.+)',$accion);
    

    $rutas[$accion] = $retorno;
   
}

function envio($accion)
{
  
  global $rutas;
  
  $accion = trim($accion, '/');
  
  $retorno = null;
  $parametros = [];
  
  foreach($rutas as $ruta => $controlador) 
  {
    if(preg_match("%^{$ruta}$%", $accion, $encontrados) === 1) 
    { 
      $retorno = $controlador; 
      unset($encontrados[0]);
      $parametros = $encontrados; 
      break;

    }
  }

  if(!$retorno || !is_callable($retorno))
  {
    http_response_code(404); 
    echo "404 - Not found"; 
    exit;
  }

  echo call_user_func($retorno, ...$parametros);
}


function error_page()
{
  http_response_code(404); 
  echo "404 - Not found"; 
  exit;
}