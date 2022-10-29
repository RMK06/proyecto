<?php
	require_once ('conexion.php');
	$mensajeError = 'No se ha podido crear el cargo ';

	if (isset($_POST['metodo'])) {
		$_POST['metodo']();
	}

	function cUsuarios()
	{
		require_once ('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `estado` = 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array,$row);
			}
			return $array;
		}else {
			return array();
		}
	}
			
	function enviarid($a)
	{
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
	
	function recibirdato($a)
	{
		return $a;
	}
	
	
	function todosusuarios()
	{
		require_once ('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `acceso` = 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array,$row);
			}
			return $array;
		}else {
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
			mysqli_insert_id($conn);
			echo 1;
		} else {
			echo  'error'.mysqli_error($conn);
		}

		$sql2 = "INSERT INTO `permisos` (`id_usuario`, `activos`, `activos_asignados`, `empleados`, `historial`, `reportes`)
		VALUES ('".$ultimo_id."', '".$_POST['activos']."', '".$_POST['activos_asigandos']."', '".$_POST['empleados']."',
		'".$_POST['historial']."', '".$_POST['reportes']."')";
		if ($conn->query($sql2) === true) {
			echo 1;
		} else {
			echo $mensajeError .mysqli_error($conn);
		}
	}
	function unusuarioid($a)
	{
		$tabla = `usuarios`;
		include_once('conexion.php');
		$sql5 = "SELECT * FROM $tabla WHERE `id` = '".$a."' ";
		$result = $conn->query($sql5);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc()) {
				array_push($array, $row);
			}
			return $array;
		}
	}
	function datosactualizar()
	{
		print_r($_POST);
		include_once('conexion.php');
		$sql = "SELECT * FROM `usuarios` WHERE `id` = '".$_POST['id']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result->fetch_assoc() ) {
				array_push($array,$row);
			}
			echo $array[0]['nombre'].','.$array[0]['nombre'].','.$array[0]['apellidos'].','.$array[0]['correo'].',
			'.$array[0]['cedula'].','.$array[0]['celular'];

		}
	}
	function colaboradores()
	{
		include_once('conexion.php');
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

	function cargosIdAdmin($a)
	{
		include_once('conexion.php');
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

	function todosLosCargos()
	{
		include_once('conexion.php');
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

	function verUsuarios($a)
	{
		include_once('conexion.php');
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

	function consultarIfc($a)
	{
		include_once('conexion.php');
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
			$sql = "SELECT * from usuarios u INNER JOIN tipo_identificacion t on u.tipo_identificacion = t.id
			WHERE u.tipo_identificacion = $a ";
			$result = $conn -> query($sql);
			if ($result->num_rows > 0) {
				$array = array();
				while ($row = $result->fetch_assoc() ) {
					array_push($array, $row);
				}
				return $array;
			}
		}
	}

	function estadoUsuario($a) {
		include_once('conexion.php');
		$sql = "SELECT * FROM `estado_empleado` WHERE `id` = $a";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$array = array();
			while ($row = $result -> fetch_assoc() ) {
				array_push($array, $row);
			}
			return $array;
		}
	}

	function tEstados()
	{
		include_once('conexion.php');
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

	function permisosusuario($a)
	{
		include_once('conexion.php');
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
	
	function agregarUsuario()
	{
		if (isset($_POST['metodo'])) {
			include_once('conexion.php');
			if ($_POST['permisos_especiales'] <> 1) {
				//checket no seleccionado
				$sql = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `correo`, `acceso`,
				  `tipo_identificacion`, `sexo`, `cedula`, `celular`, `direccion`, `barrio`, `localidad`,
				   `cargo`, `estado`, `logueado`, `foto`) VALUES ('".$_POST['nombre_usuario']."','".$_POST['apellido_usuario']."','".$_POST['correo_usuario']."','1',
				   '".$_POST['tipo_identificacion']."','".$_POST['sexo']."','".$_POST['cedula_usuario']."',
				   '".$_POST['numero_usuario']."','".$_POST['direccion_usuario']."',
				   '".$_POST['barrio_usuario']."','".$_POST['localidad_usuario']."',
				   '".$_POST['cargo']."','1','0','0') ";
				else if ($conn->query($sql) === true) {
					echo 1;
				} else {
					echo $mensajeError .mysqli_error($conn);
				}
			}else {
				//checket seleccionado
				$sql1 = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `correo`, `acceso`, `contrasena`,`tipo_identificacion`,
				`sexo`, `cedula`, `celular`, `direccion`, `barrio`, `localidad`, `cargo`, `estado`, `logueado`, `codigo`, `foto`)
				VALUES ('".$_POST['nombre_usuario']."','".$_POST['apellido_usuario']."','".$_POST['correo_usuario']."','1',
				'".password_hash($_POST['pass'], PASSWORD_DEFAULT)."','".$_POST['tipo_identificacion']."','".$_POST['sexo']."',
				'".$_POST['cedula_usuario']."','".$_POST['numero_usuario']."','".$_POST['direccion_usuario']."',
				'".$_POST['barrio_usuario']."','".$_POST['localidad_usuario']."','".$_POST['cargo']."','1','0','0','0') ";
				if ($conn->query($sql1) === true) {
					$ultimo_id = mysqli_insert_id($conn);
					$sql3 = "INSERT INTO `permisos`(`id_usuario`, `activos`, `activos_asignados`, `empleados`, `historial`, `reportes`, `pendientes`, `administrador`) VALUES ('".$ultimo_id."','".$_POST['activos']."','".$_POST['activos_asigandos']."','".$_POST['empleados']."','".$_POST['historial']."','".$_POST['reportes']."','".$_POST['Pendientes']."','".$_POST['agregarUsuarios']."') ";
					if ($conn->query($sql3) === true) {
						echo 2;
					}else {
						echo 'No se ha podido crear el permiso ' .mysqli_error($conn);
					}
				} else {
					echo $mensajeError .mysqli_error($conn);
				}
			}
		}else {
			echo 'no envio nada';
		}

		$conn -> close();
	}

	function eliminarusuario()
	{
		require_once('conexion.php');
		$sql = "DELETE FROM `permisos` WHERE `id_usuario` = '".$_POST['id_usuario']."' ";
		if ($conn->query($sql) === true) {
			$sql1 = "DELETE FROM `usuarios` WHERE `id` = '".$_POST['id_usuario']."' ";
			if ($conn->query($sql1) === true) {
				echo 1;
			}
		}else {
			echo 'no se puedo eliminar';
		}
	}

	function verUsuarios()
	{
		require_once('conexion.php');
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

	function verPermisos()
	{
		include_once('conexion.php');
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

	

	
	
