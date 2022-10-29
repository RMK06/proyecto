<?php 

function c_login(){
	require_once ('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `loguedado`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array,$row);
			}
			return $array;
		}else{
			return array();
		}
}

?>