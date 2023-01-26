<?php
//session_start();
include("conexion.php");
include("cabecera.php");
//manejamos en sesion el nombre del usuario que se ha logeado
if (!isset($_SESSION["usuario"])){
    //header("location:index.php");
	header("location:logout.php");
}
else{
$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);
?>

<body>
	<div id="wrapper">
		<div id="header-wrapper-publicas" style="height: 100%;">
			<div id="header">
				<div id="menu-wrapper" style="width: 400px;">
					<ul id="menu">
						<li class="current_page_item"><a href=""><span>Administrador</span></a></li>
						<li><a href="#"><span>Albumes</span></a></li>						
						<li><a href="logout.php"><span>Salir</span></a></li>
					</ul>
				</div>
				<div id="logo">
					<h1>Administrador</h1>
				</div>
			</div>		
			<!-- end #menu -->
			<!-- start -->
			<script type="text/javascript">
				function confirmar(){
					if (confirm("¿Estas seguro de que quieres eliminarle?")){
						return true;
					}
					else return false;
				}
			</script>
			<div id="page">
				<div id="amigos">
					<ul>
						<?php
							if($directorio=opendir("../data"))
							{
								$cont = 0;
								while(false!==($archivo = readdir($directorio)))
								{
									if ( $archivo!="." AND $archivo!=".." )
									{	
										echo '<li><a onclick="return confirmar();" href="eliminaUsuario.php?user='.$archivo.'">'.$archivo.'</a></li>';
									}	
								}
								closedir($directorio);		
							}		
						?>
					</ul>
				</div>
			</div>
		</div>
		<!-- end #header -->
	</div>
	<?php 
	include("pie.php");
	?>
	<!-- end #footer -->
</body>
<?php 
}
?>
</html>
