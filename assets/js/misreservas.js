/*modal*/
        const openModal = document.querySelector('.hero_cta');
        const modal = document.querySelector('.modal');
        const closeModal = document.querySelector('.modal_close');

        openModal.addEventListener('click', (e)=>{
            e.preventDefault();
            modal.classList.add('modal--show'); 
        });
        closeModal.addEventListener('click', (e)=>{
            e.preventDefault();
            modal.classList.remove('modal--show'); 
        });
//pupup

/*var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
    overlay.classList.add('active');
    popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(e){
    e.preventDefault();
    overlay.classList.remove('active');
    popup.classList.remove('active');
});*/

//enviar a api delete

/*async function eliminar(){
    var idUsuario = document.querySelector("#id").value;
    console.log(idUsuario);
     const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/reservas/eliminarReserva/"+idUsuario);
            const data = await response.json()
            console.log(response);
            console.log(data);
            if (data.error == undefined){
                console.log("se elimino");
            }else{          
              console.log("no se elimino");
            }
}*/
