<?php 
include "credenciales.php";

$conexion=new mysqli(HOST,USER,PASS,DB);
	if($conexion-> connect_error){
		die("no se puedo conectar al servidor");
	}

 ?>
