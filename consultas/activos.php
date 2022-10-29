<?php 

	if (isset($_POST['metodo'])) {
		$_POST['metodo']();
	}

	

	function allActivos() {
		require 'conexion.php';
		$sql = "SELECT * FROM `activos` ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		} 
		$conn->close();
	}

	function activosId($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `activos` WHERE `id` = ".$a." ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		} 
		$conn->close();
	}

	function ver_activos($a){
		if (isset($_POST['id'])) {
			print_r ($_POST);
		}
		require 'conexion.php';
		$sql = "SELECT * FROM `activos` WHERE `id` = ".$a." ";
		echo $sql;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}
	}

	

	function estado_id($a) {//Consultar estado del colaborador por medio del id
		require 'conexion.php';
		$sql = "SELECT * from `estado_activo` WHERE `id` = $a";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}
	}

	function detalle() {
		require 'conexion.php';
		$sql = "SELECT * FROM `activos` WHERE `id` = '".$_POST['id']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array,$row);
			}
			echo $array[0]['nombre'].','.$array[0]['correo'];

		}

		//$conn -> close();
	}

	function agregar_mov() {
		require 'conexion.php';
		print_r($_POST);
	}
