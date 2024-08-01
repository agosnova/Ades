//codigo fecha
	/*document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, screen);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.timepicker');
    var instances = M.Timepicker.init(elems, screen);
  });*/

/*window.addEventListener('load',function(){

document.getElementById('txtedad').type= 'text';

document.getElementById('txtedad').addEventListener('blur',function(){

document.getElementById('txtedad').type= 'text';

});

document.getElementById('txtedad').addEventListener('focus',function(){

document.getElementById('txtedad').type= 'date';

});

});*/


//validaciones
  var camposVerificados = false;
  var camposVerificados1 = false;
  var camposVerificados2 = false;
  var camposVerificados3 = false;
  var camposVerificados4 = false;
  var camposVerificados5 = false;
  var camposVerificados6 = false;

 edad='';
    function verificarEdad(campo, idAlerta){
      var alerta = document.getElementById(idAlerta);
      var edad = document.getElementById("txtedad").value;
      var today = new Date();
      var yearToday = today.getFullYear() - 18;
      var year = edad.split("-");
      /*if (edad == '') {
         alerta.innerHTML = "Ingrese fecha de Nacimiento";
         camposVerificados = true;
      }else*/ if(year[0] <= yearToday ){
        alerta.innerHTML = "";
        camposVerificados = true;
      } else {
         alerta.innerHTML = "La " + campo + " debe ser mayor a 18 años";
         camposVerificados = false;
      }

    }

nombre='';
apellido='';

    function verificarCampo(campo, idAlerta, idNombre){
      var nombre = document.getElementById(idNombre).value;
      var apellido = document.getElementById(idNombre).value;
      var alerta = document.getElementById(idAlerta);

      //nombre y apellido
      /*if (nombre.length == 0 || apellido.length == 0) {
         alerta.innerHTML = "Debe ingresar " +campo;
         camposVerificados = false;
      }else*/ if(nombre.length < 3 || apellido.length < 3 ){
        alerta.innerHTML = "El " + campo + " es demasiado corto";
        camposVerificados1 = false;
      }else if (nombre.length > 20 || apellido.length > 20) {
        alerta.innerHTML = "El " + campo + " es demasiado largo";
        camposVerificados1 = false;
      }else{
        alerta.innerHTML = "";
        camposVerificados1 = true;
      }
    }

usuario='';
    async function verificarUsuario(idAlerta, idNombre){
      var usuario = document.getElementById(idNombre).value;
      var alerta = document.getElementById(idAlerta);

      //usuario
      /*if (usuario.length == 0) {
         alerta.innerHTML = "Debe ingresar " +campo;
         camposVerificados = false;
      }else */if(usuario.length < 5){
        alerta.innerHTML = "El usuario es demasiado corto";
        camposVerificados2 = false;
      }else if (usuario.length > 15) {
        alerta.innerHTML = "El usuario es demasiado largo";
        camposVerificados2 = false;
      }else{
        alerta.innerHTML = "";
        camposVerificados2 = true;
      }

      const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/usuarios/buscarUsuarioPorUsuario/"+usuario);
            const data = await response.json()
            if (data.error == undefined){
            	alerta.innerHTML = "El Usuario ingresado ya esta en uso";
            	camposVerificados2 = false;
            }else{   	   	
              alerta.innerHTML = ""; 
            	camposVerificados2= true;
            }
    }

patente='';
      function verificarPatente(campo, idAlerta, idNombre){
      var patente = document.getElementById(idNombre).value;
      var alerta = document.getElementById(idAlerta);

      //patente
      /*if (patente.length == 0) {
         alerta.innerHTML = "Debe ingresar " +campo;
         camposVerificados = false;
      }else*/ if(patente.length < 6){
        alerta.innerHTML = "La " + campo + " es demasiado corta";
        camposVerificados3 = false;
      }else if (patente.length > 7) {
        alerta.innerHTML = "La " + campo + " es demasiado larga";
        camposVerificados3 = false;
      }else{
        alerta.innerHTML = "";
        camposVerificados3 = true;
      }
    }

