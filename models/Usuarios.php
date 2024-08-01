<?php 

	include'../php/database.php';



class Usuarios extends DataBase{


		//traigo todos los datos de usuarios
		function getAllUsuarios(){
        return getSomething("usuarios");
    	}

    	//inserto en usuarios nuevo usuario
    	function insertarUsuario($array){
         return insertSomething ("usuarios",$array);
    	}


       /* function getUsuarioByID($id){
        return getSomethingByParameter("usuarios","id",$id)[0];
        }

        function getUsuarioByEmail($email){
            return getSomethingByParameter("usuarios","email",$email)[0];
        }*/

		function buscarUsuarioPorId($id){
			$response = $this -> consulta("SELECT * FROM usuarios WHERE ID_usuario = '$id'");
			if ($response -> num_rows>0) {
					return $response -> fetch_all (MYSQLI_ASSOC);
			} else {
				return array('errno' => 404, 'error' => 'usuario no encontrado');
			}
		}

		function buscarUsuarioPorEmail($email){
			$response =  $this -> consulta("SELECT * FROM usuarios WHERE email = '$email'");
			if ($response -> num_rows>0) {
				//return $response -> true;
				return $response -> fetch_all (MYSQLI_ASSOC)[0];
			} else {
				//return false;
				return array('errno' => 404, 'error' => 'email no encontrado');
			}
		}

		function buscarUsuarioPorUsuario($usuario){
			$response =  $this -> consulta("SELECT * FROM usuarios WHERE usuario = '$usuario'");
			if ($response -> num_rows > 0) {
				//return true;
				return $response -> fetch_all (MYSQLI_ASSOC)[0];
			} else {
				//return false;
				return array('errno' => 404, 'error' => 'usuario no encontrado');
			}
		}

		function buscarContrasenia($passVieja,$id){
			$response =  $this -> consulta("SELECT * FROM usuarios WHERE ID_usuario = '$id' AND contrasena='$passvieja'");
			if ($response -> num_rows > 0) {
				//return true;
				return $response -> fetch_all (MYSQLI_ASSOC)[0];
			} else {
				//return false;
				return array('errno' => 404, 'error' => 'la contraseña es incorrecta');
			}
		}


		function buscarCodigo($codigo,$email){
			$response =  $this -> consulta("SELECT * FROM usuarios WHERE email='$email' and codigo='$codigo'");
			if ($response -> num_rows > 0) {
				//return true;
				return $response -> fetch_all (MYSQLI_ASSOC)[0];
			} else {
				//return false;
				return array('errno' => 404, 'error' => 'usuario no encontrado');
			}
		}

		function buscarUsuario($usuario,$contrasena){
			$response =  $this -> consulta("SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'");
			if ($response -> num_rows > 0) {
				//return true;
				//session_start();
				$rows = $response->fetch_all(MYSQLI_ASSOC);
				foreach ($rows as $row) {
					$id=$row['ID_usuario'];
					$nombre=$row['nombre'];
					$apellido=$row['apellido'];
					$fecha=$row['fecha_nac'];
					$email=$row['email'];
					$usuario=$row['usuario'];
					$patente=$row['patente'];
				    session_start();
				    $_SESSION['id'] = $id;
				    $_SESSION['nombre'] = $nombre;
				    $_SESSION['apellido'] = $apellido;
				    $_SESSION['fecha'] = $fecha;
				    $_SESSION['email'] = $email;
				    $_SESSION['usuario'] = $usuario;
				    $_SESSION['patente'] = $patente;
				}
				return array('errno' => 200,'error' => 'usuario encontrado');
			} else {
				//return false;
				return array('errno' => 404,'error' => 'usuario no encontrado');
			}
		}

		/*function insertarUsuario($nombre,$apellido, $fecha_nac, $email,$usuario, $contrasena, $patente){
		("INSERT INTO usuarios (ID_usuario,nombre,apellido,fecha_nac,email,usuario,contrasena,patente) values(NULL','$nombre','$apellido',$fecha_nac','$email','$usuario','$contrasena','$patente')") ;
		}*/

		/*function crearUsuario($data){
		$datos = $_POST;
		("INSERT INTO usuarios (ID_usuario,nombre,apellido,fecha_nac,email,usuario,contrasena,patente) values(NULL',".$datos['nombre']."','".$datos['apellido']."','".$datos['fecha']."','".$datos['email']."','".$datos['usuario']."','".$datos['contrasena']."','".$datos['patente']."')") ;

		}
/*
		function info($chipid, $limit){	
			$response = $this -> consulta("
				SELECT * FROM tiempo 
				INNER JOIN estaciones ON tiempo.chipId = estaciones.chipId 
				WHERE tiempo.chipId = $chipid 
				ORDER BY tiempo.fecha desc limit $limit");
			if ($response -> num_rows>0) {
				return $response -> fetch_all (MYSQLI_ASSOC);
			} else {
				return false;
			}
		}

		function nueva(){
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$datos = $_POST;
				var_dump($datos);
			}
			return $this -> consulta("INSERT INTO estaciones ('chipId','ubicacion','apodo') VALUES ('".$datos['chipId']."','".$datos['ubicacion']."','".$datos['apodo']."')");
		}

		function insertarTiempo($datos){
			if($_SERVER['REQUEST_METHOD']!='POST'){
				return array("error" => "metodo invalido");
			} else {
				if (!$this -> buscar($datos['chipId'])){
					return array("error" => "chipId invalido");
				} else {
					$this -> consulta("INSERT INTO tiempo ('chipId','temperatura','humedad') VALUES ('".$datos['chipId']."','".$datos['temperatura']."','".$datos['humedad']."')");
					return $this -> db -> insert_id;
				}
			}
		}

		function visitas($chipId){
			$this -> consulta("UPDATE estaciones SET visitas = visitas + 1 WHERE chipId = $chipId");
		}*/
 	}
 
 ?>