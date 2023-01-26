<?php
include("conexion.php");
//Sistema de registro <--HiperAcme.net-->
user_login();
	echo '<h2>Pagina solo para usuarios registrados</h2><br />';
	echo '<b>Nombre de Usuario:</b> ' . $_SESSION['nick'] . '<br />';
	echo '<b>Fecha de registro:</b> ' . date("d-m-Y - H:i", $_SESSION['fecha']) . '<br />';
	echo '<b>Email de registro:</b> ' . $_SESSION['mail'] . '<br />';
	echo '<b>IP:</b> ' . $_SESSION['ip'] . '<br /><br />';
	echo '<a href="login.php?modo=desconectar">Salir</a>';
?>