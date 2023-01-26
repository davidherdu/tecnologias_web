<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html" />
<meta content="charset=utf-8" />
<title>My Photos Online</title>
<link href="http://fonts.googleapis.com/css?family=Abel|Arvo" rel="stylesheet" type="text/css" />
<link href="estilo/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="estilo/login.css" rel="stylesheet" type="text/css" media="screen" />
<link href="estilo/vanadium.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="javascript/jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="javascript/jquery.slidertron-1.0.js"></script>
<script type="text/javascript" src="javascript/jquery.poptrox-1.0.js"></script>
<script type="text/javascript" src="javascript/vanadium.js"></script>
<script type="text/javascript" src="javascript/login.js"></script>
<script type="text/javascript">
	$('#menu').dropotron();
	
	$(document).ready(function() {
		$('#showlogin').click(function() {
		  $('#loginpanel').slideToggle('slow', function() {
			  $("#triangle_down").toggle(); 
			  $("#triangle_up").toggle();
		  });
		});
	 });
</script>
</head>
<body>
	<div id="wrapper">
		<div id="header-wrapper-publicas">
			<div id="header">
				<div id="menu-wrapper" style="width: 70%;">
					<ul id="menu">
						<li><a href="usuario.php"><span>David Hernandez</span></a></li>
						<li><a href="albumes.php"><span>Albumes</span></a></li>
						<li class="current_page_item"><a href="grupo.php"><span>Grupos</span></a></li>
						<li><a href="listaAmigos.php"><span>Amigos</span></a></li>
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
						<li><a href="index.php"><span>Salir</span></a></li>
					</ul>
				</div>
				<div id="logo">
					<a href="usuario.php"><h1>Fotos de david hernandez</h1></a>
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
									<div class="imagen">
										<ul>
											<li class="nopad"><h3 style="top: 0px;">Amigos del colegio</h3><img src="images/india1.jpg" width="230" height="150" alt="" /></li>
											<li><h3 style="top: 0px;">Familia</h3><img src="images/india2.jpg" width="230" height="150" alt="" /></li>
											<li><h3 style="top: 0px;">Amigos universidad</h3><img src="images/india3.jpg" width="230" height="150" alt=""  /></li>
											<li class="nopad"><h3 style="top: 173px;">Compis del trabajo</h3><img src="images/india4.jpg" width="230" height="150" alt=""  /></li>
											<li><h3 style="top: 173px;">Mi novia y yo</h3><img src="images/india5.jpg" width="230" height="150" alt=""  /></li>
											<!--<li><a href="images/londres1.jpg"><img src="images/londres1.jpg" width="230" height="150" alt=""  /></a></li>
											<li class="nopad"><a href="images/londres2.jpg"><img src="images/londres2.jpg" width="230" height="150" /></a></li>
											<li><a href="images/londres3.jpg"><img src="images/londres3.jpg" width="230" height="150" alt="" /></a></li>
											<li><a href="images/pic03-big.jpg"><img src="images/pic03.jpg" width="230" height="150" alt="" /></a></li>-->
										</ul>
									</div>
									<!--<div class="imagen">
										<ul>
											<li class="nopad"><a href="images/india2.jpg"><img src="images/india2.jpg" width="230" height="150" alt="" /></a></li>
											<li><a href="images/india1.jpg"><img src="images/india1.jpg" width="230" height="150" alt="" /></a></li>
											<li><a href="images/india4.jpg"><img src="images/india4.jpg" width="230" height="150" alt=""  /></a></li>
											<li class="nopad"><a href="images/india5.jpg"><img src="images/india5.jpg" width="230" height="150" alt=""  /></a></li>
											<li><a href="images/india3.jpg"><img src="images/india3.jpg" width="230" height="150" alt=""  /></a></li>
											<li><a href="images/londres3.jpg"><img src="images/londres3.jpg" width="230" height="150" alt=""  /></a></li>
											<li class="nopad"><a href="images/londres1.jpg"><img src="images/londres1.jpg" width="230" height="150" /></a></li>
											<li><a href="images/londres2.jpg"><img src="images/londres2.jpg" width="230" height="150" alt="" /></a></li>
											<li><a href="images/pic03-big.jpg"><img src="images/pic03.jpg" width="230" height="150" alt="" /></a></li>
										</ul>
									</div>-->
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
	<div id="footer">
		<p>My Photos Online</p>
		<p>Design by Free CSS Templates <a href='http://www.freecsstemplates.org'>www.freecsstemplates.org</a></p>
	</div>
	<!-- end #footer -->
</body>
</html>
