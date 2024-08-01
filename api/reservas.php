<?php  
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
include '../models/Reservas.php';
$body = array();

switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		if(!isset($_GET['action'])){
                $body = array("errno" =>400, "error" => "action no declarada para el metodo GET");
        }else if($_GET['action']==""){
                $body = array("errno" =>400, "error" => "action no tiene ningun valor");
        }else{
        	switch ($_GET['action']){
        		case 'traerReservas':
        			$funcion=getAllReservas();
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
		if(!isset($_POST['action'])){
                $body = array("errno" =>400, "error" => "action no declarada para el metodo POST");
        }else if($_POST['action']==""){
                $body = array("errno" =>400, "error" => "action no tiene ningun valor");
        }else{
        	switch ($_POST['action']) {
                        case 'insertarReserva':
                        $data_reservas = array(
                            "fecha" => "",
                            "hora_ingreso" => "",
                            //"hora_salida" => "",
                            "cant_horas" => "",
                            "lugar" => ""
                            //"ID_usuario" => ""
                        );
                                foreach($data_usuarios as $key => $value){
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
                        }
                        $insertarUsuario = insertarUsuario($data_usuarios);
                        if($insertarUsuario===TRUE){
                            $body=array("errno"=>200,"error"=>"usuario registrado exitosamente");
                        } else {
                            $body=array("errno"=>400,"error"=>$insertarUsuario);
                        }
                                break;
                        
                        default:
                                $body = array("errno" =>400, "error" => "action no valida");
                                break;
                }
        }

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
echo json_encode($body);} 
 ?>