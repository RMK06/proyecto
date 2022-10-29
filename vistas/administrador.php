<?php
	@\session_start();
	require_once '../necesario/estructura.php';
	require_once '../consultas/usuario.php';
	
	$controlador = new controlador();
	$usuarios = todos_usuarios();
	$controlador->base('interno');
	$controlador->menu();
	$active = 1;
	?>
		<title>Administrador | Inventory Control Co</title>
	<?php
	if (!empty($usuarios) > 0) {
		?>

			<div class="panel" id="panel" style="padding: 15px;">
				<div class="col s12 no-padding">
					<h5 class="titulo" style="position: relative;">
						<strong>Usuarios existentes</strong>
						<em class="fa-solid fa-circle-plus"></em>

					</h5>
					<div class="col s12 center hide-on-large-only subtitulo">
						<- Deslize hacía los lados para ver todos los datos ->
					</div>
				</div>
				<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
					<table class="striped highlight">
						<caption></caption>
						<thead>
							<tr>
								<th class="center">Nombre</th>
								<th class="center">apellido</th>
								<th class="center">Correo</th>
								<th class="center">Cargo</th>
								<th class="center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i=1; $i<count($usuarios); $i++)
								{
									?>
										<tr class="data-table" data-id="<?php echo $usuarios[$i]['id']; ?>">
											<td class="center"><?php echo $usuarios[$i]['nombre'] ?></td>
											<td class="center"><?php echo $usuarios[$i]['apellidos'] ?></td>
											<td class="center"><?php echo $usuarios[$i]['correo'] ?></td>
											
											<td class="center">
												<?php
													$id_cargo_a = cargos_id_admin($usuarios[$i]['cargo']);
													for ($j=0; $j<count($id_cargo_a); $j++)
													{
														echo $id_cargo_a[$j]['nombre'];
													}
												?>
											</td>
											<td class="center">
												<a href="actualizar_usuario.php?active=<?php echo $active; ?>
												&id=<?php echo $usuarios[$i]['id']; ?>">
												<em style="font-size: 25px; font-weight: 500;"
												class="icon-ro material-icons actualizar_usuario"
												data-id="<?php echo $usuarios[$i]['id']; ?>">loop</em></a>
												<em style="font-size: 25px; font-weight: 500;"
												class="icon-ro material-icons eliminar_usuario"
												data-id="<?php echo $usuarios[$i]['id']; ?>">delete</em>
											</td>
										</tr>
									<?php
								}
								
							?>
						</tbody>
					</table>
				</div>
			</div>
		<?php
		//modal
		?>
			<!-- Modal Structure -->
			<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Informacion Usuario</h4>
				<br>
				<div class="row">
					<div class="col s12">
						<div class="col s11">
							<div class="input-field col s6">
								<input disabled value=" " class="nombre" id="disabled" type="text" class="validate">
								<label for="disabled">Nombres</label>
							</div>
							<div class="input-field col s6">
								<input disabled value=" " class="apellidos" id="disabled" type="text" class="validate">
								<label for="disabled">Apellidos</label>
							</div>
							<div class="input-field col s11">
								<input disabled value=" " id="telefono" type="text" class="validate">
								<label for="disabled">Numero de telefono</label>
							</div>
							<div class="input-field col s3">
								<input disabled value=" " id="disabled" type="text" class="validate">
								<label for="disabled">Tipo de documetno</label>
							</div>
							<div class="input-field col s6">
								<input disabled value="I am not editable" id="disabled" type="text" class="validate">
								<label for="disabled">Disabled</label>
							</div>
							<div class="input-field col s3">
								<input disabled value="I am not editable" id="disabled" type="text" class="validate">
								<label for="disabled">Disabled</label>
							</div>
						</div>
						<div class="col s1">
							<img class="foto_usuario" src="../almacenamiento/fotos_usuarios/usuario.png" alt="">
						</div>
						<div class="col s12">
							<div class="input-field col s12">
								<input disabled value="I am not editable" id="disabled" type="text" class="validate">
								<label for="disabled">Disabled</label>
							</div>
							<div class="input-field col s3">
								<input disabled value="I am not editable" id="disabled" type="text" class="validate">
								<label for="disabled">Disabled</label>
							</div>
							<div class="input-field col s6">
								<input disabled value="I am not editable" id="disabled" type="text" class="validate">
								<label for="disabled">Disabled</label>
							</div>
							<div class="input-field col s3">
								<input disabled value="I am not editable" id="disabled" type="text" class="validate">
								<label for="disabled">Disabled</label>
							</div>
						</div>
						<div class="col s12">
							<div>Permisos</div>
							<div class="col s4">
								<label>
									<input id="Activos" type="checkbox" checked="checked" disabled="disabled" />
									<span>Activos</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input id="Asignados" type="checkbox" checked="checked" disabled="disabled" />
									<span>Activos Asignados</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input id="Colaboradores" type="checkbox" checked="checked" disabled="disabled" />
									<span>Colaboradores</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input id="Historial" type="checkbox" checked="checked" disabled="disabled" />
									<span>Historial</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input id="Administrador" type="checkbox" checked="checked" disabled="disabled" />
									<span>Administrador</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input id="Reportes" type="checkbox" checked="checked" disabled="disabled" />
									<span>Reportes</span>
								</label>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
				
			</div>
			</div>
		<?php
		$controlador->script('interno');
	}



	