<?php 
include("conexion.php");
include("cabecera.php");

if (!isset($_SESSION["usuario"])){
    header("location:index.php");
}
else{
$usuario = mysqli_real_escape_string($_SESSION["conexion"],$_SESSION["usuario"]);

if(isset($_POST['crear']))
{ 
    if($_POST['nombreAlbum'] == '') 
    { 
        echo 'Por favor llene todos los campos.';
    } 
    else 
    { 
        $sql = "SELECT * FROM albumes  WHERE usuario = '$usuario'"; 
        $rec = mysqli_query($_SESSION["conexion"],$sql); 
        $verificar_album = 0;
  
        while($result = mysqli_fetch_object($rec)) 
        { 
            if($result->tituloAlbum == $_POST['nombreAlbum']) //Esta condición verifica si ya existe el album 
            { 
                $verificar_album = 1; 
            } 
        } 
  
        if($verificar_album == 0)
        { 
           if(!empty($_POST['nombreAlbum']))
            { 
				$titulo = mysqli_real_escape_string($_SESSION["conexion"],htmlspecialchars($_POST['nombreAlbum'])); 
				$descripcion = mysqli_real_escape_string($_SESSION["conexion"],$_POST['descripcion']);
				$fecha = date("Y-m-d");
				$sqlAlbumes = "INSERT INTO albumes (usuario,tituloAlbum,descripcion,fechaAlbum) VALUES ('$usuario','$titulo','$descripcion','$fecha')";
				mysqli_query($_SESSION["conexion"],$sqlAlbumes); 
				
				$aux = htmlspecialchars($titulo);
				$nom = urlencode($aux);
		
				mkdir("../data/$usuario/$aux");
				chmod("../data/$usuario/$aux", 0777);
				
				header("Location:albumes.php");
            } 
            else 
            { 
                echo 'Inserte el nombre del album.'; 
            } 
        } 
        else 
        { 
            echo 'Este album ya existe.'; 
        } 
    } 
}
?> 

<body>
	<div id="wrapper">
		<div id="header-wrapper-publicas">
			<div id="header">
				<div id="menu-wrapper" style="width: 55%;">
					<ul id="menu">
						<li><a href="usuario.php"><span><?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></span></span></a></li>
						<li class="current_page_item"><a href="albumes.php"><span>Albumes</span></a></li>
						<!--<li><a href="grupo.php"><span>Grupos</span></a></li>-->
						<!--<li><a href="listaAmigos.php"><span>Amigos</span></a></li>-->
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
				<h1>Fotos de <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellidos"]?></span></h1>
				</br></br>
			</div>
		</div>		
		<div id="registro" align="center">
			<form name="nuevoAlbum" action="nuevoAlbum.php" method="post" id="registro" onsubmit="return validar()"/>
				<h2>Crear nuevo album</h2>
				<br>
				<dt><label>Nombre:</label></dt>
				<input type='text' name='nombreAlbum' id="nombreAlbum" class=":required" title="Introduce el nombre del album"/><br /><br />
				<dt><label>Descripcion del album:</label></dt>
				<textarea id='descripcion' name='descripcion' cols="33" class=":required" title="Introduce una descripcion del album"></textarea>
				<!--<dt><input type="file" name="foto" id="fotos"/></dt>-->
				<!--<input type='text' name='fotos' id="fotos"/>--><br /><br />
				<input type="submit" name="crear" style="width:100px;" tabindex="6" value="Crear"/>
				<input type="reset" name="Limpiar" style="width:100px;" tabindex="6" value="Limpiar" />
			</form>
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
