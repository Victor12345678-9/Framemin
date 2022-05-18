<?php

function datos()
{
    $datos = array();
    $ex = explode("/", $_SERVER['REQUEST_URI']);
   
    unset($ex[0]);
    unset($ex[1]);

    foreach($ex as $index => $parametro)
    {
        if($parametro != "")
        {
        $datos[] = $parametro;
        }
    }

    if(!isset($datos[0]))
    {
      $datos[0] = false;
    }

    return $datos;
}

function error_page()
{
  http_response_code(404); 
  echo "404 - Not fou|"; 
  exit;
}

