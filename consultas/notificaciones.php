<?php 
	require_once ('conexion.php');
	if (isset($_POST['metodo'])) {
		$_POST['metodo']();
	} 

	function all_notificaciones() {
		require_once ('conexion.php');
		$sql = "SELECT * FROM `notificaciones` ";
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

    function contarNotificaciones() {
        require_once ('conexion.php');
        $sql = "SELECT COUNT(*) FROM `notificaciones`";
        $result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array,$row);
			}
			return $array;
		}
    }
			
	

	

	
	
