<?php   
include '../php/conexion.php';
  @$eliminado= $_GET['eliminado'];
 @$mensajeNO= $_GET['mensajeNO'];

  session_start();

    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }
    else{
      $id=$_SESSION['id'];
      $patente= $_SESSION['patente'];
      $resultado= $conexion->query("select * from reservas where ID_usuario='$id'") or die($conexion->error);
     } 

  if (mysqli_num_rows($resultado) > 0){

    $rows = $resultado->fetch_all(MYSQLI_ASSOC);
    //$_SESSION['reservasXD'] = $rows;
    $_SESSION['ID_reservas']= $rows[0]['ID_reservas'];
    $_SESSION['fecha']= $rows[0]['fecha'];
    $_SESSION['hora_ingreso']= $rows[0]['hora_ingreso'];
    $_SESSION['cant_horas']= $rows[0]['cant_horas'];
    $_SESSION['lugar']= $rows[0]['lugar'];

      $idReserva=$_SESSION['ID_reservas'];
      $fecha= $_SESSION['fecha'];
      $hora_ingreso= $_SESSION['hora_ingreso'];
      $cant_horas= $_SESSION['cant_horas'];
      $lugar= $_SESSION['lugar'];
      $usuario=$_SESSION['usuario'];

      $parteFecha = explode(":",$hora_ingreso);
      //resultado final
      $horaSalida = ($parteFecha[0] + $cant_horas).":".$parteFecha[1].":00";
    }else{
      $idReserva='';
      $fecha='';
      $hora_ingreso='';
      $cant_horas='';
      $lugar='';
      $usuario='';
    }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reservar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/mainMisReservas.css" rel="stylesheet">

</head>

