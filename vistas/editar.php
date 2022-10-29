<?php
	require '../consultas/usuario.php';
	function editar_usuario() {
		//print_r($_POST['id_usuario']);
		$usuario_id = $_POST['id_usuario'];
		$usuario = ver_usuarios($usuario_id);
		$tipo_cedula = $usuario[0]['tipo_identificacion'];
		$Consultar_ifc = consultarIfc($tipo_cedula);
		?>
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
							    <select>
							    	
									<option value="" disabled selected><?php echo $Consultar_ifc[0]['tipo_identificacion'] ?></option>
									<option value="1">Cedula de Ciudadania</option>
									<option value="2">Registro Civil</option>
									<option value="3">Cedula de extranjeria</option>
									<option value="4">Pasaporte</option>
							    </select>
						    	<label>Tipo de documento</label>
						    </div>
						    <div class="input-field col s7">
						        <input id="cedula_usuario" type="text" class="validate" value="<?php echo $usuario[0]['cedula']; ?>">
						        <label class="active" for="cedula_usuario">Numero de identificacion</label>
					        </div>
					        <div class="input-field col s2">
							    <select>
									<option value="" disabled selected><?php echo $usuario[0]['sexo'];  ?></option>
									<option value="1">Mujer</option>
									<option value="2">Hombre</option>
									<option value="3">No binario</option>
							    </select>
						    	<label>Sexo</label>
						    </div>
						</div>
						<div class="col s1">
								
							  <img class="materialboxed" width="150" src="../<?php echo $usuario[0]['foto'] ?>">
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
				        		$cargos = cargos_id_admin($usuario[0]['cargo']);
				        	?>
						    <select>
								<option  disabled selected><?php echo $cargos[0]['nombre'] ?></option>
								<?php 
									$t_cargos = todosLosCargos();
									for ($i=0; $i <count($t_cargos) ; $i++) { 
										?>
											<option value="1"><?php echo $t_cargos[$i]['nombre'] ?></option>
										<?php
									}
								?>
						    </select>
					    	<label style="padding-top: 15px;">Cargo</label>
					    </div>
						<div class="input-field col s6" style="padding-top: 8px;">
							<?php 
								$estado_usuario = estadoUsuario($usuario[0]['estado']);
								//print_r($estado_usuario);
							?>
						    <select>
								<option value="" disabled selected><?php echo $estado_usuario[0]['estado'] ?></option>
								<?php
									$t_estados = tEstados();
									for ($i=0; $i <count($t_estados) ; $i++) { 
										?>
											<option value="<?php $t_estados[$i]['id'] ?>"><?php echo $t_estados[$i]['estado'] ?></option>
										<?php
									}
								?>
								
								
						    </select>
					    	<label style="padding-top: 15px;">Estado</label>
					    </div>
					</div>
					<div class="col s12 edi_usuario">Permisos</div>
					<?php
						$permisos = permisos_usuario($usuario[0]['id']);
						//print_r($permisos);
					?>
					<div class="col s12">
						<div class="col s4">
							<label>
		    					<input type="checkbox" class="filled-in" id="activos"  <?php echo $permisos[0]['activos'] == 1 ? 'checked': ''; ?>  />
		    					<span>Activos</span>
		  					</label>
						</div>
						<div class="col s4">
							<label>
		    					<input type="checkbox" class="filled-in" id="activos_asigandos" <?php echo $permisos[0]['activos_asignados'] == 1 ? 'checked': ''; ?> />
		    					<span>Activos Asignados</span>
		  					</label>
						</div>
						<div class="col s4">
							<label>
		    					<input type="checkbox" class="filled-in" id="empleados" <?php echo $permisos[0]['empleados'] == 1 ? 'checked': ''; ?>  />
		    					<span>Colaboradores</span>
		  					</label>
						</div>
						<div class="col s4">
							<label>
		    					<input type="checkbox" class="filled-in" id="historial" <?php echo $permisos[0]['historial'] == 1 ? 'checked': ''; ?> />
		    					<span>Historial</span>
		  					</label>
						</div>
						<div class="col s4">
							<label>
		    					<input type="checkbox" class="filled-in" id="usuarios"  />
		    					<span>Administrador</span>
		  					</label>
						</div>
						<div class="col s4">
							<label>
		    					<input type="checkbox" class="filled-in" id="reportes" <?php echo $permisos[0]['reportes'] == 1 ? 'checked': ''; ?> />
		    					<span>Reportes</span>
		  					</label>
						</div>
					</div>
				</form>
				<div class="col s12 center" style="padding-top: 60px;">
					<a href="#!" class=" btn-flat blue white-text center" id="actualizar_usuario_btn">Actualizar</a>
				</div>
			</div>
		<?php
	}

	if (isset($_POST['metodo'])) {
		if (function_exists($_POST['metodo'])) {
			if (isset($_POST['vista']) && $_POST['vista'] == 'yes') {
				?>
					<div class="row">
						<div class="col s12 no-padding subnav-wrapper">
							<ul class="subnav">
								<li  class="waves-effect waves-dark tooltipped" id="ver_usuario" data-position="bottom" title="Ver usuarios" ><div>
									<i class="material-icons" style="color: #95A5A6; margin-left: 15px;">remove_red_eye</i></div>
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