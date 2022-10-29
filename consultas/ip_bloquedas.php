<?php 
function c_buscar_id(){
	include_once "conexion.php";
	$sql="SELECT * FROM `ip_bloqueda`";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return 1;
	}else{
		return 0;
	}
}
?>