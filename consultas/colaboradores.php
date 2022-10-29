<?php

	function todosColaboradores()
	{
		require_once('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `acceso` = 0 ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			} return $array;
		}
		$conn->close();
	}

	function tColaboradores()
	{
		require_once('conexion.php');
		$sql = "SELECT * FROM `usuarios` ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc())
			{
				array_push($array, $row);
			} return $array;
		}
		$conn->close();
	}

	function cargoporid($a)
	{
		require_once('conexion.php');
		$sql = "SELECT * FROM `cargos` WHERE `id` = $a ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}return $array;
		}
	}

	function usuarioId()
	{
		echo 123;
	}
