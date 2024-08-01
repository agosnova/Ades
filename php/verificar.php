<?php 
//include "../controllers/conexion.php";
include 'register.php';

$email=$_POST['email'];
$codigo=$_POST['codigo'];
$mensaje2="";
$mensaje4="";
$resultado="";

if (isset($_POST['btn-verificar'])) {
	if ($_POST['codigo'] == '') {
		header('location:../controllers/confirmarcuenta.php?email='.$_POST['email'].'&mensaje2=ingrese el código');
	}else{
		$resultado= $conexion->query("select * from usuarios where email='$email' and codigo='$codigo' ") or die($conexion->error);
	if (mysqli_num_rows($resultado) > 0){
		$conexion->query("update usuarios set confirmado='si' where email='$email' ");
		header('location:../controllers/logueo.php?mensaje4=¡Te has registrado correctamente!');
	}else{
		header('location:../controllers/confirmarcuenta.php?email='.$_POST['email'].'&mensaje2=código incorrecto');
	}
	}
}

 ?>