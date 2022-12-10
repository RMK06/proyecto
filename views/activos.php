<?php
    require_once 'cabezote.php';
    require_once 'menu.php';
    require_once '../controllers/colaboradoresC.php';
?>
    <title>Colaboradores | INVENTORY CONTROL CO</title>
			<div class="panel" id="panel" style="padding: 15px;">
				<div class="col s12 no-padding">
					<h5 class="titulo" style="position: relative;">
						<b>Colaboradores</b>
					</h5>
					<div class="col s12 center hide-on-large-only subtitulo">
                        <- Deslize hacía los lados para ver todos los datos -
                    </div>
				</div>
						<table class="striped highlight centered">
                            <caption></caption>
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre</th>
									<th>apellido</th>
									<th>Cedula</th>
									<th>Celular</th>
									<th>Correo</th>
									<th>cargo</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                    $colaboradores = ColaboradoresC::allColaboradoresC();
									for ($i=0; $i < count($colaboradores) ; $i++) {
										 
										?>
											<tr>
												<td><?php echo $colaboradores[$i]['id'] ?></td>
												<td><?php echo $colaboradores[$i]['nombre'] ?></td>
												<td><?php echo $colaboradores[$i]['apellidos'] ?></td>
												<td><?php echo $colaboradores[$i]['cedula'] ?></td>
												<td><?php echo $colaboradores[$i]['celular'] ?></td>
												<td><?php echo $colaboradores[$i]['correo'] ?></td>
												<td>
													<?php
														$cargos_id = ColaboradoresC::cargosId($colaboradores[$i]['cargo']);
														for ($j=0; $j < count($cargos_id) ; $j++) {
															echo $cargos_id[$j]['nombre'];
														}
													?>
												</td>
												<td>
													<?php
														if ($colaboradores[$i]['estado'] == 1) {
															?>
																<div class="activo">Activo</div>
															<?php
														} elseif ($colaboradores[$i]['estado'] == 2) {
															?>
																<div class="inactivo">Inactivo</div>
															<?php
														}
													?>
												</td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>
					</div>
				<?php
				
			?>
<?php
    require_once 'footer.php';
?>