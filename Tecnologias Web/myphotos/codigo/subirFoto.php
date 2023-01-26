<?php
include("conexion.php");

if (!isset($_SESSION["usuario"])){
	header("location:logout.php");
}
else{
	$aux = $_SESSION["dir"];
	$album = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["dir"]);
	$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);
	$album = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["dir"]);

	if(isset($_POST['enviar']))
	{
		// archivo temporal (ruta y nombre).
		$binario_nombre_temporal = $_FILES['foto']['tmp_name'] ;

		// Obtener del array FILES (superglobal) los datos del binario .. nombre, tabamo y tipo.
		$binario_nombre = $_FILES['foto']['name'];
		$binario_peso = $_FILES['foto']['size'];
		$binario_tipo = $_FILES['foto']['type'];

		//insertamos los datos en la BD.
		if (!isImage($binario_nombre_temporal)||($binario_peso > 3000000))
		{ 
			header("Location:listaFotos.php?album=$album&noSube=1");
		}else
		{ 
			$insertar = "INSERT INTO foto (tituloFoto,nombre,tamanio) VALUES ('../data/$usuario/$album/$binario_nombre','$binario_nombre','$binario_peso')";
			$seleccionar = "SELECT idFoto FROM foto WHERE tituloFoto = '../data/$usuario/$album/$binario_nombre'";
			
			mysqli_query($_SESSION["conexion"],$insertar) or die("No se pudo insertar los datos en la base de datos.");
			$id = mysqli_query($_SESSION["conexion"],$seleccionar) or die("Esa foto no existe.");
			$idString = $id->fetch_object()->idFoto;
			
			$destino =  '../data/'.$usuario.'/'.$album;
			move_uploaded_file($binario_nombre_temporal,$destino."/".$idString);
			$actualizar = "UPDATE foto SET tituloFoto = $idString WHERE idFoto = $idString";
			mysqli_query($_SESSION["conexion"],$actualizar) or die("No se pudo actualizar.");
			header("location: listaFotos.php?album=$album&noSube=0");  // si ha ido todo bien
		}
	} 
}

function isImage($path)
{
	$imageSizeArray = getimagesize($path);
	$imageTypeArray = $imageSizeArray[2];
	return (bool)(in_array($imageTypeArray , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG)));
}
?>
