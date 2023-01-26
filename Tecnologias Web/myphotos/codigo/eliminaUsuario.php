<?php
include("conexion.php");

if((!isset($_SESSION["usuario"]))||($_SESSION["usuario"]!='admin')){
	header("location:logout.php");
}
else{
	$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);
	$q_usuario = mysqli_real_escape_string($_SESSION["conexion"],$_GET["user"]); 
	$sqlUser = "DELETE FROM usuarios WHERE usuario = '$q_usuario'";
	$sqlAlbum = "DELETE FROM albumes WHERE usuario = '$q_usuario'";
	mysqli_query($_SESSION["conexion"],$sqlUser) or exit('Datos de usuario incorrectos.');
	mysqli_query($_SESSION["conexion"],$sqlAlbum) or exit('Datos de album incorrectos.');

	borrar_directorio("../data/$q_usuario", true);

	header("Location:admin.php");
}

function borrar_directorio($dir, $borrarme)
{
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) 
    {
        if($obj=='.' || $obj=='..') continue;
        if (!@unlink($dir.'/'.$obj)) borrar_directorio($dir.'/'.$obj, true);
        else
        {
			$sqlFoto = "DELETE FROM foto WHERE idFoto = '$obj'";
			mysqli_query($_SESSION["conexion"],$sqlFoto) or exit('Datos de album incorrectos.');
		}
    }
    closedir($dh);
    if ($borrarme)
    {
        @rmdir($dir);
    }
}
?>
