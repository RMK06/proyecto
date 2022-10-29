<?php
	@\session_start();
	require_once '../consultas/activos.php';
	require_once '../necesario/estructura.php';
	$controlador = new controlador();
	$controlador->base('interno');
	$controlador->menu();
	?>
		<div class="panel" id="panel" style="padding: 15px;">
			<?php
			
				$activos = allActivos();
				if (count($activos) > 0) {
					?>
						<div class="col s12 no-padding">
							<h5 class="titulo" style="position: relative;">
								<strong>Activos existentes</strong>
								
							</h5>
							<div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
						</div>
						<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
							<table class="striped highlight">
								<caption></caption>
								<thead>
									<tr>
										<th>ID</th>
										<th>Nombre</th>
										<th>Serial</th>
										<th>Placa</th>
										<th>Tipo</th>
										<th>Marca</th>
										<th>precio</th>
										<th>Estado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
										for ($i=0; $i < count($activos) ; $i++) { 
											?>
												<tr class="info">
													<td><?php echo $activos[$i]['id'] ?></td>
													<td><?php echo $activos[$i]['nombre'] ?></td>
													<td><?php echo $activos[$i]['serial'] ?></td>
													<td><?php echo $activos[$i]['placa'] ?></td>
													<td><?php echo $activos[$i]['tipo'] ?></td>
													<td><?php echo $activos[$i]['marca'] ?></td>
													<td><?php echo $activos[$i]['precio'] ?></td>
													<td>
														<?php 
															$estado_por_id = estado_id($activos[$i]['estado']);
															for ($j=0; $j < count($estado_por_id) ; $j++) { 
																echo $estado_por_id[$j]['estado'];
															}
														?>
													</td>
													<td>
														<?php $activos_all = $activos[$i]['id']; ?>
														
															<em class="material-icons borrar_bloqueada  waves-dark  tooltipped icono-eliminar icono-ver-mas" data-id="<?php echo $activos[$i]['id']; ?>" data-position="bottom" data-tooltip="Ver más">open_in_new</em>
														
														<em class="material-icons borrar_bloqueada  waves-dark tooltipped icono-eliminar" data-id="<?php echo $usuarios[$i]['id']; ?>" data-position="bottom" data-tooltip="Editar">loop</em>
														<em class="material-icons borrar_bloqueada  waves-dark tooltipped icono-eliminar" data-id="<?php echo $usuarios[$i]['id']; ?>" data-position="bottom" data-tooltip="Eliminar">delete</em>
													</td>

												</tr>
											<?php
										}
									?>
								</tbody>
							</table>
						</div>
						
					<?php
				} else {
					?>
						<div class="col s12 no-padding">
							<h5 class="titulo" style="position: relative;">
								<strong>No existe ningún activo</strong>
							</h5>
						</div>
					<?php
				}
			?>
		</div>
	<?php
	function v_actualizar_usuario() { 
		?>
			<div id="modal1" class="modal">
				<div class="modal-content">
					<h4>Inventario de Activos</h4>
					<div>
						<?php 
							if (isset($_POST['id'])) {
								$allActicos = activosId($_POST['id']);
								$activos = $allActicos;
							}
						?>
					</div>
					<div class="row">
						<form class="col s12">
							<div class="row">
							
								<div class="input-field col s6">
									<emnput disabled  id="disabled"  value="<?php echo $activos[0]['nombre']?>" type="text" class="validate activar">
									<label for="disabled">Nombre</label>
								</div>
								<div class="input-field col s6">
									<emnput disabled  id="disabled" type="text" value="<?php echo $activos[0]['serial']?>" class="validate activar">
									<label for="disabled">Serial</label>
								</div>
								<div class="input-field col s6">
									<emnput disabled  id="disabled" type="text" value="<?php echo $activos[0]['placa']?>" class="validate activar">
									<label for="disabled">Placa</label>
								</div>
								<div class="input-field col s6">
									<emnput disabled  id="disabled" type="text" value="<?php echo $activos[0]['tipo']?>" class="validate activar">
									<label for="disabled">Tipo</label>
								</div>
								<div class="input-field col s6">
									<emnput disabled  id="disabled" type="text" value="<?php echo $activos[0]['marca']?>" class="validate activar">
									<label for="disabled">Marca</label>
								</div>
								<div class="input-field col s6">
									<?php 
										$precio = $activos[0]['precio'];
										$precioFormato = number_format($precio, 0, '.', '.'); 
									?>
									<emnput disabled  id="disabled" type="text" value="$<?php echo  $precioFormato  ?>" class="validate activar">
									<label for="disabled">Precio</label>
								</div>
								<div class="input-field col s12">
									<emnput disabled  id="disabled" type="text" value="<?php echo $activos[0]['detalles']?>" class="validate activar">
									<label for="disabled">Detalles</label>
								</div>
							</div>
							<div class="col s6">
								<div class="center">
									Estado
								</div>
								<strongr>
								<?php 
									$estadoActivo = estado_id($activos[0]['estado']);
								?>
								<div class='activoUso center container'><?php echo $estadoActivo[0]['estado'] ?></div>
							</div>
							<div class="col s6">
								<div class="center">
									Uso
								</div>
								<strongr>
								<?php 
									if ($activos[0]['estado'] == 1) {
										?>
											<div class='activoUso center container'>Si</div>
										<?php
									}else {
										?>
											<div class='activoUso center container'>No</div>
										<?php
									}
								?>
							</div>
						</form>
  					</div>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
				</div>
			</div>	 			 
		<?php
			exit();
		}

	?>
		<div id="container"></div>
	<?php
	
		if (isset($_POST['metodo'])) {
			if (function_exists($_POST['metodo'])) {
				if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
					?>
						<div class="row">
							<div class="col s12 no-padding subnav-wrapper">
								<ul class="subnav">
									<li class="waves-effect waves-dark tooltippedipped" id="ver_usuarios" data-position="bottom" data-tooltip="Ver usuarios"> 	
										<div>
											<em class="material-icons">remove_red_eye</em>
										</div>
									</li>
									<li  class="waves-effect waves-dark tooltipped" id="crear_usuario" data-position="bottom" data-tooltip="Crear usuario"><div>
										<em class="material-icons" style="color: black;">add</em></div></li> 
									
									<!--<li class="waves-effect waves-dark right"><em class="material-icons">account_circle</em></li>
									<li class="waves-effect waves-dark right"><em class="material-icons">notifications</em></li>-->
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
		
		$controlador->script('interno');
