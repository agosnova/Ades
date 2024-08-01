<?php 
include "conexion.php";

$eliminado='';

session_start();
$idU = $_SESSION['id'];

	$resultado= $conexion->query("delete from reservas where ID_usuario='$idU' ") or die($conexion->error);

	if ($resultado==1) {
		header('location:../controllers/misreservas.php?eliminado=Tu Reserva se elimino Correctamente.');
	}else{
		header('location:../controllers/misreservas.php?eliminado=No se pudo eliminar la Reserva.');
	}

 ?>