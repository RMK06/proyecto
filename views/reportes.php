<?php
    require_once 'cabezote.php';
    require_once 'menu.php';
    require_once '../controllers/activosC.php';
?>
<title>Colaboradores | INVENTORY CONTROL CO</title>
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
    require_once 'footer.php';
?>