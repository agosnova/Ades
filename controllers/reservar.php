<?php   
  session_start();
    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }
    else{
      $idUsu=$_SESSION['id'];
      $patente= $_SESSION['patente'];
      include '../php/conexion.php';
      $resultado= $conexion->query("select * from reservas where ID_usuario='$idUsu'") or die($conexion->error);
      //$rows = $resultado->fetch_all(MYSQLI_ASSOC);
     } 
     $mensajeNO='';
  if (mysqli_num_rows($resultado) > 0){
    header('location:../controllers/misreservas.php?mensajeNO=ya tienes una reserva en curso');
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
  <link href="../assets/css/mainReservar.css" rel="stylesheet">

</head>

<body>

  <style>
            .abajo{
            min-height: 120vh;
            padding-top: 50px;
            }

          /* Formulario */
          .form-register {
              padding: 20px 15px;
              width: 100%;
              max-width: 400px;
              height: 100vh;
          }

          /* Header del formulario */

          /* Progressbar */
          .progressbar {
              display: flex;
              list-style: none;
              margin-bottom: 15px;
              counter-reset: step;
          }

          .progressbar__option {
              width: 100%;
              text-align: center;
              font-size: .7rem;
              text-transform: uppercase;
              position: relative;
          }

          .progressbar__option:before {
              display: flex;
              content: counter(step);
              counter-increment: step;
              width: 25px;
              height: 25px;
              background-color: white;
              margin: 0 auto 5px;
              border-radius: 20px;
              justify-content: center;
              align-items: center;
              position: relative;
              z-index: 2;
          }


          .progressbar__option:after {
              display: block;
              content: '';
              width: 100%;
              height: 2px;
              background-color: white;
              position: absolute;
              top: 10px;
              left: -50%;
              z-index: 1;
          }

          .progressbar__option:first-child:after {
              content: none;
          }

          .progressbar__option.active:before, .progressbar__option.active:after {
              background-color:#033F73;
              color:white;
          }

          /* Título del formulario */
          .form-register__title {
              font-size: 2rem;
              text-align: center;
              margin-bottom: 15px;
          }

          /* body del formulario */
          .form-register__body {
              display: flex;
              align-items: flex-start;
          }

          /* step */
          .step {
              background-color:white;
              border-radius: 20px;
              min-width: 100%;
              opacity: 0;
              transition: all .2s linear;
              overflow: hidden;
          }

          .step.active {
              opacity: 1;
          }

          .step.to-left {
              margin-left: -100%;
          }

          .step.inactive {
              animation-name: scale;
              animation-duration: .2s;
              animation-direction: alternate;
              animation-iteration-count: 2;
          }

          @keyframes scale {
              from {
                  transform: scale(1);
              }
              to {
                  transform: scale(1.1);
              }
          }

          /* header de step */
          .step__header {
              background-color: white;
              display: flex;
              justify-content: center;
              flex-direction: column;
              border-radius: 3px 3px 0 0;
              align-items: center;
          }

          .step__title {
            height: 15px;
              font-size: 1rem;
              color:black;
              text-align: center;
              cursor: default;
              margin-top: 10px;
          }

          /* body de step */
          .step__body {
              padding: 20px 15px 0;
          }

          /* step inputs */
          .step__input {
              display: block;
              width: 100%;
              padding: 10px;
              margin-bottom: 10px;
          }

          /* step footer */
          .step__footer {
              padding: 20px 15px;
              text-align: center;
          }

          /* step botones */
          .step__button {
              display: inline-block;
              padding: 10px;
              background-color:#033F73;
              border: none;
              color: white;
              border-radius: 20px;
              cursor: pointer;
              width: 150px;
          }

          .step__button2{
              display: inline-block;
              padding: 10px;
              background-color:white;
              color: #033F73;
              border-radius: 20px;
              border: 2px solid #033F73;
              cursor: pointer;
              width: 150px;
          }

          .step__button2:hover{
            box-shadow: 0 6px 20px #416a9a;
          }

          .step__button:hover{
              background: #416A9A;
            box-shadow: 0 6px 20px #416a9a;
          }

          ol, ul {
              padding-left: 0rem;
          }

          input{
            border:none;
            border-bottom: 1px solid black;
            background-color: white;
          }

          input:focus{
            outline: none;
          }

          .patente{
            display: flex;
            justify-content: center;
            align-items: center;
          }
          select{
            border:none;
            border-bottom: 1px solid black;
            background-color: white;
          }
          select:focus{
            outline:none;
            background-color: white;
          }

          .info > label{
              position: absolute;
              transform: translate(1px, -13px);
              user-select: none;
              font-size: small;
              color: #033F73;
              cursor: default;
          }
          /*model*/
          .mapa{
            margin-top: 30px;
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
                      width: 70%;
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
                      width: 90%;
                    }
                    .modal--show{
                      margin-top: -150px;
                    }
                    .modal_img{
                      width: 350px;
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
                      height: 55px;
                      width: 55px;
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
                  h4{
                    font-size: 13pt;
                  }
                  /*input radios*/
                  .cheks{
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                    gap:15px;
                  }
                  .fila1{
                    height: 40px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap:1rem;
                  }
                  .fila2{
                    height: 40px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap:1rem;
                  }
                .bttn{
                    height: 34px;
                    width: 34px;  
                    border-radius: 50%;
                    border: 2px solid  #033F73;
                    outline: none;
                    cursor: pointer;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                  }

          /*errores de validaciones*/
            .error{
              background-color: lightpink;
              /*border: solid 1px #df6161;
              padding: 0.5rem;*/
              color: #df6161;
              border-radius: 5px;
              text-align: center;
            }
            .error2 {
              background-color: lightpink;
              color: #df6161;
              border-radius: 5px;
              text-align: center;
              width: 200px;
              display: flex;
              justify-content: center;
              align-items: center;
          }
            /*paso 1 cajas*/
          input[type="date"]{
            cursor:pointer;
          }
          input[type="time"]{
            cursor:pointer;
          }
          .ocupado{
            display: flex;
            justify-content: center;
            align-items: center;
            gap:10px;
            cursor: default;
          }
          .circulo{
             height: 20px;
             width: 20px;  
             background-color: #BFBFBF;
             border-radius: 50%;
          }
           .mensaje{
              background-color: lightpink;
              /*border: solid 1px #df6161;
              padding: 0.5rem;*/
              color: #df6161;
              border-radius: 5px;
              text-align: center;
            }
          .algo{
            height: 30px;
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
          <li><a href="misreservas.php">Mis Reservas</a></li>
          <li><a href="../php/logout.php">Cerrar Sesión</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="sample-page">
    
     
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">  
<div class="abajo">

 <form action="../php/reservar.php" class="form-register" method="POST">
    <input type="hidden" name="lugar" id="lugarSelec" value="">
            <div class="form-register__header">
              <h1 class="form-register__title">Generá tu Reserva</h1>
              <br>
                <ul class="progressbar">
                    <li class="progressbar__option active">paso</li>
                    <li class="progressbar__option">paso</li>
                </ul>      
            </div>
            <div class="form-register__body">
                <div class="step active" id="step-1">
                    <div class="step__header">
                        <h2 class="step__title">Indica hora y fecha de reserva <br>El tiempo mínimo es de 1 hora.</h2>
                    </div>
                    <br>
                  <div class="patente">
                    <h4>Patente: <?php echo $patente ?></h4>
                    <!--<select name="selector" id="">
                      <option disabled selected>Selecciona tu Patente</option>
                        <option value="">1</option>
                        <option value="">2</option>
                      </select> -->
                  </div>
                  <br>
                    <div class="step__body">
                      <div class="info">
                        <div class="error">
                             <span id="fecha-msg"></span>
                        </div>
                          <br>
                      <label for="nombre">Fecha Reserva</label>
                        <input type="date"  name="fecha" class="step__input" min="<?php echo date('Y-m-d');?>" max="2022-12-31" id="fechareserva">
                        </div>
                        <br>
                      <div class="info">
                        <div class="error">
                             <span id="ingreso-msg"></span>
                        </div>
                        <br>
                      <label for="nombre">Hora Ingreso</label>
                        <input type="time" id="ingreso" name="ingreso" class="step__input">
                        </div>
                        <br>
                        <div class="info">
                          <div class="error">
                             <span id="horas-msg"></span>
                          </div>
                          <br>
                        <label for="nombre">Cantidad Horas</label>
                        <input type="Number" name="horas" id="horas" class="step__input" min="1" max="10">    
                    </div>
                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button step__button--next" data-to_step="2" data-step="1" id="btn">Siguiente</button>
                    </div>
                </div>

                <div class="step" id="step-2">
                  <!-- modal -->
                  <section class="modal">
                      <div class="modal_container">
                          <img src="../assets/img/mapa.png" class="modal_img">
                          <h4 class="modal_title">Mapa de Referencia</h4>
                          <a href="#" class="modal_close">cerrar</a>
                      </div>
                  </section>
                  <!-- /modal -->
                    <div class="step__header">
                      <br>
                       <div class="error2">
                             <span id="reserva-msg"></span>
                        </div>
                        <h2 class="step__title">Seleccioná un lugar.</h2>
                        <div class="ocupado">
                          <div class="circulo"></div>
                          ocupado
                        </div>
                    </div>
                    <div class="step__body">
                          <div class="cheks">
                            <div class="fila1">
                                <div class="bttn bttn-A1" id="A1" name="botones" onclick="chequear('A1')">A1</div>
                                <div class="bttn bttn-A2" id="A2" name="botones" onclick="chequear('A2')">A2</div>
                                <div class="bttn bttn-A3" id="A3" name="botones" onclick="chequear('A3')">A3</div>
                                <div class="bttn bttn-A4" id="A4" name="botones" onclick="chequear('A4')">A4</div>
                                <div class="bttn bttn-A5" id="A5" name="botones" onclick="chequear('A5')">A5</div>
                                <div class="bttn bttn-A6" id="A6" name="botones" onclick="chequear('A6')">A6</div>
                            </div>
                            <div class="fila2">
                                <div class="bttn bttn-B1" id="B1" name="botones" onclick="chequear('B1')">B1</div>
                                <div class="bttn bttn-B2" id="B2" name="botones" onclick="chequear('B2')">B2</div>
                                <div class="bttn bttn-B3" id="B3" name="botones" onclick="chequear('B3')">B3</div>
                                <div class="bttn bttn-B4" id="B4" name="botones" onclick="chequear('B4')">B4</div>
                                <div class="bttn bttn-B5" id="B5" name="botones" onclick="chequear('B5')">B5</div>
                                <div class="bttn bttn-B6" id="B6" name="botones" onclick="chequear('B6')">B6</div>
                            </div>
                          </div>
                      <div class="mapa">
                          <button class="hero_cta">Mapa</button>
                    </div>
                    </div>
                    <div class="step__footer">
                        <button type="button" class="step__button2 step__button--back" data-to_step="1" data-step="2" id="btnregresar">Regresar</button>
                        <button type="button" id="btnreservar" name="btnReservar" class="step__button step__button--next" onclick="reservar()">Reservar</button>
                        <input type="submit" id="btn-redirect" hidden>
                    </div>
                </div>
            </div>
        </form>

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
  <script src="../assets/js/reservar.js"></script>

</body>

</html>