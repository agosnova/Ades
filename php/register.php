<?php 
include 'conexion.php';

	$mensaje='';
	$mesnaje6='';
	$conexion;
	// si el metodo no es post lo volvemos al index
	if($_SERVER['REQUEST_METHOD']!='POST'){

		header('Location: ../controllers/logueo.php');		

	}else{ // El metodo es post lo mandamos al panel.html
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$fecha= $_POST['fecha'];
		$email= $_POST['email'];
		$usuario= $_POST['usuario'];
		$contrasena= $_POST['contrasena'];
		$patente= $_POST['patente'];
		
		//mandamos el email
		include "email.php";
		if ($enviado){
		$conexion->query("insert into usuarios(nombre,apellido,fecha_nac,email,usuario,contrasena,patente,confirmado,codigo) values('$nombre','$apellido','$fecha','$email','$usuario','$contrasena','$patente','no','$codigo')")or die($conexion-> error);

		//header('Location: ../controllers/logueo.php?$mensaje="usuario egistrado con exito"');
		header('location:../controllers/confirmarcuenta.php?email='.$email.'&mensaje6=Revisa tu email con el código que te enviamos');
		}else{
			$mensaje="no se pudo enviar el email";
		}
	}	

 ?>
	
