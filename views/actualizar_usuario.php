<title>Actualizar Ususarios | INVENTORY CONTROL CO</title>
<?php
    @\session_start();
    if (isset($_SESSION['id'])) {
        require_once 'cabezote.php';
       	require_once 'menu.php';
        require_once '../controllers/administradorC.php';
        $usuario = AdministradotC::buscarId($_GET['id']);
        ?>
			<div class="panel" id="panel" style="padding: 15px;">
				<div class="row">
					<div class="col s12 edi_usuario">Editar usuario --> <?php echo $usuario[0]['nombre'] ?></div>
					<br>
					<div class="col s12">
						<br/>
						<div class="col s10">
							<form enctype="multipart/form-data">
								<div class="input-field col s6">
									<input id="nombre_usuario" type="text" class="validate" value="<?php echo $usuario[0]['nombre']; ?>">
									<label class="active" for="nombre_usuario">Nombres</label>
								</div>
								<div class="input-field col s6">
									<input id="apellido_usuario" type="text" class="validate" value="<?php echo $usuario[0]['apellidos']; ?>">
									<label class="active" for="apellido_usuario">Apellido</label>
								</div>
								<div class="input-field col s12">
									<input id="numero_usuario" type="text" class="validate" value="<?php echo $usuario[0]['celular']; ?>">
									<label class="active" for="numero_usuario">Numero de telefono</label>
								</div>

								<div class="input-field col s3">
									<?php
					
										if ($usuario[0]['tipo_identificacion'] == 1) {
											$tipoDocumento = 'Cedula Ciudadana';
										}elseif ($usuario[0]['tipo_identificacion'] == 2) {
											$tipoDocumento = 'Pep';
										}elseif ($usuario[0]['tipo_identificacion'] == 3) {
											$tipoDocumento = 'Pasaporte';
										}elseif ($usuario[0]['tipo_identificacion'] == 4) {
											$tipoDocumento = 'Registro Civil';
										}
									?>
									<select id="tipoDocumento">
										<option value="<?php echo $usuario[0]['tipo_identificacion'] ?>"
											><?php echo $tipoDocumento ?>
										</option>
										<option value="1">Cedula Ciudadana</option>
										<option value="2">Pep</option>
										<option value="3">Pasaporte</option>
										<option value="4">Registro Civil</option>
									</select>
									<label>Tipo de documento</label>
								</div>
								<div class="input-field col s7">
									<input id="cedula_usuario" type="text" class="validate" value="<?php echo $usuario[0]['cedula']; ?>">
									<label class="active" for="cedula_usuario">Numero de identificacion</label>
								</div>
								<div class="input-field col s2">
									<select id="sexo">
										<option value="<?php echo $usuario[0]['sexo'] ?>"><?php echo $usuario[0]['sexo'];  ?></option>
										<option value="1">Mujer</option>
										<option value="2">Hombre</option>
										<option value="3">No binario</option>
									</select>
									<label>Sexo</label>
								</div>
							</div>
							<div class="col s1">
								
							</div>
							</div>
							<div class="col s12">
							<div class="input-field col s12">
								<input id="correo_usuario" type="text" class="validate" value="<?php echo $usuario[0]['correo']; ?>">
								<label class="active" for="correo_usuario">Correo</label>
							</div>
							<div class="input-field col s4">
								<input id="direccion_usuario" type="text" class="validate" value="<?php echo $usuario[0]['direccion']; ?>">
								<label class="active" for="direccion_usuario">Direccion</label>
							</div>
							<div class="input-field col s4">
								<input id="barrio_usuario" type="text" class="validate" value="<?php echo $usuario[0]['barrio']; ?>">
								<label class="active" for="barrio_usuario">Barrio</label>
							</div>
							<div class="input-field col s4">
								<input id="localidad_usuario" type="text" class="validate" value="<?php echo $usuario[0]['localidad']; ?>">
								<label class="active" for="localidad_usuario">localidad</label>
							</div>
							<div class="col s12 edi_usuario">Cambiar Contraseña</div>
							<div class="col s12">
								<div class="input-field col s6">
								<input id="contrasena_usuario" name="pass1" type="password" class="validate" min="6" max="20">
								<label for="contrasena_usuario">Contraseña</label>
							</div>
							<div class="input-field col s6">
								<input id="confirmar_contrasena" name="pass2" type="password" class="validate" min="6" max="20">
								<label for="confirmar_contrasena">Confirmar Contraseña</label>
							</div>
							</div>
							<div class="col s12 edi_usuario">Estado y Puesto del usuario</div>
							<div class="input-field col s6" style="padding-top: 8px;">
								<?php
									$cargos = AdministradotC::busquedAll($usuario[0]['cargo'], 'cargos');
								?>
								
								<select id="cargo_select">
									<option><?php echo $cargos[0]['nombre'] ?></option>
									<?php
										$t_cargos = AdministradotC::all('cargos');
										for ($i=0; $i <count($t_cargos) ; $i++) {
		
											?>
												<option value="<?php echo $t_cargos[$i]['id'] ?>"><?php echo $t_cargos[$i]['nombre'] ?></option>
											<?php
										}
									?>
								</select>
								<label style="padding-top: 15px;">Cargo</label>
							</div>
							<div class="input-field col s6" style="padding-top: 8px;">
								<?php
									if ($usuario[0]['estado'] == 1) {
										$estado = 'Activo';
									} else {
										$estado = 'Inactivo';
									}
								?>
								<select id="estado">
									<option
										value="<?php echo $usuario[0]['estado'] ?>"
										><?php echo $estado ?>
									</option>
									<option value="1">Activo</option>
									<option value="2">Inactivo</option>
								</select>
								<label style="padding-top: 15px;">Estado</label>
							</div>
						</div>
						<div class="col s12 edi_usuario">Permisos</div>
						<?php
							$permisos = AdministradotC::cargoIdC($usuario[0]['id'], 'permisos');
						?>
						<div class="col s12">
							<div class="col s4">
								<label>
									<input type="checkbox" class="filled-in" id="activos"
										<?php echo $permisos[0]['activos'] == 1 ? 'checked': ''; ?>
									/>
									<span>Activos</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input type="checkbox" class="filled-in" id="activos_asigandos"
										<?php echo $permisos[0]['activos_asignados'] == 1 ? 'checked': ''; ?>
									/>
									<span>Activos Asignados</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input type="checkbox" class="filled-in" id="empleados"
										<?php echo $permisos[0]['empleados'] == 1 ? 'checked': ''; ?>
									/>
									<span>Colaboradores</span>
								</label>
							</div>
			
							<div class="col s4">
								<label>
									<input type="checkbox" class="filled-in" id="usuarios"
										<?php echo $permisos[0]['administrador'] == 1 ? 'checked': ''; ?>
									/>
									<span>Administrador</span>
								</label>
							</div>
							<div class="col s4">
								<label>
									<input type="checkbox" class="filled-in" id="reportes"
										<?php echo $permisos[0]['reportes'] == 1 ? 'checked': ''; ?>
									/>
									<span>Reportes</span>
								</label>
							</div>
						</div>
					</form>
					<div class="col s12 center" style="padding-top: 60px;">
						<div class=" btn-flat blue white-text center actualizarBtn" id="actualizarBtn">Actualizar</div>
					</div>
				</div>
			</div>
        <?php
        require_once 'footer.php';
    }else {
        header("Location: ../");
    }
    