<?php
    session_start();
    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }else{
        $nombre=$_SESSION['nombre'];
        $apellido=$_SESSION['apellido'];
        $fecha=$_SESSION['fecha'];
        $email=$_SESSION['email'];
        $usuario=$_SESSION['usuario'];
        $patente=$_SESSION['patente'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perfil</title>
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
  <link href="../assets/css/mainPerfil.css" rel="stylesheet">

</head>

<body>
<style>
.name{
    height: 30px;
    width: 100%;
  }
.info{
  height: 25px;
  width: 200px;
  border-bottom: 1px solid black;
}
  .info > label{
    position: absolute;
    transform: translate(1px, -13px);
    user-select: none;
    font-size: small;
    color: #033F73;
  }
  .text{
    width: 100%;
    padding: 10px;
    border: 2px solid black;
    border-radius: 2px;
    outline: none;
    transform-origin: 50% 50% 0;
    transition-duration: 0.2s;
    caret-color:blue;
  }
  @media (orientation:portrait){
    .botones{
      flex-direction: column;
      gap:10px;
     
    }
    .btn-book-a-table, .btn-book-a-table:focus {
      width: 200px;
    }
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
          <li><a href="reservar.php">Reservar</a></li>
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
      <div class="align-items-center">
          <h2>Perfil</h2>
        </div>
      <div class="container" data-aos="fade-up">
        <form action="" id="frm_usuario">
             <center><h3><span ><?php echo $nombre.' '.$apellido; ?></span></h3></center>
             <div class="info">
                 <label for="nombre">Usuario</label>
                 <input class="name" hidden><?php echo $usuario; ?></input>
             </div>
              <div class="info">
                 <label for="nombre">Email</label>
                 <input class="name" hidden><?php echo $email; ?></input>
             </div>
              <div class="info">
                 <label for="nombre">Fecha Nacimiento</label>
                 <input class="name" hidden><?php echo $fecha; ?></input>
             </div>
              <div class="info">
                 <label for="nombre">Patente</label>
                 <input class="name" hidden><?php echo $patente; ?></input>
             </div>
                 <br>
                 <div class="botones">
                    <!--<a class="btn-book-a-table" href="modificardatos.php">Modificar Datos</a>-->
         		        <a class="btn-book-a-table" href="cambiarcontrasena.php">Cambiar Contraseña</a>
         		     </div>
            <hr style="width:98%" size="3" color=black></hr>
            <button id="btn-abrir-popup" class="btn-abrir-popup">Eliminar Cuenta</button>      
      </form>

      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <h4>¿Estas seguro de que quieres eliminar tu Cuenta?</h4>
            <div class="contenedor-inputs">
              <!--<input type="submit"  ../php/eliminarCuenta.phpclass="btn-submit-eliminar" name="eliminar" value="Eliminar"> -->
              <a href="" class="btn-submit-eliminar" name="eliminar">Eliminar</a>
              <input type="submit" class="btn-submit-cancelar" name="cancelar" id="btn-cerrar-popup" value="Cancelar">
            </div>      
        </div>
      </div>

      </div>
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