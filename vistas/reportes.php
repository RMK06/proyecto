<?php
	@\session_start();
	require '../consultas/asignar_activo.php';
	require '../necesario/estructura.php';
	$controlador = new controlador();
	$controlador->base('interno');
	$controlador->menu();
	?>
		<div class="panel" id="panel" style="padding: 15px;">
			<div class="col s12 no-padding">
					<h5 class="titulo">
						<b>Reportes</b> <b class="right"><div>
						</div></b>
						
					</h5>
					<div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
				</div>
				<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
					
				</div>
				<div class="row">
			    	<div class="col s12">
						<ul class="tabs">
							<li class="tab col s4"><a href="#test1">Movimientos</a></li>
							<li class="tab col s4"><a class="#test2" href="#test2">Inventario</a></li>
							<li class="tab col s4"><a href="#test3">Colaboradores</a></li>
						</ul>
			    	</div>
				    <div id="test1" class="col s12 center">Movimientos</div>
				    <div id="test2" class="col s12 center">Inventario</div>
				    <div id="test3" class="col s12 center">Colaboradores</div>
			  	</div>
		</div>
	<?php
	$controlador->script('interno');
	function ver_asignar_activo() {
		
			?>
				<div class="col s12 no-padding">
					<h5 class="titulo" style="position: relative;">
						<b>Activos asignados</b>
						
					</h5>
					<div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
				</div>
				<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
					<table class="striped highlight centered">
						<thead>
						  <tr>
						      <th>ID</th>
						      <th>Empleado</th>
						      <th>Activo</th>
						      <th>Detalles</th>
						      <th>Fecha</th>
						  </tr>
						</thead>

						<tbody>
							<?php 
								$activos = c_activos_asignados();
								for ($i=0; $i < count($activos); $i++) { 
									?>
										<tr>
										    <td><?php echo $activos[$i]['id'] ?></td>
										    <td>
										    	<?php 
										    		$empleado_id = c_empleado_id_a($activos[$i]['id_empleado']);
										    		for ($j=0; $j < count($empleado_id) ; $j++) { 
										    			echo $empleado_id[$j]['nombre'];
										    		}
										    	?>
										    </td>
										    <td>
										    	<?php  
										    		$activo_id = C_activo_id($activos[$i]['id_activo']);
										    		for ($j=0; $j < count($activo_id) ; $j++) { 
										    			echo $activo_id[$j]['nombre'];
										    		}
										    	?>
										    </td>
										    <td><?php echo $activos[$i]['detalles'] ?></td>
										    <td><?php echo $activos[$i]['fecha'] ?></td>
										</tr>
									<?php			
								}
							?>
						</tbody>
					</table>
				</div>
				  <!-- Modal Structure -->
				 <div id="modal1" class="modal">
					<div class="modal-content">
						<h4 class="center">Actualizar usuario</h4>
						<div class="input-field col s6">
							<input id="nombre_actualizar" type="email" class="validate">
							<label for="nombre_actualizar">Nombre</label>
						</div>
						<div class="input-field col s6">
							<input id="correo_actualizar" type="email" class="validate">
							<label for="correo_actualizar">Correo electrónico</label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class=" btn-flat blue white-text left" id="actualizar_usuario_btn">Actualizar</a>
						<a href="#!" class="modal-close  btn-flat red white-text">Cerrar</a>
					</div>
				</div>
			<?php
		}
		function asignar_activo() {
			$t_empleados = c_todos_empleados();
			$t_activos = c_todos_activos();
			?>
				<div class="col s12 no-padding">
					<h5 class="titulo" style="position: relative;">
						<b>Asignar Activo</b>
					</h5>
				</div>
				<div class="row">
					<div class="col s4 center">
						<select>
							<option value="" disabled selected>Empleado</option>
								<?php 
									for ($i=0; $i < count($t_empleados); $i++) { 
										if ($t_empleados[$i]['estado'] == 1) {
											?>
												<option><?php echo $t_empleados[$i]['nombre']?> <?php echo $t_empleados[$i]['apellido']?></option>
											<?php
										}
									}
								?>
					    </select>
					</div>
					<div class="col s4 center">
						<select>
							<option value="" disabled selected>Activo</option>
							<?php 
								for ($i=0; $i < count($t_activos) ; $i++) {
									if ($t_activos[$i]['uso'] == 2 && $t_activos[$i]['estado'] == 1 ) {
										?>
											<option><?php echo $t_activos[$i]['nombre']?></option>
										<?php
									}
								}
							?>
					    </select>
					</div>
					<div class="col s4 center">
						<div class="input-field ">
				          <textarea id="textarea1" class="materialize-textarea"></textarea>
				          <label for="textarea1">Detalles</label>
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col s12 center">
						<div class="btn">Asignar</div>
					</div>
				</div>
				<div class="center">* Advertencia: Si el activo se encuentra dañado o en mantenimiento no aparecera en las opciones hasta que cambie el estado del activo en "activos" a "buen estado" de igual manera si el activo ya se encuentra en uso tampoco aparecera en la lista.</div>
			<?php
		}
	

	if (isset($_POST['metodo'])) {
		if (function_exists($_POST['metodo'])) {
			if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
				?>
					<div class="row">
						<div class="col s12 no-padding subnav-wrapper">
							<ul class="subnav">
								<li  class="waves-effect waves-dark tooltipped" id="ver_activos" data-position="bottom" data-tooltip="Ver activos asignados"><div>
									<i class="material-icons" style="color: #95A5A6; margin-left: 15px;">remove_red_eye</i></div>
								</li> 
								<li  class="waves-effect waves-dark tooltipped" id="asignar" data-position="bottom" data-tooltip="asignar activos"><div>
									<i class="material-icons" style="color: #95A5A6;  margin-left: 20px;">add</i></div>
								</li>
								<div class="divider"></div>
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
<?php


	function ver_reportes() {
		date_default_timezone_set('America/Bogota');
		
			?>
				<div class="col s12 no-padding">
					<h5 class="titulo">
						<b>Reportes</b> <b class="right"><div>
						</div></b>
						
					</h5>
					<div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
				</div>
				<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
					
				</div>
				<div class="row">
			    	<div class="col s12">
						<ul class="tabs">
							<li class="tab col s4"><a href="#test1">Movimientos</a></li>
							<li class="tab col s4"><a class="#test2" href="#test2">Inventario</a></li>
							<li class="tab col s4"><a href="#test3">Colaboradores</a></li>
						</ul>
			    	</div>
				    <div id="test1" class="col s12 center">Movimientos</div>
				    <div id="test2" class="col s12 center">Inventario</div>
				    <div id="test3" class="col s12 center">Colaboradores</div>
			  	</div>
			<?php
		}
	

	if (isset($_POST['metodo'])) {
		if (function_exists($_POST['metodo'])) {
			if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
				?>
					<div class="row">
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