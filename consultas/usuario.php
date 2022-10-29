<?php 
	require_once ('conexion.php');
	if (isset($_POST['metodo'])) {
		$_POST['metodo']();
	} 

	function c_Usuarios() {
		require_once ('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `estado` = 1";
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
			
	function enviar_id($a) {
		require_once ('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `id` = ".$a." ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array,$row);
			}
			return $array;
		}

	}
	
	function recibir_dato($a) {
		return $a;
	}
	
	
	function todos_usuarios() {
		require 'conexion.php';
		$sql = "SELECT * FROM `usuarios` WHERE `acceso` = 1";
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

	function crearUsuarioCorreo()
	{
		include_once('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `correo` = '".$_POST['correo']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array, $row);
			}
			return $array;
		} else {
			return array();
		}
	}

	function crearusuario()
	{
		include_once('conexion.php');
		$sql = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `correo`, `contrasena`, `logueado`)
		VALUES ('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['correo']."',
		'".password_hash($_POST['contrasena'], PASSWORD_DEFAULT)."', '0')";
		$result = $conn->query($sql);
		if ($result === true) {
			$ultimo_id = mysqli_insert_id($conn);
			echo 1;
		} else {
			echo  'error'.mysqli_error($conn);
		}

		$sql2 = "INSERT INTO `permisos` (`id_usuario`, `activos`, `activos_asignados`, `empleados`, `historial`, `reportes`) VALUES ('".$ultimo_id."', '".$_POST['activos']."', '".$_POST['activos_asigandos']."', '".$_POST['empleados']."', '".$_POST['historial']."', '".$_POST['reportes']."')";
		if ($conn->query($sql2) === true) {
			
		} else {
			echo 'No se ha podido crear el cargo ' .mysqli_error($conn);
		}
	}
	function c_un_usuario_id($a) {
		require 'conexion.php';
		$sql5 = "SELECT * FROM `usuarios` WHERE `id` = '".$a."' ";
		$result = $conn->query($sql5);
		if ($result->num_rows > 0) {
			$array = array();
			while($row = $result->fetch_assoc()) {
				array_push($array, $row);
			}
			return $array;
		}
	}
	function datos_actualizar() {
		print_r($_POST);
		require 'conexion.php';
		$sql = "SELECT * FROM `usuarios` WHERE `id` = '".$_POST['id']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array,$row);
			}
			echo $array[0]['nombre'].','.$array[0]['nombre'].','.$array[0]['apellidos'].','.$array[0]['correo'].','.$array[0]['cedula'].','.$array[0]['celular'];

		}
	}
	function v_colaboradores() {
		require 'conexion.php';
		$sql = "SELECT * FROM `usuarios` WHERE `acceso` = 0 " ;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}
			return $array;
		}
	}
	function btn_actualizar_usuarioss() {
		require 'conexion.php';
		$sql = "UPDATE `usuarios` SET ";
	}

	function cargos_id_admin($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `cargos` WHERE `id` = ".$a." ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}
			return $array;
		} else {
			echo 'no hay nada';
			echo $a;
		}
	}

	function todosLosCargos() {
		require 'conexion.php';
		$sql = "SELECT * FROM `cargos` ";
		$result = $conn -> query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}
			return $array;
		}
	}

	function ver_usuarios($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `usuarios` WHERE `id` = $a ";
		$result = $conn -> query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}
			return $array;
		}
	}

	function consultarIfc($a) {
		require 'conexion.php';
		if ($a == '') {
			$sql = "SELECT * from `tipo_identificacion` ";
			$result = $conn -> query($sql);
			if ($result->num_rows > 0) {
				$array = array();
				while($row = $result->fetch_assoc() ) {
					array_push($array, $row);
				}
				return $array;
			}
		}else {
			$sql = "SELECT * from usuarios u INNER JOIN tipo_identificacion t on u.tipo_identificacion = t.id WHERE u.tipo_identificacion = $a ";
			$result = $conn -> query($sql);
			if ($result->num_rows > 0) {
				$array = array();
				while($row = $result->fetch_assoc() ) {
					array_push($array, $row);
				}
				return $array;
			}
		}
	}

	function estadoUsuario($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `estado_empleado` WHERE `id` = $a";
		$result = $conn->query($sql);
		if ($result->num_rows >0) {
			$array = array();
			while ($row = $result -> fetch_assoc() ) {
				array_push($array,$row);
			}
			return $array;
		}
	}

	function tEstados() {
		require 'conexion.php';
		$sql = "SELECT * FROM `estado_empleado` ";
		$result = $conn->query($sql);
		if ($result->num_rows >0) {
			$array = array();
			while ($row = $result -> fetch_assoc() ) {
				array_push($array,$row);
			}
			return $array;
		}
	}

	function permisos_usuario($a) {
		require 'conexion.php';
		$sql = "SELECT * FROM `permisos` WHERE `id_usuario` = $a ";
		$result = $conn->query($sql);
		if ($result->num_rows >0) {
			$array = array();
			while ($row = $result -> fetch_assoc() ) {
				array_push($array,$row);
			}
			return $array;
		}
	}
	
	function agregar_usuario() {
		if (isset($_POST['metodo'])) {
			require 'conexion.php';
			if ($_POST['permisos_especiales'] <> 1) {
				//checket no seleccionado
				$sql = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `correo`, `acceso`,  `tipo_identificacion`, `sexo`, `cedula`, `celular`, `direccion`, `barrio`, `localidad`, `cargo`, `estado`, `logueado`, `foto`) VALUES ('".$_POST['nombre_usuario']."','".$_POST['apellido_usuario']."','".$_POST['correo_usuario']."','1','".$_POST['tipo_identificacion']."','".$_POST['sexo']."','".$_POST['cedula_usuario']."','".$_POST['numero_usuario']."','".$_POST['direccion_usuario']."','".$_POST['barrio_usuario']."','".$_POST['localidad_usuario']."','".$_POST['cargo']."','1','0','0') ";
				if ($conn->query($sql) === true) {
					echo 1;
				} else {
					echo 'No se ha podido crear el cargo ' .mysqli_error($conn);
				}
			}else {
				//checket seleccionado
				$sql1 = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `correo`, `acceso`, `contrasena`, `tipo_identificacion`, `sexo`, `cedula`, `celular`, `direccion`, `barrio`, `localidad`, `cargo`, `estado`, `logueado`, `codigo`, `foto`) VALUES ('".$_POST['nombre_usuario']."','".$_POST['apellido_usuario']."','".$_POST['correo_usuario']."','1','".password_hash($_POST['pass'], PASSWORD_DEFAULT)."','".$_POST['tipo_identificacion']."','".$_POST['sexo']."','".$_POST['cedula_usuario']."','".$_POST['numero_usuario']."','".$_POST['direccion_usuario']."','".$_POST['barrio_usuario']."','".$_POST['localidad_usuario']."','".$_POST['cargo']."','1','0','0','0') ";
				if ($conn->query($sql1) === true) {
					$ultimo_id = mysqli_insert_id($conn);
					$sql3 = "INSERT INTO `permisos`(`id_usuario`, `activos`, `activos_asignados`, `empleados`, `historial`, `reportes`, `pendientes`, `administrador`) VALUES ('".$ultimo_id."','".$_POST['activos']."','".$_POST['activos_asigandos']."','".$_POST['empleados']."','".$_POST['historial']."','".$_POST['reportes']."','".$_POST['Pendientes']."','".$_POST['agregarUsuarios']."') ";
					if ($conn->query($sql3) === true) {
						echo 2;
					}else {
						echo 'No se ha podido crear el permiso ' .mysqli_error($conn);
					}
				} else {
					echo 'No se ha podido crear el cargo ' .mysqli_error($conn);
				}
			}
		}else {
			echo 'no envio nada';
		}

		$conn -> close();
	}

	function eliminar_usuario() {
		require 'conexion.php';
		$sql = "DELETE FROM `permisos` WHERE `id_usuario` = '".$_POST['id_usuario']."' ";
		if ($conn->query($sql) === true) {
			$sql1 = "DELETE FROM `usuarios` WHERE `id` = '".$_POST['id_usuario']."' ";
			if ($conn->query($sql1) === true) {
				echo 1;
			}
		}else {
			echo 'no se puedo eliminar';
		}
	};

	function verUsuarios() {
		require "conexion.php";
		$sql = "SELECT * FROM `usuarios` WHERE `id` = '".$_POST['id']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result -> fetch_assoc() ) {
				array_push($array,$row);
			}
			
		}
		$usuariosJson = json_encode($array);
		echo $usuariosJson;
	}

	function verPermisos() {
		require "conexion.php";
		$sql = "SELECT * FROM `permisos` WHERE `id_usuario` = '".$_POST['id_usuario']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result -> fetch_assoc() ) {
				array_push($array,$row);
			}
			
		}
		$usuariosJson = json_encode($array);
		echo $usuariosJson;
	}

	

	
	
