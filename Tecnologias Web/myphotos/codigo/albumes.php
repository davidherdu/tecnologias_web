<?php
include("conexion.php");
include("cabecera.php");
//manejamos en sesion el nombre del usuario que se ha logeado
if (!isset($_SESSION["usuario"])){
	header("location:logout.php");
}
else{
$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);
?>

<body>
	<div id="wrapper">
		<div id="header-wrapper-publicas">
			<div id="header">
				<div id="menu-wrapper" style="width: 55%;">
					<ul id="menu">
						<li><a href="usuario.php"><span><?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></span></a></li>
						<li class="current_page_item"><a href="albumes.php"><span>Albumes</span></a></li>
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
				<h1>Fotos de <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></h1>
				</br></br>
				<a href='nuevoAlbum.php'><p>Crear album</p></a>
			</div>
		</div>		
		<!-- end #menu -->
		<!-- start -->
		<div id="page">
			<div id="banner">
				<!-- start -->
				<div id="slider" style="width: 900px;"> 
					<div class="visor">
						<div class="gira">
							<div id="gallery">
								<?php
								if($directorio=opendir("../data/".$usuario))
								{
									$cont = 0;
									while(false!==($archivo = readdir($directorio)))
									{
										if($cont%9==0)
										{
											echo '<div class="imagen">';
											echo "<ul id='sortable'>";
										}
										if ( $archivo!="." AND $archivo!=".." )
										{	
											$tmp = str_replace(" ","%20",$archivo);
											if(($cont%3==0)&&(floor($cont/3)==0))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 350px; left: 280px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==1)&&(floor($cont/3)==0))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 350px; left: 520px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==2)&&(floor($cont/3)==0))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 0px; left: 40px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==0)&&(floor($cont/3)==1))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 0px; left: 280px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==1)&&(floor($cont/3)==1))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 0px; left: 520px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==2)&&(floor($cont/3)==1))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 173px; left: 40px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';				
											}
											else if(($cont%3==0)&&(floor($cont/3)==2))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 173px; left: 280px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==1)&&(floor($cont/3)==2))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 173px; left: 520px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
											}
											else if(($cont%3==2)&&(floor($cont/3)==2))
											{
												echo '<li><a href="listaFotos.php?album='.$tmp.'&noSube=0"><h3 style="top: 350px; left: 40px;">'.$archivo.'</h3><img src="images/fondo.jpg" width="230" height="150"/></a></li>';
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
					?>
				</div>
				<br class="clear" />
				<script type="text/javascript">			
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
