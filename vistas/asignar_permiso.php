<?php
	@\session_start();
	require_once('../necesario/estructura.php');
	require_once '../consultas/usuario.php';
	$controlador = new controlador();
	$controlador->base('interno');
	$controlador->menu();
	$colab = v_colaboradores();
	$usuarios = todos_usuarios();

?>
	<div class="panel" id="panel" style="padding: 15px;">
		<div class="col s12 no-padding">
			<h5 class="titulo">
				<strong>Asignar Permisos</strong><br/>
			</h5>
		</div>
		<table class="striped highlight">
		<caption></caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>apellido</th>
					<th>Correo</th>
					<th>Asignar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$colab = v_colaboradores();
					for ($i=0; $i < count($colab) ; $i++) { 
						?>
							<tr>
								<td id="prueba"><?php echo $colab[$i]['id'] ?></td>
								<td><?php echo $colab[$i]['nombre'] ?></td>
								<td><?php echo $colab[$i]['apellidos'] ?></td>
								<td><?php echo $colab[$i]['correo'] ?></td>
								<td>
									<button class="waves-effect btn-flat agregar_colaborador" data-id="<?php echo $colab[$i]['id']; ?>"><em style="font-size: 25px; font-weight: 500;" class="material-icons">loop</em></button>
									
								</td>
							</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	
  </div>
<?php $controlador->script('interno') ?>
