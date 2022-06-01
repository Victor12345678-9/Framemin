

<?php 

class Helpers{

function calculaedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
      $ano_diferencia--;
    return $ano_diferencia;
}


public function paginacion($pagina, $paginas, $q = '')
{

    $tabla = '';

    if ($pagina > 1)
    { 
        $tabla .= '
        <li>
        <a href="javascript:void(0);" onclick="obtener_registros('.($pagina - 1).',\''.$q.'\')">
        <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light"><</button></span>
        </a>
        </li>';
    }

    $tabla .= '<ul class="nav nav-pills">';
    $primera= ($pagina - 2) > 1 ? $pagina - 2 : 1;
    $ultima= ($pagina + 2) < $paginas ? $pagina + 2 : $paginas;
    for($x = $primera; $x <= $ultima; $x++)
    {
        $active = '';
        if($x == $pagina)
        {
            $active = "nav-link active";
        }

        if($pagina == $x)
        {
            $tabla .= '
            <li class="nav-item">
            <a style="margin:1px;" class="'.$active.' btn btn-soft-dark waves-effect waves-light" href="javascript:void(0);" onclick="obtener_registros('.$x.',\''.$q.'\')">
            <span></span>
            '.$x.'</a>
            </li>';
        }
        else
        {
            $tabla .= '
            <li class="nav-item">
            <a style="margin:1px;" class="'.$active.' btn btn-soft-dark waves-effect waves-light" href="javascript:void(0);" onclick="obtener_registros('.$x.',\''.$q.'\')">
            <span></span>
            '.$x.'</a>
            </li>';
        }
    }


   

    if($pagina < $paginas) 
    {
        $tabla .= '
        <li>
        <a href="javascript:void(0);" onclick="obtener_registros('.($pagina + 1).',\''.$q.'\')">
        <span aria-hidden="true"><button type="button" style="margin: 1px" class="btn btn-soft-dark waves-effect waves-light">></button></span>
        </a>
        </li>';
    }

    return $tabla;
}
}

?>
