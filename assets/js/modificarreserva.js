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

/*verificaciones*/

    btn2 = document.getElementById('btn2');
    btn2.addEventListener('click', function(es){

    ingreso = document.getElementById('ingreso').value;
    horas = document.getElementById('horas').value;
    fecha = document.getElementById('fecha').value;


    let alerta1 = document.getElementById('fecha-msg');
    let alerta2 = document.getElementById('ingreso-msg');
    let alerta3 = document.getElementById('horas-msg');
    let alerta4 = document.getElementById('correcto-msg');

    /*if (fecha == '') {
        alerta1.innerHTML = "Ingrese fecha de reserva";
        campos=false;
    }else{
        alerta1.innerHTML = "";
        campos=true;
    }  
    if (ingreso == '') {
        alerta2.innerHTML = "Ingrese hora de ingreso";
        campos2=false;
    }else{
        alerta2.innerHTML = "";
        campos2=true;
    }
    if (horas <= 0.9) {
          alerta3.innerHTML = "Ingrese cantidad de horas";
          campos3=false;
    }else{
        alerta3.innerHTML = "";
        campos3=true;
        validateHoras=horas.split('');
        if(horas > 9){
            campos3=false;
            alerta3.innerHTML = "Solo puedes reservar hasta 9 horas";
        }
        console.log(validateHoras);

          validateHoras.forEach(element=>{
            if(element =='.' || element =='+'){
                campos3=false;
                alerta3.innerHTML = "Ingrese cantidad de horas";
            }
          }) 
    }
    if (campos && campos2 && campos3){
        alerta4.innerHTML = "Datos Modificados Correctamente";
    }*/
    window.location.href="../../controllers/misreservas.php";
});