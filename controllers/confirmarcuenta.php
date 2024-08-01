<?php   
   /*session_start();
    $estado = true;
    if (!isset($_SESSION['id'])) {
        $estado = false;
        header("Location: logueo.php");
    }*/
    $email= $_GET['email'];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Validar Cuenta</title>
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
  <link href="../assets/css/mainlogin.css" rel="stylesheet">

</head>

<body>
  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button
    {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number]
      {-moz-appearance: textfield;}

  .error{
    background-color: lightpink;
    /*border: solid 1px #df6161;
    padding: 0.5rem;*/
    color: #df6161;
    border-radius: 5px;
    text-align: center;
  }

  .mensaje2{
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

      <a class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Ades<span>.</span></h1>
      </a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section class="sample-page">
      <div class="align-items-center">
          <h2>Validar Cuenta</h2>
        </div>
      <div class="container" data-aos="fade-up">
        <form action="../php/verificar.php" method="POST" id="form">
            <center>
              <div class="mensaje6">
                <?php 
                  if (isset($_GET['mensaje6']) != "")
                      echo $_GET['mensaje6'];
                 ?> 
              </div>
                <div class="mensaje2">
                    <?php 
                      if (isset($_GET['mensaje2']) != "")
                              echo $_GET['mensaje2'];
                    ?>
                  </div>
           </center>
           <div class="error">
            <span id="codigo-msg"></span>
            </div>
          <input type="number" placeholder="código de verificación" name="codigo" id="codigo" onclick="ocultar()">

           <input type="text" hidden name="email" value= "<?php echo (isset($_GET['email'])) ? $_GET['email'] : ''; ?>" >

        <input type="submit" class="btn-book-a-table-iniciar" value="Validar" name="btn-verificar">
          <hr style="width:98%" size="3" color=black>
          <div class="email" id="email">
            <?php
                echo $email;
             ?>
         </div>
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
  <script src="../assets/js/confirmarcuenta.js"></script>

</body>
</html>