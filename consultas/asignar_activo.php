<?php

	if (isset($_POST['metodo'])) {
		$_POST['metodo']();
	}

	function asignar_activo() {
		require 'conexion.php';
		$sql = "INSERT INTO `activo_asignado`(`id_empleado`, `id_activo`, `detalles`, `fecha_inicio`, `fecha_fin`, `ubicacion_entrega`, `cantidad`, `fecha_movimiento`) VALUES ('".$_POST['usuario']."','".$_POST['activo']."','".$_POST['observaciones']."','".$_POST['fecha_incio']."','".$_POST['fecha_fin']."','".$_POST['ubicacion']."','".$_POST['cantidad']."', NOW()) ";
		$result = $conn->query($sql);
		//echo $sql;
		if ($result == true) {
			echo 1;
		} else {
			echo 2;
		}
	}

	function c_activos_asignados() {
		require 'conexion.php';
		$sql = "SELECT * FROM `activo_asignado` ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}

	}

	function c_empleado_id_a($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `usuarios` WHERE `id` = $a ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}
	}

	function C_activo_id($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `activos` WHERE `id` = $a ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}	
	}

	function c_todos_empleados() {
		require 'conexion.php';
		$sql = "SELECT * FROM `empleados` ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}		
	}

	function c_todos_activos() {
		require 'conexion.php';
		$sql = "SELECT * FROM `activos` ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}	
	}

	