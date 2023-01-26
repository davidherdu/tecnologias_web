<?php
include("cabecera.php");
?>

<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="menu-wrapper" style="width: 63%;">
				<ul id="menu">
					<li class="current_page_item"><a href="#"><span>Homepage</span></a></li>
					<li><a href="registro.php"><span>Registrarse</span></a></li>
					<!--<li><a href="codigo/publicas.php"><span>Fotos Publicas</span></a></li>-->
					<li><a href="#"><span>About</span></a></li>
					<li><a href="#"><span>Contacto</span></a></li>
					<li><div id="loginContainer">
							<a href="#" id="loginButton"><span>Login</span><em></em></a>
							<div style="clear:both"></div>
							<div id="loginBox">                
								<form id="loginForm" action="login.php" method="post">
									<fieldset id="body">
										<fieldset>
											<label for="email">Email</label>
											<input type="text" name='usuario' class=":required" title="Introduce el correo"/>
										</fieldset>
										<fieldset>
											<label for="password">Contrase&ntilde;a</label>
											<input type="password" name='pass' class=":required" title="Introduce la contrase&ntilde;a"/>
										</fieldset>
										<input type="submit" name="login" id="login" value="Entrar"/>
										<!--<label for="checkbox"><input type="checkbox" id="checkbox" />Recordarme</label>-->
									</fieldset>
									<!--<span><a href="#">&iquest;Olvidaste tu contrase&ntilde;a?</a></span>-->
								</form>
							</div>
						</div>	
					</li>
				</ul> 
			</div>		
			<div id="logo">
				<h1>My Photos Online</h1>
			</div>
		</div>
		<!-- end #menu -->
		<div id="banner">
			<div id="slider"> <a href="#" class="button previous-button">&lt;</a> <a href="#" class="button next-button">&gt;</a>
				<div class="viewer">
					<div class="reel">
						<div class="slide">
							<h2>Foto realizada por David Hernandez</h2>
							<img src="images/india1.jpg" width="900" height="350" alt="" />
						</div>
						<div class="slide">
							<h2>Foto realizada por Jose Martinez</h2>
							<img src="images/india2.jpg" width="900" height="500" alt="" />
						</div>
						<div class="slide">
							<h2>Foto realizada por Maria Perez</h2>
							<img src="images/india3.jpg" width="900" height="500" alt="" />
						</div>
						<div class="slide">
							<h2>Foto realizada por Fabiola Severino</h2>
							<img src="images/india4.jpg" width="900" height="500" alt="" />
						</div>
					</div>
				</div>
				<div class="indicator">
					<ul>
						<li class="active">1</li>
						<li>2</li>
						<li>3</li>
						<li>4</li>
					</ul>
				</div>
			</div>
			<script type="text/javascript">
				$('#slider').slidertron({
					viewerSelector: '.viewer',
					reelSelector: '.viewer .reel',
					slidesSelector: '.viewer .reel .slide',
					advanceDelay: 4000,
					speed: 'slow',
					navPreviousSelector: '.previous-button',
					navNextSelector: '.next-button',
					indicatorSelector: '.indicator ul li',
					slideLinkSelector: '.link'
				});
			</script> 
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="content">
			<div class="contentbg">
				<div class="post">
					<h2 class="title"><a href="#">Bienvenido a My photos Online</a></h2>
					<div class="entry">
						<p><h4>Álbum de fotos en línea: ¡Comparta sus fotos en línea gratuitamente!</h4>
						Suba sus fotos gratis en un álbum en línea y compártalos con su familia, amigos y conocidos. 
						Usted decide qué personas podrán ver las fotos. 
						Hay diferentes capacidades de almacenamiento según la que uested elija, los diferentes tamaños son 5MB, 10MB o 100MB.
						</p>
						<p>También podrá formar diferentes grupos para que diferentes personas puedan acceder a un contenido o a otro</p>
					</div>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>Enlaces de interes</h2>
						<ul>
							<li><a href="http://es.wikipedia.org/wiki/Fotograf%C3%ADa">Fotografia (Wikipedia)</a></li>
							<li><a href="#">Cursos de fotografia</a></li>
							<li><a href="#">Articulos</a></li>
							<li><a href="#">Camaras</a></li>
							<li><a href="#">Consejos</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page --> 
</div>
<?php 
	include("pie.php");
?>
<!-- end #footer -->
</body>
</html>
