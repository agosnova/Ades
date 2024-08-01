var alerta = document.getElementById('codigo-msg');

//var email = ;

/*form.addEventListener("submit", frm => {
    frm.preventDefault();
      if(codigo==''){
        alerta.innerHTML = "Debe ingresar el Código";
      }
      if (codigo.length > 4) {
        alerta.innerHTML = "El código es demasiado largo";
    }
})*/

function ocultar(){
    var msg = document.querySelector(".mensaje6");
    console.log(msg);
    msg.setAttribute("style", "display: none;");
}
//var codigo='';
/*async function verificarCodigo(){
    codigo = document.getElementById('codigo').value;
	if (codigo.length > 4) {
        alerta.innerHTML = "El código es demasiado largo";
    }else{
        const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/usuarios/buscarCodigo/"+codigo);
            const data = await response.json();
            if (data.error == undefined){
            	alerta.innerHTML = "ok";
            }else{
            	alerta.innerHTML = "no ok";   	
            }
    }
}*/