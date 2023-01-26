<?php
session_start();

$nombre_server[1] = 'localhost'; //Servidor al cual nos vamos a conectar.
$nombre_user[2] = 'root'; //Nombre del usuario de la base de datos.
$password[3] = ''; //Contraseña de la base de datos
$nombre_db[4] = 'myphotos'; //nombre de la base de datos

$conectar = @mysqli_connect($nombre_server[1],$nombre_user[2],$password[3],$nombre_db[4]) or exit('Datos de conexion incorrectos.');
$_SESSION["conexion"] = $conectar;

/*Funcion que se encarga de validar si el usuario esta registrado en el sistema*/
function user_login()
{
	if(!$_SESSION['id'])
	{
		exit ("Solo usuarios registrados, <a href='javascript:history.back(-1)'>Volver</a>");
	}
}
?>
