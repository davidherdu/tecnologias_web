<?php
include("conexion.php");
include("cabecera.php");

$foto = mysqli_real_escape_string($_SESSION["conexion"],$_GET["id"]);
$album = $_SESSION["dir"];

if((!isset($_SESSION["usuario"]))||(!file_exists("../data/".$_SESSION["usuario"]."/".$album."/".$foto))
    ||((substr_count($foto,"/") != 0))){
	header("location:logout.php");
}
else{	
	if(isset($_POST['cambiar']))
	{
		if($_POST['cambioNombre'] != '')
		{
			$nuevo = mysqli_real_escape_string($_SESSION["conexion"],htmlspecialchars($_POST['cambioNombre'])); 
			$cambio = "UPDATE foto SET nombre = '$nuevo' WHERE idFoto = '$foto'";
			mysqli_query($_SESSION["conexion"],$cambio) or exit('No cambia el nombre.');
		}
	}
	
	$sql = "SELECT nombre FROM foto WHERE idFoto = '$foto'";
	$aux = mysqli_query($_SESSION["conexion"],$sql) or exit('Datos de foto incorrectos.');
	$nombre = $aux->fetch_object()->nombre;
	$usuario = $_SESSION["usuario"];
	
?>
<body style="background: url(images/main.jpg) repeat;">
	<div id="wrapper">
		<div id="header-wrapper" style="height: 200px;">
			<div id="header">
				<div id="menu-wrapper" style="width: 55%;">
					<ul id="menu">
						<li><a href="usuario.php"><span>David Hernandez</span></a></li>
						<li><a href="albumes.php"><span>Albumes</span></a></li>
						<li><div id="loginContainer">
							<a href="#" id="loginButton"><span>Invitacion</span><em></em></a>
							<div style="clear:both"></div>
								<div id="loginBox">                
									<form id="loginForm"action="usuario.php" method="post">
										<fieldset id="body">
											<fieldset>
												<label for="email">Email</label>
												<input type="text" name="email" id="email" class=":required" title="Introduce el correo"/>
											</fieldset>
											<input type="submit" id="login" value="Invitar" />
										</fieldset>
									</form>
								</div>
							</div>	
						</li>
						<li><a href="logout.php"><span>Salir</span></a></li>
					</ul>
				</div>
				<div id="logo">
					<h1><?php echo $nombre; ?></h1>
				</div>
			</div>		
			<!-- end #menu -->
			<!-- start -->
		</div>
		<script type="text/javascript">
			function confirmar(){
				if (confirm("¿Estas seguro?")){
					return true;
				}
				else return false;
			}
		</script>
		<div id="page">
			<div id="foto">
				<div id="imagen">
					<?php
						echo "<img src='../data/$usuario/$album/$foto' width='613' height='400' alt='' />";
					?>
				</div>
				<div id="comentarios">
					<div id="textos">
						<ul id="comenta">
							<?php
							echo '<li><form name="comentar" action="foto.php?id='.$foto.'" method="post" id="cambiar"/>
										<dt>Escribe el nuevo nombre</dt>
										<input type="text" name="cambioNombre" id="cambioNombre"/>
										<input type="submit" name="cambiar" style="width:100px;" tabindex="6" value="Cambiar" onclick="return confirmar();"/>
									  </form>
								  </li>';
							echo '<li><a onclick="return confirmar();" href="eliminarFoto.php?foto='.$foto.'">Eliminar foto</a></li>';
							?>
						</ul>
					</div>
				</div>
			</div>
			<!-- end #header -->
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php 
	include("pie.php");
	?>
	<!-- end #footer -->
</body>
<?php 
}
?>
</html>
