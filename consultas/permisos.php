<?php

    function consultarPermisos($a)
	{
		require_once '../conexion.php';
		$sql = "SELECT * FROM `permisos` WHERE `id_usuario` = '".$a."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array, $row);
			}
			return $array;
		}
	}

