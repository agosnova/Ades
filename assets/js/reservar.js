/*codigo formulario slider*/
let form = document.querySelector('.form-register');
let progressOptions = document.querySelectorAll('.progressbar__option');
//datos paso1

/*function actualizar(){
    fecha = document.getElementById('fechareserva').value;
    console.log(fecha);    
}*/
    //verificar paso1
   // function verificarpaso1() 

    
    btn = document.getElementById('btn');
    btn.addEventListener('click', function(e){

    ingreso = document.getElementById('ingreso').value;
    horas = document.getElementById('horas').value;
    fecha = document.getElementById('fechareserva').value;


    let alerta1 = document.getElementById('fecha-msg');
    let alerta2 = document.getElementById('ingreso-msg');
    let alerta3 = document.getElementById('horas-msg');

    if (fecha == '') {
        
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
        

          validateHoras.forEach(element=>{
            if(element =='.' || element =='+'){
                campos3=false;
                alerta3.innerHTML = "Ingrese cantidad de horas";
            }
          }) 
    }
    if (campos && campos2 && campos3){
    let element=e.target;
    let isButtonNext = element.classList.contains('step__button--next');
    let isButtonBack = element.classList.contains('step__button--back');
    if (isButtonNext || isButtonBack) {
        let currentStep = document.getElementById('step-' + element.dataset.step);
        let jumpStep = document.getElementById('step-' + element.dataset.to_step);
        currentStep.addEventListener('animationend', function callback() {
            currentStep.classList.remove('active');
            jumpStep.classList.add('active');
            if (isButtonNext) {
                currentStep.classList.add('to-left');
                progressOptions[element.dataset.to_step - 1].classList.add('active');
                //mostrarOcupados(fecha,ingreso,horas);
            } else {
                jumpStep.classList.remove('to-left');
                progressOptions[element.dataset.step - 1].classList.remove('active');
            }
            currentStep.removeEventListener('animationend', callback);
        });  
        currentStep.classList.add('inactive');
        jumpStep.classList.remove('inactive');
    }
    }
});
    //funcion boton regresar
    btnregresar = document.getElementById('btnregresar');
    btnregresar.addEventListener('click', function(e){
    let element=e.target;
    let isButtonBack = element.classList.contains('step__button--back');
    if (isButtonBack) {
        let currentStep = document.getElementById('step-' + element.dataset.step);
        let jumpStep = document.getElementById('step-' + element.dataset.to_step);
        currentStep.addEventListener('animationend', function callback() {
            currentStep.classList.remove('active');
            jumpStep.classList.add('active');
            jumpStep.classList.remove('to-left');
            progressOptions[element.dataset.step - 1].classList.remove('active');
            currentStep.removeEventListener('animationend', callback);
        });  
        currentStep.classList.add('inactive');
        jumpStep.classList.remove('inactive');
    }
    
});

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

//botones lugares
let options = [['A1'],['A2'],['A3'],['A4'],['A5'],['A6'],['B1'],['B2'],['B3'],['B4'],['B5'],['B6']]
let lugar;
var valorH; 
        function chequear(id){
            options.forEach(function(options, i){
                if (options[0]==id){          
                    lugar=id;
                    valorH = document.querySelector("#lugarSelec").value=lugar;
                    document.querySelector(".bttn-"+options[0]).setAttribute("style","background-color:#033F73; color:white"); 
                        //const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/reservas/insertarReserva/"+usuario);
                        //const data = await response.json()       
                } else {
                    document.querySelector(".bttn-"+options[0]).setAttribute("style","background-color:white");
                }
            })
        }

        /*async function mostrarOcupados(fecha,ingreso,horas){
            console.log("ejecutando mostrarOcupados");
            const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/reservas/mostrarOcupados/"+fecha+"/"+ingreso+"/"+horas);
            const data = await response.json()

            console.log(data);


        }*/

        var alertaReserva = document.getElementById('reserva-msg');
        async function reservar(){
            if (lugar== undefined) {
                alertaReserva.innerHTML = "Debe seleccionar un lugar";
            } else {
                document.getElementById('btn-redirect').click();
            }

        }

