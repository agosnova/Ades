<?php 
include "conexion.php";

//$mensaje3="";

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
//$resultado= "";

/*if (isset($_POST['btn-login'])){
if ($_POST['usuario']=="" or $_POST['contrasena']=="") {
	header('location:../controllers/logueo.php?mensaje3=Datos incompletos');
}else{
	$resultado= $conexion->query("select * from usuarios where usuario='$usuario' and contrasena='$contrasena' and confirmado='si' ") or die($conexion->error);*/
	

	$resultado= $conexion->query("select * from usuarios where usuario='$usuario' and contrasena='$contrasena' and confirmado='si'") or die($conexion->error);
	$rows = $resultado->fetch_all(MYSQLI_ASSOC);
	session_start();
	$_SESSION['id']= $rows[0]['ID_usuario'];
	$_SESSION['nombre']= $rows[0]['nombre'];
	$_SESSION['apellido']= $rows[0]['apellido'];
	$_SESSION['fecha']= $rows[0]['fecha_nac'];
	$_SESSION['email']= $rows[0]['email'];
	$_SESSION['usuario']= $rows[0]['usuario'];
	$_SESSION['contrasena']= $rows[0]['contrasena'];
	$_SESSION['patente']= $rows[0]['patente'];
	//header('location:../controllers/principal.php');

	/*if (mysqli_num_rows($resultado) > 0) {
		header('location:../controllers/principal.php');
	}else{
		header('location:../controllers/logueo.php?mensaje3=usuario y/o contraseña incorrectos');
	}
	}
}*/

	/*$mensaje3='';
	$mesnaje6='';
	$conexion;
	// si el metodo no es post lo volvemos al index
	if($_SERVER['REQUEST_METHOD']!='POST'){

		header('Location: ../controllers/logueo.php');		

	}else{ // El metodo es post lo mandamos al panel.html
		$usuario= $_POST['usuario'];
		$contrasena= sha1($_POST['contrasena']);

		$resultado= $conexion->query("select * from usuarios where usuario='$usuario' and contrasena='$contrasena'") or die($conexion->error);
	//and confirmado='si'
		if (mysqli_num_rows($resultado) > 0) {
		header('location:../controllers/principal.php');
		}else{
			header('location:../controllers/logueo.php?mensaje3=usuario y/o contraseña incorrectos');
		}
	}	*/
 ?>