contrasena='';
repetir='';
      function verificarPass(campo, idAlerta){
      var contrasena = document.getElementById("txtcontrasena").value;
      var repetir = document.getElementById("txtrepetir").value;
      var alerta = document.getElementById("contrasena-msg");
      var alerta2 = document.getElementById("repetir-msg");

      //contraseñas
      if(contrasena.length >= 8 && contrasena.length <=15){
        alerta.innerHTML = "";
          if (contrasena == repetir) {
            alerta.innerHTML = "";
            alerta2.innerHTML = "";
            camposVerificados4 = true;
          }else{
            alerta2.innerHTML ="las contraseñas deben coincidir";
            camposVerificados4 = false; 
          }
      }else{
         alerta.innerHTML = " debe escribir una contraseña de 8 a 15 caracteres";
         camposVerificados4 = false;
      }
      

    }

    /*  function verificarEmail(campo, idAlerta, idNombre){
      var email = document.getElementById(idNombre).value;
      var alerta = document.getElementById(idAlerta);

      //email
      if (email.length == 0) {
         alerta.innerHTML = "Debe ingresar " +campo;
         camposVerificados = false;
      }else{
        alerta.innerHTML = "";
        camposVerificados = true;
      }
    }*/

email='';
//verificar si ya hay un email en uso
	async function verificarEmailEnUso(email, idAlerta){
			var email = document.getElementById('txtemail').value;
 			var alertaEmail = document.getElementById('email-msg');
            const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/usuarios/buscarUsuarioPorEmail/"+email);
            const data = await response.json();
            if (data.error == undefined){
            	alertaEmail.innerHTML = "El Email ingresado ya esta en uso";
            	camposVerificados5 = false;
            }else{
            	alertaEmail.innerHTML = "";   	
            	camposVerificados5 = true;
            }
        }
        

frm_usuario.addEventListener("submit", frm => {
      if(txtnombre.value=='' || txtapellido.value=='' || txtedad.value=='' || txtemail.value=='' || txtusuario.value=='' || txtcontrasena.value=='' || txtrepetir.value=='' || txtpatente.value==''){
         frm.preventDefault();
        camposVerificados6 = false;
      }else{
        camposVerificados6 = true;
      }
      if(camposVerificados==false || camposVerificados1==false || camposVerificados2==false ||camposVerificados3==false || camposVerificados4==false || camposVerificados5==false || camposVerificados6==false){
        alert("Completa los campos correctamente para continuar");
      }
})


   /* function checkInput(string $string, int $case) {
        switch($case){
          //solo letras
            case CHECKLETTERS:
                $response = preg_match("/[^a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]/", $string);
                return $response != 1;
            break;
            /*case CHECKNUMBERS:
                $response = preg_match("/[^0-9]/", $string);
                return $response != 1;
            break;
            //letras y numeros
            case CHECKALPHANUMERIC:
                $response = preg_match("/[^a-zA-Z0-9áéíóúüñÁÉÍÓÚÜÑ]/", $string);
                return $response != 1;
            break;
            //chekea email
            case CHECKEMAIL:
                $response = preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,10})$/', strtolower($string));
                return $response == 1;
            break;
            //chekear contraseña
            /*case CHECKPASS:
                $response = pregmatch('/^(?=.\d)(?=.[@#-$%^&+=§!?])(?=.[a-z])(?=.[A-Z])[0-9A-Za-z@#-_$%^&+=§!?]{8,20}$/', $string);
                return $response == 1;
            break;
            case CHECKDATE:
                $response = preg_match('/(19[5-9][0-9]|20[0-9][0-9])[/-](0[1-9]|1[0-2])[/-](0[1-9]|1[0-9]|2[0-9]|3[01])/', $string);
                return $response == 1;
            break;
            case CHECK__SQL:

            break;
            default:
                // ! Deberia ir algun tipo de error indicando que la opcion no es valida
                return false;
            break;
        }
    }*/

