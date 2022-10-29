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
			<div class="col s12 no-padding">
					<h5 class="titulo">
						<b>PENDIENTES</b> <b class="right"><div>
						</div></b>
						
					</h5>
					<div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
				</div>
				<div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
					
				</div>
				<div class="row">
			    	<div class="col s12">
						<ul class="tabs">
							<li class="tab col s4"><a href="#test1">Activos por arreglar</a></li>
							<li class="tab col s4"><a class="#test2" href="#test2">Activos dañados</a></li>
							<li class="tab col s4"><a href="#test3">Activos en mantenimiento</a></li>
						</ul>
			    	</div>
				    <div id="test1" class="col s12 center">Activos por arreglar</div>
				    <div id="test2" class="col s12 center">Activos dañados</div>
				    <div id="test3" class="col s12 center">Activos en mantenimiento</div>
			  	</div>
		</div>
	<?php
		
	$controlador->notificaciones();
	$controlador->script('interno');
	
	