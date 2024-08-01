var alerta = document.getElementById('alerta-msg');
var alerta2 = document.getElementById('pass-msg');

var usuario='';
var contrasena='';

var camposVerificados=false;
var camposVerificados1=false;

formLogin.addEventListener("submit", frm => {
    frm.preventDefault();
      if(usuario=='' || contrasena==''){
        camposVerificados==false;
      }
      if(camposVerificados==false || camposVerificados1==false){
        alert("Completa los campos correctamente para continuar"); 
      }
})

 function verificarUsuario(){
    usuario = document.getElementById('user').value;

	if (usuario.length > 15) {
        alerta.innerHTML = "El usuario es demasiado largo";
        camposVerificados=false;
    }else if (usuario.length < 5) {
    	camposVerificados=false;
        alerta.innerHTML = "El usuario es demasiado corto";
    }else{
		camposVerificados=true;
        alerta.innerHTML = "";
    }   
}

 function verificarContrasena(){
     contrasena = document.getElementById('pass').value;

    if (contrasena.length > 15) {
        alerta2.innerHTML = "La contraseña es demasiado larga";
        camposVerificados1=false;
    }else if (contrasena.length < 8) {
        camposVerificados1=false;
        alerta2.innerHTML = "La contraseña es demasiado corta";
    }else{
        camposVerificados1=true;
        alerta2.innerHTML = "";
    }   
}

async function reedirect(){
    if (camposVerificados && camposVerificados1) {
            const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/usuarios/buscarUsuario/"+usuario+"/"+contrasena);
            const data = await response.json();
            console.log(data);
            if (data.errno == 200){
                window.location.href="../controllers/principal.php";
            }else if(data.errno == 404){
                 alerta.innerHTML = "Usuario y/o contraseña incorrectos";

            }
    }
}
