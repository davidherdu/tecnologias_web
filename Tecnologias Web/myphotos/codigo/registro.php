<?php 
include("conexion.php");
include("cabecera.php");
 
if(isset($_POST['registro']))//para saber si el botón registrar fue presionado. 
{ 
    if($_POST['nombre'] == '' or $_POST['apellidos'] == '' or $_POST['usuario'] == '' or $_POST['pass'] == '' or $_POST['conf_pass'] == '') 
    { 
        echo 'Por favor llene todos los campos.';
    } 
    else 
    { 
        $sql = 'SELECT * FROM usuarios'; 
        $rec = mysqli_query($_SESSION["conexion"],$sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el usuario(abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de usuario por lo tanto no se puede registrar 
  	
        while($result = mysqli_fetch_object($rec)) 
        { 
            if($result->usuario == $_POST['usuario']) //Esta condición verifica si ya existe el usuario 
            { 
                $verificar_usuario = 1; 
            } 
        } 
  
        if($verificar_usuario == 0) 
        { 
            if($_POST['pass'] == $_POST['conf_pass'])//Si los campos son iguales, continua el registro y caso contrario saldrá un mensaje de error. 
            { 
				$q_nombre = mysqli_real_escape_string($_SESSION["conexion"],$_POST['nombre']); 
				$q_apellidos = mysqli_real_escape_string($_SESSION["conexion"],$_POST['apellidos']);  
				$q_usuario = mysqli_real_escape_string($_SESSION["conexion"],$_POST['usuario']); 
				$q_password = mysqli_real_escape_string($_SESSION["conexion"],$_POST['pass']);
				if(validar_email($q_usuario)==1)
				{
					auth_add_user($q_usuario,$q_password,$q_nombre,$q_apellidos);
					if($q_usuario!='admin')
					{
						mkdir("../data/$q_usuario");
						chmod("../data/$q_usuario", 0777);
					}
					?> 
					<script type="text/javascript">
						alert('Se ha registrado correctamente.');
					</script> 		 
					<?php 
				}
				else
				{
				?> 
				<script type="text/javascript">
					alert('Introduce un email valido.');
				</script>  
				<?php 
				}
            } 
            else 
            { 
			?> 
				<script type="text/javascript">
					alert('Las claves no son iguales, intente nuevamente.');
				</script>  
			<?php 
            } 
        } 
        else 
        { 
		?> 
			<script type="text/javascript">
				alert('Este usuario ya ha sido registrado anteriormente.');
			</script> 
             
        <?php 
		} 
    } 
}

function validar_email($email){
    $mail_correcto = 0; 
    //compruebo unas cosas primeras 
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@"))
    { 
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," ")))
       {//miro si tiene caracter .
          if (substr_count($email,".")>= 1)
          {//obtengo la terminacion del dominio 
             $term_dom = substr(strrchr ($email, '.'),1); 
             //compruebo que la terminaci?n del dominio sea correcta 
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) )
             {//compruebo que lo de antes del dominio sea correcto 
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                if ($caracter_ult != "@" && $caracter_ult != ".")
                { 
                   $mail_correcto = 1; 
                }
             }
          }
       }
    }
    if ($mail_correcto) 
       return 1;
    else 
       return 0;
}

function auth_aleat()
{
    $source = 'abcdefghijklmnopqrstuvwxyz1234567890';
	$length = 8;
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}

function auth_encripta($pass, $salt) 
{
	return sha1($pass . $salt);
}

// inserta un nuevo usuario en la BD
function auth_add_user($q_usuario,$q_password,$q_nombre,$q_apellidos) 
{
	$salt = auth_aleat();
	$hashed = auth_encripta($q_password,$salt);
	$sql = "INSERT INTO usuarios (nombre,apellidos,usuario,password,salt) VALUES ('$q_nombre','$q_apellidos','$q_usuario','$hashed','$salt')";
	mysqli_query($_SESSION["conexion"],$sql);
}
?> 

<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="menu-wrapper" style="width: 63%;">
			<ul id="menu">
				<li><a href="index.php"><span>Homepage</span></a></li>
				<li class="current_page_item"><a href="registro.php"><span>Registrarse</span></a></li>
				<!--<li><a href="publicas.php"><span>Fotos Publicas</span></a></li>-->
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
		<div id="registro" align="center">
			<form name="registrar" action="registro.php" method="post" id="registro" onsubmit="return validar()"/>
				<h2>Sistema de Registro</h2>
				<br>
				<dt><label>Nombre:</label></dt>
				<input type='text' name='nombre' id="nombre" class=":required" title="Introduce el nombre"/><br /><br />
				<dt><label>Apellidos:</label></dt>
				<input type='text' name='apellidos' id="apellidos" class=":required" title="Introduce los apellidos"/><br /><br /> 
				<!--<dt><label>Fecha de nacimiento:</label></dt>
				<input type='text' name='fechaNac' id="fechaNac" class=":required" title="Introduce la fecha"/><br /><br /> -->
				<dt><label>E-mail:</label></dt>
				<input type='text' name='usuario' id="usuario" class=":required" title="Introduce el correo"/><br /><br />
				<dt><label>Contrase&ntilde;a:</label></dt>
				<input type="password" name='pass' id="pass" class=":required" title="Introduce la contrase&ntilde;a"/><br /><br />
				<dt><label>Confirmar Contrase&ntilde;a:</label></dt>
				<input type="password" name='conf_pass' id="conf-pass" class=":required" title="Introduce la contrase&ntilde;a"/><br /><br /><br /><br />
				<input type="submit" name="registro" style="width:100px;" tabindex="6" value="Registrar"/>
				<input type="reset" name="Limpiar" style="width:100px;" tabindex="6" value="Limpiar" />
			</form>
		</div>	
</div>
<?php 
include("pie.php");
?>
<!-- end #footer -->
</body>
</html>
