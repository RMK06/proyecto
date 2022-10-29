<?php
	
	//c = consulta, v = vista, btn = boton
	function v_ver_bloqueadas() {
		@\session_start();
		include_once '../consultas/usuario.php';
		$usuarios = todos_usuarios();
		if (count($usuarios) > 0) {	
			?>
				<table>
	        		<thead>
	          			<tr>
	              			<th>ID</th>
							<th>Nombre</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Acciones</th>
	         			 </tr>
	        		</thead>

	        <tbody>
	        	<?php 
	        		for ($i=1; $i < count($usuarios); $i++) { 
	        			?>
	        				<tr>
	        					<td><?php echo $usuarios[$i]['id'] ?></td>
	        					<td><?php echo $usuarios[$i]['nombre'] ?></td>
	        					<td><?php echo $usuarios[$i]['usuario'] ?></td>
	        					<td><?php echo $usuarios[$i]['correo'] ?></td>
	        					<td>
	        						<?php
										if ($usuarios[$i]['id'] != 1 && $usuarios[$i]['id'] != 0) {
											?>
												<i  class="material-icons waves-effect waves-dark icono-actualizar actualizar_usuario tooltipped" data-position="bottom" data-tooltip="Actualizar usuario">loop</i>
												<i class="material-icons waves-effect waves-dark icono-eliminar borrar_usuario tooltipped" data-position="bottom" data-tooltip="Eliminar usuario">delete</i>
											<?php 
										}
									?>
	            				</tr>	
	        			<?php
	        		}
	        	?>
	        </tbody>
	      </table>
			<?php
		}
		
	}
	
	if (isset($_POST['metodo'])) {
		if (function_exists($_POST['metodo'])) {
			if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
				?>
					<div class="row">
						<div class="col s12 no-padding subnav-wrapper">
							<ul class="subnav">
								<li class="waves-effect waves-dark tooltipped" id="ver_usuarios" data-position="bottom" data-tooltip="Ver usuarios">
									<div>
										<i style="color: black;" class="material-icons">remove_red_eye</i>
									</div>
								</li>
								<li class="waves-effect waves-dark tooltipped" id="crear_usuario" data-position="bottom" data-tooltip="Crear usuario">
									<div>
										<i style="color: black;" class="material-icons">add</i>
									</div>
								</li>
								
							</ul>
						</div>
						<?php
							$_POST['metodo']();
						?>
					</div>
				<?php
			} else {
				$_POST['metodo']();
			}
		} else {
			echo 0;
		}
	}
?>