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
    }else{
      include '../php/conexion.php';
      $idR=$_GET['id'];
      echo $idR;
      $resultado= $conexion->query("select * from reservas where ID_reservas='$idR'") or die($conexion->error);
     } 
  if (mysqli_num_rows($resultado) > 0){
    $rows = $resultado->fetch_all(MYSQLI_ASSOC);
    $_SESSION['fecha']= $rows[0]['fecha'];
    $_SESSION['hora_ingreso']= $rows[0]['hora_ingreso'];
    $_SESSION['cant_horas']= $rows[0]['cant_horas'];
    $_SESSION['lugar']= $rows[0]['lugar'];

      $fecha= $_SESSION['fecha'];
      $hora_ingreso= $_SESSION['hora_ingreso'];
      $cant_horas= $_SESSION['cant_horas'];
      $lugar= $_SESSION['lugar'];
    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Modificar Reserva</title>
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
  <link href="../assets/css/mainModificarReserva.css" rel="stylesheet">

</head>

<body>

<style>

input[type="time"]{
    background-color: white;
}
input[type="date"]{
    background-color: white;
}
input[type="number"]{
    background-color: white;
}
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
  .info2{
    margin-top: 20px;
    height: 40px;
 
}
  .info2 > label{
    position: absolute;
    transform: translate(1px, -13px);
    user-select: none;
    font-size: small;
    color: #033F73;
  }
  select{
    background-color: white;
    margin-top: 10px;
    width: 250px;
    border: none;
    border-bottom: 1px solid #033F73;
  }
    select:{
    border: none;
    border-bottom: 1px solid #033F73;
  }
  .select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
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
.error3 {
    background-color: lightgreen;
    color: green;
    border-radius: 5px;
    text-align: center;
    width: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
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
            background-color: #ffffffbd;
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
            margin-top: -200px;
            height: 150vh;
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
            margin-top: -20px;
        }
        .hero_cta:hover{
            background-color: #033F73;  
            color: white;
        }
        h4{
          font-size: 13pt;
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
      <section class="modal">
        <div class="modal_container">
            <img src="../assets/img/mapa.png" class="modal_img">
            <h4 class="modal_title">Mapa de Referencia</h4>
            <a href="#" class="modal_close">cerrar</a>
         </div>
      </section>
      <div class="align-items-center">
          <h2>Modificar Reserva</h2>
        </div>
          <div class="error3">
             <span id="correcto-msg"></span>
           </div>
           <br>
      <div class="container" data-aos="fade-up">

        <form method="POST" action="modificardatos.php">
          
          <div class="info">
              <div class="error">
                 <span id="fecha-msg"></span>
              </div>
              <br>
          <label for="nombre">Fecha</label>
     			<input type="date" name="fecha" id="fecha" value=" <?php echo $fecha; ?> " min="<?php echo date('Y-m-d');?>" max="2022-12-31">
          </div>
          <div class="info">
              <div class="error">
                <span id="fecha-msg"></span>
              </div>
              <br>
          <label for="nombre">Hora Ingreso</label>
       			<input type="time" id="ingreso" name="hora" value=" <?php echo $hora_ingreso; ?> " >
            </div>
            <div class="info">
              <div class="error">
                <span id="fecha-msg"></span>
              </div>
              <br>
            <label for="nombre">Cantidad Horas</label>
        		 <input type="number" name="horas" id="horas" value=" <?php echo $cant_horas; ?>" min="1" max="10">
             </div>
             <div class="info2">
                 <label for="nombre">Lugar</label>
                 <select name="select">
                    <option value="">A1</option>
                    <option value="">A2</option>
                    <option value="">A3</option>
                    <option value="">A4</option>
                    <option value="">A5</option>
                    <option value="">A6</option>
                    <option value="">B1</option>
                    <option value="">B2</option>
                    <option value="">B3</option>
                    <option value="">B4</option>
                    <option value="">B5</option>
                    <option value="">B6</option>
                 </select>
             </div>
              <div class="mapa">
                          <button class="hero_cta">Mapa</button>
                    </div>
             <hr style="width:98%" size="3" color=black>
         		<input type="submit" id="btn2" class="btn-book-a-table-iniciar"  value="Modificar">
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
  <script src="../assets/js/modificarreserva.js"></script>

</body>

</html>