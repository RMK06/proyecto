<?php
	@\session_start();
	require_once '../consultas/asignar_activo.php';
	require_once '../necesario/estructura.php';
	require_once '../consultas/activos.php';
	$activosSelect = allActivos();
	$controlador = new controlador();
	$controlador->base('interno');
	$controlador->menu();
	?>
		<div class="panel" id="panel" style="padding: 15px;">
			<div class="row">
					
				<div class="col s12 no-padding">
						<h5 class="titulo" style="position: relative;">
							<strong>Activos asignados</strong>
							
						</h5>
						<div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
					</div>
					<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
						<table class="striped highlight centered">
						<caption></caption>
							<thead>
							  <tr>
							      <th>ID</th>
							      <th>Empleado</th>
							      <th>Activo</th>
							      <th>Detalles</th>
							      <th>Fecha Inicio</th>
							      <th>Fecha Fin</th>
							      <th>Acciones</th>
							  </tr>
							</thead>

							<tbody>
								<?php 
									$activos = c_activos_asignados();
									//print_r($activos);
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
											    <td>
													<?php 
														echo $activos[$i]['fecha_inicio'];
													?>
														
													</td>
											    <td>
													<?php 
														$fechao = new DateTime("");
														date_sub($fechao, date_interval_create_from_date_string("0 days"));
														$fechaActual = date_format($fechao,"d");
														$mesActual = date_format($fechao,"m");
														$yearActual = date_format($fechao,"Y");
														$fechafinactivo = $activos[$i]['fecha_fin'];
														$fecha1 = new DateTime($fechafinactivo); //fecha de vencimiento
														date_sub($fecha1, date_interval_create_from_date_string("5 days"));
														//$fechaDia = date_format($fecha1,"d-m-Y"); ejemplo
														$fechaDia = date_format($fecha1,"d");
														$fechaMes = date_format($fecha1,"m");
														$fechaYear = date_format($fecha1,"Y");
														//echo ($mesActual);
														if ($fechaMes == $mesActual &&  $fechaDia < 5) {
															?>
																<div class="activoVen tooltipped" data-tooltip="La fecha de entrega de activo se vence en 5 dias"><?php echo $activos[$i]['fecha_fin']; ?>
																</div>
															<?php
														}
														else {
															echo $activos[$i]['fecha_fin'];
														}
														
														?>
													
												</td>
												<td>
													<div class="agregarMov" data-id="<?php echo $activos[$i]['id']; ?>"></em class="material-icons" >add</em></div>
												</td>
											</tr>
										<?php	
												
									}
										
										
								?>
								
							</tbody>
						</table>
					</div>
			</div>
		</div>
	<!-- Modal Structure -->
	<div id="modal1" class="modal">
		
	<div class="modal-content">
		<h4>Agregar Movimiento</h4><strongr>
		<input hidden  id="idActivo" type="text" class="validate" value="1">
		<div class="input-field col s12">
			<select id="selectMov">
				<option value="" disabled selected>Seleccionar</option>
				<option value="1">Devolucion Activo</option>
				<option value="2">Agregar Detalles</option>
			</select>
			<label>Agregar Movimiento</label>
  		</div>
		<div class="col s12">
			<div class="col s6">
				<div class="col s12">
					<div class="row">
						<div id="devolucion">
							<div>Devolucion</div>
							<strongr>
							<div class="input-field col s6">
								<input  id="mDevolucion" type="text" class="validate">
								<label for="mDevolucion">Motivo Devolucion</label>
							</div>
							<div class="input-field col s6">
								<input  id="MotDetalles" type="text" class="validate">
								<label for="MotDetalles">Detalles</label>
							</div>
							<div class="input-field col s6">
								<select id="estadoAcivo">
									<option value="" disabled selected>[Seleccione]</option>
									<option value="1">Buen estado</option>
									<option value="2">Mantenimiento</option>
									<option value="3">No funciona</option>
								</select>
								<label>Estado del Activo</label>
							</div>
							<div class="col s6" id="cambio">
								<select id="cambioSel">
									<option value="" disabled selected>Cambio de Activo</option>
									<option value="1">Si</option>
									<option value="2">No</option>
								</select>
							</div>
							<div  id="cambioActivo">
								<div class="col s12">
									<select id ="estadoActivo">
										<?php 
											for ($b=0; $b < count($activosSelect) ; $b++) {
												if ($activosSelect[$b]['estado'] == 1 && $activosSelect[$b]['uso'] == 1) {
													?>
														<option value="0">[Seleccione]</option>
														<option value="<?php echo $activosSelect[$b]['id'] ?>"><?php echo $activosSelect[$b]['nombre']; ?></option>
													<?php
												} else {
													echo 'No hay activos para asignar';
												}
											}
										?>
									</select><strongr>
								</div>
								<div class="input-field col s12">
									<textarea id="obActivo" class="materialize-textarea"></textarea>
									<label for="obActivo">Observaciones</label>
								</div>
							</div>
							
						</div>
						<div id="detalles">
							<div>Agregar Detalles</div>
							<strongr>
							<div class="input-field col s6">
								<input  id="motDetalles" type="text" class="validate">
								<label for="motDetalles">Motivo Detalles</label>
							</div>
							<div class="input-field col s6">
								<input  id="detalles" type="text" class="validate">
								<label for="detalles">Detalles</label>
							</div>
							<div class="input-field col s6">
								<select id="detallesAct">
									<option value="" disabled selected>[Seleccione]</option>
									<option value="1">Buen estado</option>
									<option value="2">Mantenimiento</option>
									<option value="3">Cambio de activo</option>
									<option value="4">No funciona</option>
								</select>
								<label>Estado del Activo</label>
							</div>
							<div class="input-field col s6">
								<select id="activoCambio">
									<option value="" disabled selected>[Seleccione]</option>
									<?php 
										
										for ($b=0; $b < count($activosSelect) ; $b++) {
											if ($activosSelect[$b]['estado'] == 1 && $activosSelect[$b]['uso'] == 1) {
												?>
													<option value="1"><?php echo $activosSelect[$b]['nombre']; ?></option>
												<?php
											} else {
												echo 'No hay activos para asignar';
											}
										}
										
									?>
								</select>
								<label>Nuevo activo</label>
							</div>
							<div class="input-field col s12">
									<textarea id="ObsActi" class="materialize-textarea"></textarea>
									<label for="ObsActi">Observaciones</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col s6"></div>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="btn-flat mAgregar">Agregar Movimiento</a>
		<a href="#!" class="modal-close btn-flat">Cerrar</a>
	</div>
	</div>
	<?php
	$controlador->script('interno');
				
?>