<?php
include("conexion.php");
include("cabecera.php");
//manejamos en sesion el nombre del usuario que se ha logeado
if (!isset($_SESSION["usuario"])){
    header("location:index.php");
}
else{
$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);
$_SESSION["eliminarFoto"] = 0;
chmod("../data/$usuario", 0777);
?>

<body>
	<div id="wrapper">
		<div id="header-wrapper-publicas">
			<div id="header">
				<div id="menu-wrapper" style="width: 55%;">
					<ul id="menu">
						<li class="current_page_item"><a href="usuario.php"><span><?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></span></a></li>
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
				<h1>Fotos de <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></h1>		
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
									if($directorio1=opendir("../data/".$usuario))
									{
										$cont = 0;
										while(false!==($album = readdir($directorio1)))
										{
											if($directorio2=opendir("../data/".$usuario."/".$album))
											{
												$dir = "../data/".$usuario."/".$album;
												while(false!==($archivo = readdir($directorio2)))
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
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 350px; left: 280px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==1)&&(floor($cont/3)==0))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 350px; left: 520px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==2)&&(floor($cont/3)==0))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 0px; left: 40px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==0)&&(floor($cont/3)==1))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 0px; left: 280px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==1)&&(floor($cont/3)==1))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 0px; left: 520px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==2)&&(floor($cont/3)==1))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 173px; left: 40px;" width="230" height="150" alt=""/></a></li>';				
														}
														else if(($cont%3==0)&&(floor($cont/3)==2))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 173px; left: 280px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==1)&&(floor($cont/3)==2))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 173px; left: 520px;" width="230" height="150" alt=""/></a></li>';
														}
														else if(($cont%3==2)&&(floor($cont/3)==2))
														{
															echo '<li><a href='.$dir.'/'.$archivo.'><img src='.$dir.'/'.$archivo.' style="top: 350px; left: 40px;" width="230" height="150" alt=""/></a></li>';
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
												closedir($directorio2);
											}
										}
										closedir($directorio1);		
									}		
									?>
								</div>
							</div>
						</div>
						<a href="#" class="button previous-button">&lt;</a> <a href="#" class="button next-button">&gt;</a>
					</div>
					<br class="clear" />
					<script type="text/javascript">
						$('#gallery').poptrox({
							popupCloserBackgroundColor: '#E55311',
							popupPadding: 20,
							popupMarginRight: 50,
							windowMargin: 100
						});
						
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
