<?php
$servername = "localhost";
$database = "mvc";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM usuarios WHERE status=1 LIMIT 1,5";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['usuarios']))
{
	$q=$conn->real_escape_string($_POST['usuarios']);
	$query="SELECT * FROM usuarios WHERE 
		nomina LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		apellido LIKE '%".$q."%' OR
		departamento LIKE '%".$q."%' OR
		puesto LIKE '%".$q."%'";
}

$buscarUsuarios=$conn->query($query);
if ($buscarUsuarios->num_rows > 0)
{
	$tabla.= 
	'
	<div class="table">
	<table class="table table-bordered dt-responsive  nowrap w-100">
	<thead>
	<tr>
		<th> Nomina</th>
		<th> Nombre</th>
		<th> Genero</th>
		<th> Departamento</th>
		<th> Puesto</th>

		<th> Status</th>



		<th WIDTH="10%"> Acciones</th>

	</tr>

</thead>';

	while($usuarios= $buscarUsuarios->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$usuarios['nomina'].'</td>
			<td>'.$usuarios['nombre'].'</td>
			<td>'.$usuarios['apellido'].'</td>
			<td>'.$usuarios['departamento'].'</td>
			<td>'.$usuarios['puesto'].'</td>
			<td>'.$usuarios['status'].'</td>
			<td>

			<a style="margin:5px"
			href="< ?>/showUser/<?php echo $usuario->id?>"><i
				class="bx bx-show"></i></a>
		<a style="margin:5px"
			href="<?php echo HTTP_.ROOT_PATH_CORE; ?>/editUser/<?php echo $usuario->id?>"><i
				class="bx bx-pencil"></i></a>
		<a style="margin:5px" href="#" id="delete_user"
			data-id="<?php echo $usuario->id?>"><i class="bx bx-trash"></i></a>

                                </td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

	
	echo $tabla;
?>
