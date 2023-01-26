<?php
include("conexion.php");
//manejamos en sesion el nombre del usuario que se ha logeado

$q_foto = mysqli_real_escape_string($_SESSION["conexion"],$_GET["foto"]); 
$usuario = $_SESSION["usuario"];
$album = $_SESSION["dir"];

if((!isset($_SESSION["usuario"]))||(!file_exists("../data/$usuario/$album/$q_foto"))||((substr_count($q_foto,"/") != 0))){
	header("location:logout.php");
}
else{
	$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);
	$sqlFoto = "DELETE FROM foto WHERE tituloFoto = '$q_foto'";
	mysqli_query($_SESSION["conexion"],$sqlFoto) or exit('Datos de foto incorrectos.');

	@unlink("../data/$usuario/$album/$q_foto");

	header("location:listaFotos.php?album=".$album."&noSube=0");
}
?>

