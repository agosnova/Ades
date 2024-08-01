<?php
$mensaje='';
    session_start();
    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cambiar Contraseña</title>
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
  <link href="../assets/css/mainCambiarContrasena.css" rel="stylesheet">

</head>

<body>

<style>
.info{
  height: 40px;
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
  input[type="date"]{
    background-color: white;
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
          <li><a href="perfil.php">Perfil</a></li>
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
          <h2>Cambiar Contraseña</h2>
        </div>
      <div class="container" data-aos="fade-up">
        <form method="POST" id="form" action="modificardatos.php">
          <div class="info">
            <div class="error">
            <span id="msg-vieja"></span>
            </div>
          <label for="nombre">Contraseña Actual</label>
     			<input type="password" name="vieja" id="viejaa" onchange="validarVieja()">
          </div>

          <div class="info">
            <div class="error">
            <span id="msg-actual"></span>
            </div>
          <label for="nombre">Nueva Contraseña</label>
       			<input type="password" name="nueva" id="nuevaa">
            </div>

            <div class="info">
              <div class="error">
            <span id="msg-repetir"></span>
            </div>
            <label for="nombre">Confirmar Contraseña</label>
        		 <input type="password" name="repetir" id="repetirr">
             </div>
         		<input type="submit" class="btn-book-a-table-iniciar" name="btn-modificar" value="Modificar">

         		 <center><div class="mensaje">
         				 <?php 
         					 if ( $mensaje != "")
           					   echo $mensaje;
         				 ?>
          		</div></center>
		</form>
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
  <!--<script src="../assets/js/register.js"></script>-->
<script>

  passVieja='';
  async function validarVieja(){
    var passVieja= document.getElementbyId("viejaa").value;
    msg= document.getElementbyId('msg-vieja');

    if(passVieja.length < 8){
        alerta.innerHTML = "La contraseña es demasiado corta";
        campos = false;
      }else if (passVieja.length > 15) {
        alerta.innerHTML = "La contraseña es muy larga";
        campos = false;
      }else{
        alerta.innerHTML = "";
        campos = true;
      }

      const response = await fetch("https://mattprofe.com.ar/app-ades/api/index.php/usuarios/buscarContrasenia/"+passVieja);
            const data = await response.json()
            if (data.error == undefined){
              alerta.innerHTML = "El Usuario ingresado ya esta en uso";
              camposVerificados2 = false;
            }else{        
              alerta.innerHTML = ""; 
              camposVerificados2= true;
            }
    }

campos='';
form.addEventListener("submit", frm => {
      if(vieja.value=='' || nueva.value=='' || repetir.value==''){
         frm.preventDefault();
        campos1 = false;
      }else{
        campos1 = true;
      }
      if(campos==false || campos1==false){
        alert("Completa los campos correctamente para continuar");
      }
})
</script>
</body>

</html>