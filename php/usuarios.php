<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	require_once '../consultas/usuario.php';
	//include '../consultas/permisos_usuarios.php';
	//c = consulta, v = vista, btn = boton, a = automático
		
	function btn_iniciar_sesion() {
		$usuario = c_un_usuario_correo();
		if (count($usuario) > 0) {
			
				
					if (password_verify($_POST['contrasena'], $usuario[0]['contrasena'])) {
						@\session_start();
						$_SESSION['id'] = $usuario[0]['id'];
						$_SESSION['usuario'] = $usuario[0]['usuario'];
						$_SESSION['nombre'] = $usuario[0]['nombre'];
						$_SESSION['correo'] = $usuario[0]['correo'];
						$_SESSION['logueado'] = 1;
						
						echo 1;
					} else {
						echo 'Contraseña incorrecta';
					}
			
			
		} else {
			echo 'No existe un usuario con ese correo';
		}
	}
	function btn_salir() {
		@\session_start();
		$id = $_SESSION['id'];
		if (closeir($dir_handle) && session_destroy()) {;
			echo 1;
		} else {
			echo 'Ocurrió un problema al intentar cerrar sesión, intentelo nuevamente';
		}
		
	}

	if (isset($_POST['metodo'])) {
		if (function_exists($_POST['metodo'])) {
			if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
				?>
					<?php
						$_POST['metodo']();
					?>
				<?php
			} else {
				$_POST['metodo']();
			}
		} else {
			echo 0;
		}
	}
?>