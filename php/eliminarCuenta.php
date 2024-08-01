<?php 
include "conexion.php";

$eliminado='';

session_start();
$idU = $_SESSION['id'];

	$resultado= $conexion->query("delete from usuarios where ID_usuario='$idU' ") or die($conexion->error);

	if ($resultado==1) {
		header('location:../index.html?eliminado=Cuenta Eliminada Con Éxito.');
	}/*else{
		header('location:../controllers/misreservas.php?eliminado=No se pudo eliminar la Reserva.');
	}*/

 ?>