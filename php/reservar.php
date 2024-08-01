<?php 
include 'conexion.php';

	$mensaje='';
	$mesnaje6='';
	$conexion;
	// si el metodo no es post lo volvemos al index
	if($_SERVER['REQUEST_METHOD']!='POST'){

		header('Location: ../controllers/logueo.php');		

	}else{ // El metodo es post lo mandamos al panel.html
		session_start();
		$id= $_SESSION['id'];
		$fecha= $_POST['fecha'];
		$ingreso= $_POST['ingreso'];
		$horas= $_POST['horas'];
		$lugar=$_POST['lugar'];
		$parteFecha = explode(":",$ingreso);
      //resultado final
      	$horaSalida = ($parteFecha[0] + $horas).":".$parteFecha[1];

		$conexion->query("insert into reservas(fecha,hora_ingreso,hora_salida,cant_horas,lugar,ID_usuario) values('$fecha','$ingreso','$horaSalida','$horas','$lugar','$id')")or die($conexion-> error);
			
		header('location:../controllers/qr.php');
		
	}	
 ?>