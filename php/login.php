<?php  

if (isset($_POST['metodo'])) {
		$_POST['metodo']();
	}
	
	function validar_correo() {
		require_once '../consultas/conexion.php';
		$sql = "SELECT * FROM `usuarios` WHERE `correo` = '".$_POST['correo']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push ($array, $row);
			}if (password_verify($_POST['contrasena'],$array[0]['contrasena'])) {
				@\session_start();
				$_SESSION['id'] = $array[0]['id'];
				$_SESSION['nombre'] = $array[0]['nombre'];
				$_SESSION['apellidos'] = $array[0]['apellidos'];
				$_SESSION['correo'] = $array[0]['correo'];
				echo 1;
			}else {
				echo 2;
			}
		} else {
			echo 3;
		}
	}
	function cerrar() {
		@\session_start();
		session_unset();
		session_destroy(); 
	}
?>