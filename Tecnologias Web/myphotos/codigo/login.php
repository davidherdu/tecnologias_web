<?php
include("conexion.php");

if(isset($_POST['login']))
{
	$q_usuario = mysqli_real_escape_string($_SESSION["conexion"],$_POST['usuario']);
	$q_pass = mysqli_real_escape_string($_SESSION["conexion"],$_POST['pass']);
	$b_user = mysqli_query($_SESSION["conexion"],"SELECT * FROM usuarios WHERE usuario LIKE '$q_usuario'");	
	$ses = mysqli_fetch_assoc($b_user) ;
	if(auth_check_login($ses["password"], $q_pass, $ses["salt"]))
	{	
		if(@mysqli_num_rows($b_user))
		{
			$_SESSION['idUsuario'] = $ses["idUsuario"];
			$_SESSION['nombre'] = $ses["nombre"];
			$_SESSION['apellidos'] = $ses["apellidos"];
			$_SESSION['usuario'] = $ses["usuario"];
			$_SESSION['password'] = $ses["password"];
		}
	}
	else
	{
	?> 
		<script type="text/javascript">
			alert('Contraseña incorrecta.');
		</script>  
	<?php 
	}
}
	
if(isset($_GET['modo']) == 'desconectar')
{
	session_destroy();
	echo '<meta http-equiv="Refresh" content="2;url=index.php"> ';
	exit ('Te has desconectado del sistema.');
}
	
if(isset($_SESSION['idUsuario']))
{
	$_SESSION["nombre"]=$ses["nombre"];
	if($_POST['usuario']=='admin'){
		header("Location:admin.php");
	}
	else header("Location:usuario.php");
}
else
{
	header("Location:index.php");
}

function auth_encripta($pass, $salt) 
{
	return sha1($pass . $salt);
}

function auth_verifica($encriptado, $pass, $salt) 
{
	return auth_encripta($pass, $salt) == $encriptado;
}	

function auth_check_login($passUser, $pass, $salt) 
{ 
	return auth_verifica($passUser, $pass, $salt);
}
?>
