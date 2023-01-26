function enviar(){
	var linea1 = document.getElementById("nick").value;
	var linea2 = document.getElementById("mail").value;
	var linea3 = document.getElementById("pass").value;
	var linea4 = document.getElementById("conf-pass").value;
	if(linea1==""){
		alert("Introduce el nick");
		return;
	}
	if(linea2==""){
		alert("Introduce el email");
		return;
	}
	if((linea3=="")||(linea4=="")){
		alert("Introduce la contraseña");
		return;
	}
	if(linea3!=linea4){
		alert("Las contraseñas no coinciden");
		return
	}
	document.getElementById("registro").submit();
}

function validarLogin(){
	var correo = document.getElementById("email").value;
	var pass = document.getElementById("password").value;
	
	if(!correo.equals("david")){
		alert("Introduce un nombre valido");
		return;
	}
	if(!pass.equals("david")){
		alert("La contraseña no es valida");
		return;
	}
}

function actualizaFoto(){
	var texto = document.getElementById("comentario").value;
	var fila = "<li>"+texto+"</li>";
	document.getElementById("comenta").innerHTML += fila;
}