<body>
<style>
  .centrar{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .centrar2{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .eliminado {
    color: green;
    border-radius: 5px;
    background-color: #a4cfa4;
}
  .mensajeNO{
    background-color: lightpink;
    /*border: solid 1px #df6161;
    padding: 0.5rem;*/
    color: #df6161;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 300px;
  }
  .cartaReserva{
    height: 380px;
    width: 550px;
    background-color: white;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 15px;
    outline: dashed thin;
    outline: 2px solid #033F73;
    outline-offset: -10px;
  }

  h3{
    font-size: 19pt;
    color:#033F73;
  }
  .reserva{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  p{
    height: 12px;
  }
  .opciones{
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap:160px;
  }
    @media (orientation:portrait){
    .cartaReserva{
      width: 300px;
      margin-top:-100px;
    }
    .opciones{
      gap:80px;
    }

  }
  /*input[type="submit"] {
    background-color: #033F73;
    border: none;
    color: white;
    border-radius: 20px;
    cursor: pointer;
    font-size: 11pt;
    height: 30px;
}
  input[type="submit"]:hover {
    background-color: #416A9A;
}*/

/*model*/
.mapa{
  margin-top: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
          .modal{
             /*background-color: #111111bd;*/
            background-color: #E7E7E7bd;
            display: flex;
            opacity: 0;
            pointer-events: none;
            transition: opacity .6s .8s;
            --transform: translateY(-90vh);
            --transition: transform .8s;
        }
        .modal--show{
            opacity: 1;

            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
        }
        .modal_container{
            min-width: 30%;
            margin: auto;
            background-color: white;
            border-radius: 20px;
            padding: 2em 2em;
            display: grid;
            gap:1em;
            place-items:center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition: var(--transition);
        }
        @media (orientation:portrait) {
          .modal_container{
            width: 60%;
          }
          .modal--show{
            margin-top: -150px;
            height: 120vh;
          }
          .modal_img{
            width: 350px;
          }
          h4{
            font-size: 14pt;
          }
        }
        .modal_img{
            width: 400px;
           
        }
        .modal_close{
            width: 150px;
            height: 40px;
            text-decoration: none;
            color: white;
            background-color: #033F73;  
            border:2px solid white;
            border-radius: 20px;
            display: inline-block;
            font-weight: 300;
            transition: background-color .4s;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .modal_close:hover{
            color:#033F73;
            background-color: white;
            border:2px solid #033F73;
        }

        .modal_title{
            font-weight: 300;
        }
        .hero_cta{
            height: 50px;
            width: 50px;
            border-radius: 50px; 
            border:none;
            background-color: white;
            border:2px solid #033F73;
            color:#033F73;
            transition: background-color .4s;
        }
        .hero_cta:hover{
            background-color: #033F73;  
            color: white;
        }
        /*modal2*/
        .modal2{
             /*background-color: #111111bd;*/
            background-color: #E7E7E7bd;
            display: flex;
            opacity: 0;
            pointer-events: none;
            transition: opacity .6s .8s;
            --transform: translateY(-90vh);
            --transition: transform .8s;
        }
        .modal--show2{
            opacity: 1;

            pointer-events: unset;
            transition: opacity .6s;
            --transform: translateY(0);
            --transition: transform .8s .8s;
        }
        .modal_container2{
            min-width: 30%;
            margin: auto;
            background-color: white;
            border-radius: 20px;
            padding: 2em 2em;
            display: grid;
            gap:1em;
            place-items:center;
            grid-auto-columns: 100%;
            transform: var(--transform);
            transition: var(--transition);
        }
        @media (orientation:portrait) {
          .modal_container2{
            width: 60%;
          }
          .modal--show2{
            margin-top: -150px;
            height: 120vh;
          }
          .modal_img2{
            width: 350px;
          }
          h4{
            font-size: 14pt;
          }
        }
        .modal_img2{
            width: 400px;
           
        }
        .modal_close2{
            width: 150px;
            height: 40px;
            text-decoration: none;
            color: white;
            background-color: #033F73;  
            border:2px solid white;
            border-radius: 20px;
            display: inline-block;
            font-weight: 300;
            transition: background-color .4s;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .modal_close2:hover{
            color:#033F73;
            background-color: white;
            border:2px solid #033F73;
        }

        .modal_title2{
            font-weight: 300;
        }
        .hero_cta2{
            height: 50px;
            width: 50px;
            border-radius: 50px; 
            border:none;
            background-color: white;
            border:2px solid #033F73;
            color:#033F73;
            transition: background-color .4s;
        }
        .hero_cta2:hover{
            background-color: #033F73;  
            color: white;
        }

        /*popUP*/
    input[type="submit"]{
      height: 40px;
      width: 150px;
      cursor: pointer;
      font-size: 13pt;
      border-radius: 10px;
    }
     input[type="submit"]:hover{
      background-color:#b3b3b3 ;
    }
    .contenedor-inputs{
      display: flex;
      align-items: center;
      justify-content: center;
      gap:30px;
    }
    .btn-submit-eliminar{
      height: 40px;
      width: 150px;
      cursor: pointer;
      font-size: 13pt;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: lightpink;
        color: #df6161;
        border: 1px solid #df6161;
        border-radius: 10px;
    }
    .btn-submit-eliminar:hover{
      background-color:#ffa9b6;

    }
 
    .btn-submit-cancelar{
      background-color:  #C6C6C6;
        color: #7a7a7a;
        border: 1px solid #7a7a7a;
    }
    .btn-abrir-popup{
      border: none;
      background-color: transparent;
      color: #033F73;
    }
    .overlay {
  background: #E7E7E7bd;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  align-items: center;
  justify-content: center;
  display: flex;
  visibility: hidden;
}

.overlay.active {
  visibility: visible;
}

.popup {
  background: #F8F8F8;
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
  border-radius: 10px;
  font-family: 'Montserrat', sans-serif;
  padding: 20px;
  text-align: center;
  width: 600px;
  
  transition: .3s ease all;
  transform: scale(0.7);
  opacity: 0;
}
  @media (orientation:portrait){
    .popup{
      width: 320px;
      margin-top: -100px;
    }

  }
.popup .btn-cerrar-popup {
  font-size: 16px;
  line-height: 16px;
  display: block;
  text-align: right;
  transition: .3s ease all;
  color: #BBBBBB;
}

.popup .btn-cerrar-popup:hover {
  color: #000;
}

.popup h4 {
  font-size: 23px;
  font-weight: 300;
  margin-bottom: 40px;
  opacity: 0;
}

.popup form .contenedor-inputs {
  opacity: 0;
}

.popup form .contenedor-inputs input {
  width: 100%;
  margin-bottom: 20px;
  height: 52px;
  font-size: 18px;
  line-height: 52px;
  text-align: center;
  border: 1px solid #BBBBBB;
}

.popup form .btn-submit {
  padding: 0 20px;
  height: 40px;
  line-height: 40px;
  border: none;
  color: #fff;
  background: #5E7DE3;
  border-radius: 3px;
  font-family: 'Montserrat', sans-serif;
  font-size: 16px;
  cursor: pointer;
  transition: .3s ease all;
}

.popup form .btn-submit:hover {
  background: rgba(94,125,227, .9);
}

/* ------------------------- */
/* ANIMACIONES */
/* ------------------------- */
.popup.active { transform: scale(1); opacity: 1; }
.popup.active h3 { animation: entradaTitulo .8s ease .5s forwards; }
.popup.active h4 { animation: entradaSubtitulo .8s ease .5s forwards; }
/*.popup.active .contenedor-inputs { animation: entradaInputs 1s linear 1s forwards; }*/

@keyframes entradaTitulo {
  from {
    opacity: 0;
    transform: translateY(-25px);
  }

  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes entradaSubtitulo {
  from {
    opacity: 0;
    transform: translateY(25px);
  }

  to {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes entradaInputs {
  from { opacity: 0; }
  to { opacity: 1; }
}

</style>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Ades<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="principal.php">Inicio</a></li>
          <li><a href="perfil.php">Perfil</a></li>
          <li><a href="reservar.php">Reservar</a></li>
          <li><a href="../php/logout.php">Cerrar Sesión</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="sample-page">
    <div class="align-items-center">
          <h2>Mis Reservas</h2>
        </div>
        <p>Recuerda que la tolerancia es de 20 minutos</p>
        <p>si no acude a su lugar a tiempo la reserva se cancelará automáticamente.</p>
        <div class="centrar">
            <div class="mensajeNO">
              <?php 
                if ($mensajeNO != "")
                          echo $mensajeNO;
               ?>
            </div>
        </div>
        <br>
        <div class="centrar2">
            <div class="eliminado">
               <?php 
                if ($eliminado != "")
                    echo $eliminado;
               ?>
            </div>
        </div>
    <section id="testimonials" class="testimonials section-bg">
      <section class="modal">
          <div class="modal_container">
              <img src="<?php echo '../assets/img/imgQR/'.$usuario.'.png'; ?>" class="modal_img">
             <center><h4 class="modal_title">QR de ingreso y egreso</h4></center>
              <a href="#" class="modal_close">cerrar</a>
          </div>
      </section>
  <div class="container" data-aos="fade-up" >  
     <!-- style="overflow-y: scroll" -->
<div class="abajo">

  <?php   
   if (mysqli_num_rows($resultado) > 0){
    echo '<div class="cartaReserva">
                    <h3>Reserva</h3>
                    <div class="reserva">
                      <p>Patente: '. $patente .'</p>
                      
                      <p>Fecha Reserva: '. $fecha.'</p>
                      <p>Horario Ingreso:'. $hora_ingreso .'</p>
                      <p>Horario salida: '. $horaSalida .'</p>
                      <p>Lugar Seleccionado: '. $lugar .'</p>
                      </div>
                       <div class="mapa">
                          <button class="hero_cta">QR</button>
                        </div>
                        <hr style="width:90%" size="3" color=black>
                      <div class="opciones">
                         <button id="btn-abrir-popup" class="btn-abrir-popup">Eliminar Reserva</button>
                      </div>
                  </div>';
    }else{
      echo "<div class='cartaReserva'>No tienes reservas.</div>";
    }
        /*if(isset($_SESSION['reservasXD'])){
          $largo = count($_SESSION['reservasXD']);
          
          if($largo == 0){
            echo "<div class='cartaReserva'>No tienes reservas.</div>";
          }else{

            //$reservas = $_SESSION['reservasXD'];

            //for ($reserva=0; $reserva < $largo; $reserva++) { 
               echo '<div class="cartaReserva">
                    <h3>Reserva</h3>
                    <div class="reserva">
                      <p>Patente: '. $patente .'</p>
                      
                      <p>Fecha Reserva: '. $fecha.'</p>
                      <p>Horario Ingreso:'. $hora_ingreso .'</p>
                      <p>Horario salida: '. $horaSalida .'</p>
                      <p>Lugar Seleccionado: '. $lugar .'</p>
                      </div>
                       <div class="mapa">
                          <button class="hero_cta">QR</button>
                        </div>
                        <hr style="width:90%" size="3" color=black>
                      <div class="opciones">
                         <button id="btn-abrir-popup" class="btn-abrir-popup">Eliminar Reserva</button>
                      </div>
                  </div>';
           // }
          }

        }*/

  ?> 
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <h4>¿Estas seguro de eliminar la reserva?</h4>
            <div class="contenedor-inputs">
              <!--<input type="submit"  class="btn-submit-eliminar" name="eliminar" value="Eliminar"> -->
              <a href="../php/eliminarReserva.php" class="btn-submit-eliminar" name="eliminar">Eliminar</a>
              <input type="submit" class="btn-submit-cancelar" name="cancelar" id="btn-cerrar-popup" value="Cancelar">
              <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            </div>      
        </div>
      </div>
</div>
</div>
</section>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Ades</span></strong>. Derechos de Autor
      </div>
      <div class="credits">
        Diseñada por <a>Agostina Novales</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
    <script src="../assets/js/misreservas.js"></script>
<script>
  var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
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
});


</script>
</body>

</html>