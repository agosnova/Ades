<?php

    include 'credenciales.php';

    class DataBase
    {

        public $db;

        public function conectar(){
            $this -> db = new mysqli(HOST,USER,PASS,DB);
            if ($this -> db -> connect_error) {
                echo "sitio no disponible";
            }
        }

        public function consulta($sql){
            $this -> conectar();
            $result= $this -> db -> query($sql);
            if ($this -> db ->errno1=0) {
                echo "error".$conexion->error;
            }
            $this -> db -> close();
            return $result;
        }
    }


/*
		function getSomething(string $tableName){
        $query = 'SELECT * FROM '.$tableName;
        $response = selectQuery($query);
        return $response;
   		}

   		function selectQuery($selectQuery){
        $db = conectar();
        $result =  $db->query($selectQuery);
        if(!isset($result -> num_rows)){
            return false;
        }else{
            if($result -> num_rows>0){
                while ($buffer = $result->fetch_array(MYSQLI_ASSOC)) {
                    $resultArray[] = $buffer;
                }
                return $resultArray;
            }else{
                return null;
            }
        }
    	}

        function getSomethingByParameter(string $tableName, string $paramName, $param) {
        $query = 'SELECT * FROM '.$tableName.' WHERE '.$paramName.' = "'.$param.'"';
        $response = selectQuery($query);
        return $response;
        }*/


    	function insertQuery($insertQuery){
        $db = conectar();
        $result = $db -> query($insertQuery);
        if(!$result){
            return "Error: ".$db -> error;
        }else{
            return true;
        }
  		}

  		function insertSomething(string $table, $data){
        $dataKeys = array_keys($data);
        $insertQuery = "INSERT INTO ".$table."(";
        for($i=0; $i < sizeof($data); $i++){
            $insertQuery.=$dataKeys[$i].",";
        }
        $insertQuery=trim($insertQuery,',');
        $insertQuery.=") VALUES (";
        for($i=0; $i < sizeof($data); $i++){
            $insertQuery.="'".$data[$dataKeys[$i]]."',";
        }
        $insertQuery=trim($insertQuery,',');
        $insertQuery.=")";
        $response = insertQuery($insertQuery);
        return $response;
    }
    ?>
