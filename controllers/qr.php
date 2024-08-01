<?php   
  session_start();
    $estado = true;

    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }
    else{
      $idUsuario=$_SESSION['id'];
      $usuario=$_SESSION['usuario'];
      $nombre=$_SESSION['nombre'];
      $patente= $_SESSION['patente'];
      $apellido= $_SESSION['apellido'];
      @$idReservaa=$_SESSION['ID_reservas'];
      echo $idReservaa;
    }
    /*$rutaQr='';
    $error='';
    $mensaje='';
    echo $idReserva;
    $texto = $nombre.",".$apellido.",".$patente.",".$idReservaa;
    if (file_exists("../phpqrcode/qrlib.php")) {
      require "../phpqrcode/qrlib.php";
      $rutaQr="../assets/img/imgQR/".$usuario.".png";
      $tamaño=10;
      $level="Q";
      $framSize=3;

      QRcode::png($texto,$rutaQR,$level,$tamaño,$framSize);

      if(file_exists($rutaQR)){
        $error=0;
        $mensaje="se genero qr";       
      }
    }else{
      $error=1;
      $mensaje="no existe la libreria";
    }
    $resp=[
      "error"=>$error,
      "mensaje"=>$mensaje,
      "datos"=>$rutaQr
    ];
    echo json_encode($resp);*/
     require "../phpqrcode/qrlib.php";

     $ruta="../assets/img/imgQR/";

      if (!file_exists($ruta)){
        mkdir ($ruta);
      }

      $filename="../assets/img/imgQR/".$usuario.".png";
      $tamanio=7;
      $level="M";
      $frameSize=3;
      $contenido = $nombre.",".$apellido.",".$patente.",".$idReservaa;

       QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Código qr</title>
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
    <!-- <link href="../assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/mainQr.css" rel="stylesheet">

</head>

<body>

<style>

.btn-book-a-table {
    font-size: 14px;
    width: 200px;
    height: 35px;
    color: #fff;
    background: var(--color-primary);
    padding: 8px 20px;
    border-radius: 50px;
    transition: 0.3s;
    border: none;
    margin-top: 10px;
    text-align: center;
}
.btn-book-a-table:hover{
  background: #416A9A;
  color: white;
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
              <h2>Se generó tu reserva</h2>
              <p>Aquí tienes tu código QR de ingreso y egreso.</p>
        </div>
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">  
                <div class="abajo">
                   <?php echo '<img src="'.$filename.'"/>'; ?> 
                   <a href=" <?php echo $filename; ?>" class="btn-book-a-table" download>Descargar QR</a>
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
  <script src="../assets/js/qr.js"></script>

</body>

</html>