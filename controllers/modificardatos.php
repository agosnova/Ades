<?php 
  $mensaje='';
 /*if (isset($_POST['btn-modificar'])){
    $mensaje = validarModificarDatos();
  }*/
      session_start();
    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    } else {
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $fecha= $_SESSION['fecha'];
        $email= $_SESSION['email'];
        $usuario= $_SESSION['usuario'];
        $patente= $_SESSION['patente'];
    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modificar Datos</title>
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
  <link href="../assets/css/mainModificardatos.css" rel="stylesheet">

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
          <h2>Modificar Datos</h2>
        </div>
      <div class="container" data-aos="fade-up">
        <form method="POST" action="modificardatos.php">
          <div class="info">
          <label for="nombre">Nombre</label>
     			<input type="text" name="nombre" value="<?php echo $nombre; ?>" onclick="ocultar()">
          </div>
          <div class="info">
          <label for="nombre">Apellido</label>
       			<input type="text" name="apellido" value="<?php echo $apellido; ?>" onclick="ocultar()">
            </div>
            <div class="info">
            <label for="nombre">Fecha Nacimiento</label>
       			<input type="date" name="fecha" value="<?php echo $fecha; ?>" id="fecha" min="1900-01-01" max="2022-12-31" onclick="ocultar()">
            </div>
            <div class="info">
            <label for="nombre">Email</label>
        		 <input type="email" name="email" value="<?php echo $email; ?>" onclick="ocultar()">
             </div>
             <div class="info">
             <label for="nombre">Usuario</label>
         		<input type="text" name="usuario" value="<?php echo $usuario; ?>" onclick="ocultar()">
            </div>
            <div class="info">
            <label for="nombre">Patente</label>
            <input type="text" name="patente" value="<?php echo $patente; ?>" onclick="ocultar()">
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
  <script src="../assets/js/register.js"></script>

</body>

</html>