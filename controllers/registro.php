<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro</title>
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
  <link href="../assets/css/mainRegistro.css" rel="stylesheet">

</head>

<body>
<style>
  .error{
    background-color: lightpink;
    /*border: solid 1px #df6161;
    padding: 0.5rem;*/
    color: #df6161;
    border-radius: 5px;
    text-align: center;
  }


</style>
   <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="../index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Ades<span>.</span></h1>
      </a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="sample-page">
      <div class="align-items-center">
          <h2>Registro</h2>
        </div>
      <div class="container" data-aos="fade-up">

        <form action="../php/register.php" id="frm_usuario" method="POST">

            <div class="error">
            <span id="name-msg"></span>
            </div>
     			  <input type="text" onchange="verificarCampo('nombre', 'name-msg', 'txtnombre')" name="nombre" id="txtnombre" placeholder="Nombre">

            <div class="error">
            <span id="ape-msg"></span>
            </div>
       			<input type="text" onchange="verificarCampo('apellido', 'ape-msg', 'txtapellido')" name="apellido" id="txtapellido" placeholder="Apellido">

           <div class="error">
            <center><span id="edad-msg"></span></center>
            </div>
            <input type="date" onchange="verificarEdad('Fecha Nacimiento', 'edad-msg')" name="fecha" id="txtedad" placeholder="Fecha Nacimiento" min="1900-01-01" max="2022-12-31">
       			
           <div class="error">
            <span id="email-msg"></span>
            </div>
        		 <input type="email" name="email" id="txtemail" placeholder="Email" onchange="verificarEmailEnUso('email', 'email-msg')">

            <div class="error">
            <span id="usuario-msg"></span>
            </div>
         		<input type="text" onchange="verificarUsuario('usuario-msg','txtusuario')" name="usuario" id="txtusuario" placeholder="Usuario">

            <div class="error">
            <span id="contrasena-msg"></span>
            </div>
        		 <input type="password" onchange="verificarPass('Contraseña', 'contrasena-msg')" name="contrasena" id="txtcontrasena" placeholder="Contraseña">

             <div class="error">
            <span id="repetir-msg"></span>
            </div>
         		<input type="password" onchange="verificarPass('Repetir Contraseña', 'repetir-msg')" name="repetircontrasena" id="txtrepetir" placeholder="Repetir Contraseña">

            <div class="error">
            <span id="patente-msg"></span>
            </div>
            <input type="text" onchange="verificarPatente('Patente', 'patente-msg','txtpatente')" name="patente" id="txtpatente" placeholder="Patente">

         		<input type="submit" class="btn-book-a-table-iniciar text-center"  value="Registrarme">
            
         		<hr style="width:98%" size="3" color=black>
         		<center>
              <a href="logueo.php">
           			 Ya Tengo Cuenta
          		</a>
            </center>
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
  <script src="../assets/js/register.js"></script>

</body>

</html>