<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
include '../models/Usuarios.php';

$body = array();
$nuevo_usuario = new insertarUsuario();

switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		if(!isset($_GET['action'])){
                $body = array("errno" =>400, "error" => "action no declarada para el metodo GET");
        }else if($_GET['action']==""){
                $body = array("errno" =>400, "error" => "action no tiene ningun valor");
        }else{
        	switch ($_GET['action']){
        		case 'traerUsuarios':    
                    $funcion = getAllUsuarios();
        			if ($funcion == null) {
        				$body=array();
        			}else{
        				$body=$funcion;
        			}
        			break;
        		
        		default:
        			 $body = array("errno" =>400, "error" => "action no valida");
        			break;
        	}
        }
	break;
	case 'POST':
		/*if(!isset($_POST['action'])){
                $body = array("errno" =>400, "error" => "action no declarada para el metodo POST");
        }else if($_POST['action']==""){
                $body = array("errno" =>400, "error" => "action no tiene ningun valor");
        }else{
        	switch ($_POST['action']) {
        		case 'insertarUsuario':*/
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $fecha_nac = $_POST['fecha_nac'];
                $email = $_POST['email'];
                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $patente = $_POST['patente'];

        				$data_usuarios = array(
                            "nombre" => "",
                            "apellido" => "",
                            "fecha_nac" => "",
                            "email" => "",
                            "usuario" => "",
                            "contrasena" => "",
                            "patente" => ""
                        );
                         $body = array("errno" => 200, "mensaje" => $data_usuarios['nombre']);
                        if ($nuevo_usuario -> insertarUsuario($data_usuarios)) {
                            $body = array("errno" => 200, "mensaje" => 'INSERTADO CORRECTAMENTE');
                        } else {
                            $body = array("errno" => 400, "mensaje" => 'ERROR');
                        }
        			/*foreach($data_usuarios as $key => $value){
                            if(!isset($_POST[$key])){
                                $body = array("errno" => 400, "error" => $key." no definido para insertUsuarios");
                                break;
                            } else if ($_POST[$key]==""){
                                    $body = array("errno" => 400, "error" => $key." no tiene ningun valor");
                                     break;
                            } else {
                                $data_usuarios[$key] = $_POST[$key];
                            }
                        }
                        if (isset($body["errno"])) {
                            if($body["errno"]==400){
                                break;
                            }
                        }*/
                        /*if (getUsuarioByEmail($data_usuarios['email'])) {
                           $body= array('errno' => 404, 'error' => 'email en uso');
                           break;
                           }*/
                       /* $insertarUsuario = insertarUsuario($data_usuarios);
                        if($insertarUsuario===TRUE){
                            $body=array("errno"=>200,"error"=>"usuario registrado exitosamente");
                            //header('location:../controllers/confirmarcuenta.php');
                        } else {
                            $body=array("errno"=>400,"error"=>$insertarUsuario);
                        }*/
        			break;

	case 'PUT':
		parse_str(file_get_contents('php://input'),$_PUT);
		$body = array("errno" =>200, "error" => "ingresaste por PUT");
	break;
	case 'DELETE':
		parse_str(file_get_contents('php://input'),$_DELETE);
		$body = array("errno" =>200, "error" => "ingresaste por DELETE");
	break;
	default :
		$body = array("errno" =>400, "error" => "metodo no valido");
	break;
}	

echo json_encode($body);

 ?>
