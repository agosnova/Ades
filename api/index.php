<?php
	header("Access-Control-Allow-Origin:*");
	header("Access-Control-Allow-Credentials:true");
	header("Access-Control-Allow-Methods:PUT,POST,DELETE,GET");
	header('Content-Type:Application/json');
	define("URL_BASE","/app-ades/api/index.php/");
	$request = explode("/",str_replace(URL_BASE,"",$_SERVER['REQUEST_URI']));
	$request = array_filter($request);
	if(!count($request)){
		echo json_encode(array("errno" => 404, "error" => "falta el modelo"));
	} else {
		$modelo = ucfirst(strtolower($request[0]));
		if (!file_exists("../models/".$modelo.".php")) {
			echo json_encode(array("errno" => 404, "error" => "el modelo no existe"));
		} else {
			if (!isset($request[1])) {
				echo json_encode(array("errno" => 404, "error" => "falta la funcion"));
			} else {
				include "../models/".$modelo.".php";
				$metodo = $request[1];
				if (!method_exists($modelo, $metodo)) {
					echo json_encode(array("errno" => 404, "error" => "la funcion no existe"));
				} else {
					switch($_SERVER['REQUEST_METHOD']){
						case 'GET':
							if (!isset($request[2])) {
								$obj = new $modelo;
								$response = $obj -> $metodo();
							} else if (!isset($request[3])) {
								$obj = new $modelo;
								$response = $obj -> $metodo($request[2]);
							} else if (!isset($request[4])){
								$obj = new $modelo;
								$response = $obj -> $metodo($request[2],$request[3]);
							}else if(!isset($request[5])){
								$obj = new $modelo;
								$response = $obj -> $metodo($request[2],$request[3],$request[4]);
							}else if(!isset($request[6])){
								$obj = new $modelo;
								$response = $obj -> $metodo($request[2],$request[3],$request[4],$request[5]);
							}else if (!isset($request[7])) {
								$response = $obj -> $metodo($request[2],$request[3],$request[4],$request[5],$request[6]);
							}else if (!isset($request[8])) {
								$response = $obj -> $metodo($request[2],$request[3],$request[4],$request[5],$request[6],$request[7]);
							}else{
								$obj = new $modelo;
								$response = $obj -> $metodo($request[2],$request[3],$request[4],$request[5],$request[6],$request[7],$request[8]);
							}
						break;
						case 'POST':
							$response=array("errno" => 200, "error" => $_POST['nombre']);
							/*$nombre=$_POST['nombre'];
							$apellido=$_POST['apellido'];
							$fecha_nac=$_POST['fecha_nac'];
							$email=$_POST['email'];
							$usuario=$_POST['usuario'];
							$contrasena=$_POST['contrasena'];
							$patente=$_POST['patente'];
							insertarUsuario($nombre,$apellido,$fecha,$email,$usuario,$contrasena,$patente);*/
						break;
					}
					echo json_encode($response);
				}
			}
		}
	}
?>