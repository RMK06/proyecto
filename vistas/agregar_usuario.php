<?php
	@\session_start();
	require_once ('../necesario/estructura.php');
	require_once  '../consultas/usuario.php';
	$controlador = new controlador();
	$controlador->base('interno');
	$controlador->menu();
	$tipo_identificacion = consultarIfc('');
	$cargo = todosLosCargos();
	
?>
	<div class="panel" id="panel" style="padding: 15px;">
			
		<h5 class="titulo" style="position: relative;">
			<strong>  Agregar Colaborador</strong>  						
		</h5>
		<div class="row">
			<br>
			<div class="col s12">
				<br/>
				<div class="col s10">
					<form enctype="multipart/form-data">
						<div class="input-field col s6">
					        <input id="nombre_usuario" type="text" class="validate">
					        <label class="active" for="nombre_usuario">Nombres</label>
				        </div>
				        <div class="input-field col s6">
					        <input id="apellido_usuario" type="text" class="validate">
					        <label class="active" for="apellido_usuario">Apellido</label>
				        </div>
				        <div class="input-field col s12">
					        <input id="numero_usuario" type="text" class="validate">
					        <label class="active" for="numero_usuario">Numero de telefono</label>
				        </div>
				        <div class="input-field col s3">
						    <select  id="tipo_identificacion">
								<option value="<?php echo $Consultar_ifc[0]['id'] ?>"  disabled selected>Tipo de Identificacion</option>
								<?php 
									
									for ($i=0; $i < count($tipo_identificacion); $i++) {
										 
										?>
											<option value="<?php echo $tipo_identificacion[$i]['id']; ?>"><?php echo $tipo_identificacion[$i]['tipo_identificacion'] ?></option>
										<?php
									}
								?>
						    </select>
					    	<label>Tipo de documento</label>
					    </div>
					    <div class="input-field col s7">
					        <input id="cedula_usuario" type="text" class="validate">
					        <label class="active" for="cedula_usuario">Numero de identificacion</label>
				        </div>
				        <div class="input-field col s2">
						    <select id="sexo">
								<option value="" disabled selected>Sexo</option>
								<option value="1">Mujer</option>
								<option value="2">Hombre</option>
								<option value="3">No binario</option>
						    </select>
					    	<label>Sexo</label>
					    </div>
					</div>
						<div class="col s1">
							  <img class="materialboxed" alt="" width="150" src="../<?php //echo $usuario[0]['foto'] ?>">
						</div>
						</div>
						<div class="col s12">
							<div class="input-field col s3">
								<select  id="selectCargo">
									<option  disabled selected>Cargo</option>
									<?php 
										for ($i=0; $i < count($cargo); $i++) {
											
											?>
												<option value="<?php echo $cargo[$i]['id']; ?>"><?php echo $cargo[$i]['nombre'] ?></option>
											<?php
										}
									?>
								</select>
								<label>Tipo de documento</label>
							</div>
							<div class="input-field col s9">
						        <input id="correo_usuario" type="text" class="validate">
						        <label class="active" for="correo_usuario">Correo</label>
					        </div>
					        <div class="input-field col s4">
						        <input id="direccion_usuario" type="text" class="validate" >
						        <label class="active" for="direccion_usuario">Direccion</label>
					        </div>
					        <div class="input-field col s4">
						        <input id="barrio_usuario" type="text" class="validate">
						        <label class="active" for="barrio_usuario">Barrio</label>
					        </div>
					        <div class="input-field col s4">
						        <input id="localidad_usuario" type="text" class="validate">
						        <label class="active" for="localidad_usuario">localidad</label>
					        </div>
					      </form>
					  </div>
					</div>
				        <h5 class="titulo" style="position: relative;">
							<strong>  Permisos especiales</strong>  						
						</h5>
				        <p>
					      <label>
					        <input id="permisos_especiales" type="checkbox" />
					        <span>¿Permisos especiales?</span>
					      </label>
					    </p>
					    <div id="permisos_especiales_formulario">
					    	<div class="col s12 no-padding">
								<h5 class="titulo">
									<strong>  Contraseña</strong>  
								</h5>
							</div>
							<div class="col s12 no-padding">
								<div class="input-field col s12 m6">
									<em     class="material-icons prefix">lock_open</em>
									<input id="contrasena" type="password" class="validate">
									<label for="contrasena">Contraseña<span class="asterisco">*</span><span class="ayuda ayuda_contrasena tooltipped" data-position="bottom" data-tooltip="">?</span></label>
								</div>
								<div class="input-field col s12 m6">
									<i class="material-icons prefix">lock</em>
									<input id="repeticion" type="password" class="validate">
									<label for="repeticion">Repetir la contraseña<span class="asterisco">*</span></label>
								</div>
								<div class="col s12 m6">
									<div class="progress">
										<div class="determinate"></div>
									</div>
								</div>
							</div>
							<div class="col s12 no-padding">
								<h5 class="titulo">
									<strong>  Permisos</strong>  
								</h5>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="col s4">
										<label>
											<input type="checkbox" class="filled-in" id="activos"   />
											<span>Activos</span>
											</label>
									</div>
									<div class="col s4">
										<label>
											<input type="checkbox" class="filled-in" id="activos_asigandos"  />
											<span>Activos Asignados</span>
											</label>
									</div>
									<div class="col s4">
										<label>
											<input type="checkbox" class="filled-in" id="empleados"  />
											<span>Colaboradores</span>
											</label>
									</div>
									<div class="col s4">
										<label>
											<input type="checkbox" class="filled-in" id="historial"  />
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
											<input type="checkbox" class="filled-in" id="reportes"  />
											<span>Reportes</span>
										</label>
									</div>
									<div class="col s4">
										<label>
											<input type="checkbox" class="filled-in" id="Pendientes"  />
											<span>Pendientes</span>
										</label>
									</div>
									<div class="col s4">
										<label>
											<input type="checkbox" class="filled-in" id="agregarUsuarios"  />
											<span>Agregar Usuarios</span>
										</label>
									</div>
									
								</div>
			    			</div>
						</div>
					    <div class="col s12 center" style="padding-top: 60px;">
							<a href="#!" class=" btn-flat blue white-text center" id="actualizar_usuario_btn">Agregar</a>
						</div>
					</div>
				</div>
			</div>
	</div>

 
<?php $controlador->script('interno') ?>
