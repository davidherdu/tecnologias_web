<?php
include("conexion.php");
 
$usuario = $_SESSION["usuario"];
$album = $_SESSION["dir"];

if((!isset($_SESSION["usuario"]))||(!file_exists("../data/$usuario/$album"))){
	header("location:logout.php");
}
else{
	$sqlAlbum = "DELETE FROM albumes WHERE tituloAlbum = '$album'";
	mysqli_query($_SESSION["conexion"],$sqlAlbum) or exit('Datos de album incorrectos.');

	borrar_directorio("../data/$usuario/$album", true);

	header("Location:albumes.php");
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

