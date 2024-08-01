<?php 

	include '../php/database.php';

		//traigo todos los datos de reservas
		function getAllReservas(){
        return getSomething("reservas");
    	}

    	//inserto en reservas nueva reserva
    	function insertReserva($array){
        return insertSomething ("reservas",$array);
    	}

		function listarReservas(){
			return $this -> consulta("SELECT * FROM reservas") -> fetch_all(MYSQLI_ASSOC);
		}

		/*function mostrarOcupados($fecha,$ingreso,$horas){
			//separa la hora en partes
			$parteFecha = explode(":",$ingreso);
			//resultado final
			$salida = ($parteFecha[0] + $horas).":".$parteFecha[1];

			return $this -> consulta("SELECT lugar FROM reservas WHERE fecha = '$fecha' AND hora_ingreso >= '$ingreso' AND hora_salida <= '$salida'  ") -> fetch_all(MYSQLI_ASSOC);
		}*/

		function crearReserva($fecha,$ingreso, $horas, $lugar){
		("INSERT INTO usuarios (ID_reserva,fecha,hora_ingreso,cant_horas,lugar) values(NULL','$fecha','$ingreso',$horas','$lugar')") ;
		}

		/*function eliminarReserva($idUsuario){
			return $this -> consulta("DELETE * FROM reservas where ID_usuario=$idUsuario")-> fetch_all(MYSQLI_ASSOC); ;
		}*/


 ?>