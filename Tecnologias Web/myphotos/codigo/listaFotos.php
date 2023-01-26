<?php
include("conexion.php");
include("cabecera.php");

$aux = mysqli_real_escape_string($_SESSION["conexion"],htmlspecialchars_decode($_GET["album"]));
$aux = str_replace("%20"," ",$aux);

if((!isset($_SESSION["usuario"]))||(!file_exists("../data/".$_SESSION["usuario"]."/".$aux))||((substr_count($aux,"/") != 0))){
	header("location:logout.php");
}
else{
$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);

$_SESSION["dir"] = $aux;
$album = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["dir"]);
$cont = 0;

$noSube = $_GET["noSube"];
$_SESSION["sube"] = $noSube;
$subir = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["sube"]);

$aux = mysqli_query($_SESSION["conexion"],"SELECT descripcion FROM albumes WHERE tituloAlbum = '$album'"); 
$desc = $aux->fetch_object()->descripcion;

if($subir==1)
{
	?> 
	<script type="text/javascript">
		alert("La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .png, .gif o .jpg, se permiten archivos de 100 Kb máximo.");
	</script>  
	<?php 
}
?>

<body>
	<div id="wrapper">
		<div id="header-wrapper-publicas">
			<div id="header">
				<div id="menu-wrapper" style="width: 55%;">
					<ul id="menu">
						<li><a href="usuario.php"><span><?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></span></a></li>
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
			<script type="text/javascript">
				function confirmar(){
					if (confirm("¿Estas seguro?")){
						return true;
					}
					else return false;
				}
			</script>
			<div id="logo">
				<h1><?php echo $album;?></h1><br><p><?php echo $desc;?></p><br>
				<p><a onclick="return confirmar();" href="eliminarAlbum.php">Eliminar album</a></p>
			</div>
		</div>		
		<!-- end #menu -->
		<!-- start -->
		<div id="page">
			<div id="banner">
				<!-- start -->
				<div id="slider" style="width: 900px;"> 
					<div id="subirFoto" style="top: 0px; left: 6000px;">
					<form action="subirFoto.php" method="post" enctype="multipart/form-data">
						<p>Añade una foto</p>
						<input type="file" name="foto" id="fotos"/>
						<input type="submit" name='enviar' value="Enviar">
					</form>
					</div>
					<div class="visor">
						<div class="gira">
							<div id="gallery">
								<?php
								if($directorio=opendir("../data/".$usuario."/".$album))
								{
									$cont = 0;
									$dir = "../data/".$usuario."/".$album;
									while(false!==($archivo = readdir($directorio)))
									{
										if($cont%9==0)
										{
											echo '<div class="imagen">';
											echo "<ul id='sortable'>";
										}
										if ( $archivo!="." AND $archivo!=".." )
										{	
											if(($cont%3==0)&&(floor($cont/3)==0))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 350px; left: 280px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==1)&&(floor($cont/3)==0))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 350px; left: 520px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==2)&&(floor($cont/3)==0))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 0px; left: 40px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==0)&&(floor($cont/3)==1))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 0px; left: 280px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==1)&&(floor($cont/3)==1))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 0px; left: 520px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==2)&&(floor($cont/3)==1))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 173px; left: 40px;" width="230" height="150" alt=""/></a></li>';				
											}
											else if(($cont%3==0)&&(floor($cont/3)==2))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 173px; left: 280px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==1)&&(floor($cont/3)==2))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 173px; left: 520px;" width="230" height="150" alt=""/></a></li>';
											}
											else if(($cont%3==2)&&(floor($cont/3)==2))
											{
												echo '<li><a href=foto.php?id='.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 350px; left: 40px;" width="230" height="150" alt=""/></a></li>';
											}
										}	
										$cont++;
										if($cont%9 == 0)
										{
											$cont = 0;
											echo '</ul>';
											echo '</div>';
										}
									}
									closedir($directorio);		
								}		
								?>
							</div>
						</div>
					</div>
					<?php
					if($cont>0)
						echo '<a href="#" class="button previous-button">&lt;</a> <a href="#" class="button next-button">&gt;</a>';
					//else echo "<h2 style='top: 200px; left: 400px;'>Aun no tiene ningun album</h2>";
					?>
				</div>
				<br class="clear" />
				<script type="text/javascript">			
					/*$('#gallery').poptrox({
						popupCloserBackgroundColor: '#E55311',
						popupPadding: 20,
						popupMarginRight: 50,
						windowMargin: 100,
					});*/
					
					$('#slider').slidertron({
						viewerSelector: '.visor',
						reelSelector: '.visor .gira',
						slidesSelector: '.visor .gira .imagen',
						//advanceDelay: 3000,
						speed: 'slow',
						navPreviousSelector: '.previous-button',
						navNextSelector: '.next-button',
						indicatorSelector: '.indicator ul li',
						slideLinkSelector: '.link'
					});
				</script> 
				<!-- end --> 
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
