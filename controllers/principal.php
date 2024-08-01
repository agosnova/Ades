<?php   
  session_start();
    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }else{
      $nombre=$_SESSION['nombre'];
    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Panel</title>
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
  <link href="../assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.2.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<style>
  .nom{
    color: #033F73;
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-2"> 
          <h2 data-aos="fade-up">Bienvenidx a Ades <span class="nom"><?php echo $nombre; ?></span></h2>
          <p data-aos="fade-up" data-aos-delay="100">Gracias por elegirnos.</p>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Ades</h2>
          <p>Sientete <span>cómodo</span> utilizando nuestra app</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(../assets/img/2.jpg)">
              <h3>Reservá desde tu celular.</h3>
              <p class="description">
                Ades
              </p>
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(../assets/img/auto.jpg)">
              <h3>Manejá tus reservas como gustes.</h3>
              <p class="description">
                Ades
              </p>
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(../assets/img/aa.jpg)">
              <h3>Elegí el mejor lugar para vos.</h3>
              <p class="description">
                Ades
              </p>
            </div><!-- End Event item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    

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

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>