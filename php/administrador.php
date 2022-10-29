<?php
	
	//c = consulta, v = vista, btn = boton
	function verBloqueadas()
	{
		@\session_start();
		include_once '../consultas/usuario.php';
		$usuarios = todos_usuarios();
		if (empty($usuarios) > 0)
		{
			?>
				<table>
					<caption></caption>
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
	        		for ($i=1; $i<count($usuarios); $i++)
					{
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
												<em  class="material-icons waves-effect waves-dark
												icono-actualizar actualizar_usuario tooltipped"
												data-position="bottom"
												data-tooltip="Actualizar usuario">
												loop
												</em>
												<em class="material-icons
												waves-effect waves-dark icono-eliminar
												borrar_usuario tooltipped" data-position="bottom"
												data-tooltip="Eliminar usuario">delete</em>
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
								<li class="waves-effect waves-dark tooltipped" id="ver_usuarios"
								data-position="bottom" data-tooltip="Ver usuarios">
									<div>
										<em style="color: black;" class="material-icons">remove_red_eye</em>
									</div>
								</li>
								<li class="waves-effect waves-dark tooltipped" id="crear_usuario"
									data-position="bottom" data-tooltip="Crear usuario">
									<div>
										<em style="color: black;" class="material-icons">add</em>
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