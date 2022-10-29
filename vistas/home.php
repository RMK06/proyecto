<?php 
	require '../necesario/estructura.php';
	$controlador = new controlador();
    @\session_start();
    if (isset($_SESSION['id'])){
    	$controlador->base('interno');
        ?> 
			<title>Bienvenido <?php echo $_SESSION['nombre'] ?></title>
			<body>
			  	<?php $controlador->menu() ?>
				<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i style="font-size: 40px;" class="material-icons">menu</i></a>
				<div class="panel" id="panel" style="padding: 15px;">
			  	 	<div class="row" id="panel">
			        	<div class="col l12 m12 s12">
			        		<div class="col l12">
			        			<p class="center title-home">Home</p>
			        		</div>
			        	</div>
			        	<div class="row">
				    		<div class="col l4  s12 center graf-padd">
				    				<div class="col s12 grey lighten-3">	
				    					<p class="text-sub">Activos en uso</p>
				    					<span class="sub-icon">18<i class="material-icons" style="color: #239B56;">arrow_drop_up</i></span>
				    				</div>
				    			</div>
				    			<div class="col l4  s12 center graf-padd">
				    				<div class="col s12 grey lighten-3">	
				    					<p class="text-sub">Total trabajadores</p>
				    					<span class="sub-icon">125<i class="material-icons" style="color: #239B56;">arrow_drop_up</i></span>
				    				</div>
				    			</div>
				    			<div class="col l4 s12 center graf-padd">
				    				<div class="col l12 m12 s12 grey lighten-3">	
				    					<p class="text-sub">Cambios en la pagina</p>
				    					<span class="sub-icon">18<i class="material-icons" style="color: #239B56;">arrow_drop_up</i></span>
				    				</div>
				    			</div>
				    		</div>
			        	</div>
			        		<div class="row">
				        		<div class="col l6 m12 ">
				        			<div class="col s12 grey lighten-3 ">
				        				 <canvas id="grafica"></canvas>
				    					<script src="../js/index.js"></script>				
				        			</div>
				        		</div>
				        		
				        		<div class="col l6 m12 graf-padd">
				        			<div class="col l12 m12 s12 grey lighten-3 ">
				        				<canvas id="gra"></canvas>
				    					<script src="../js/index.js"></script>
				        			</div>
				        		</div>
			        		</div>
			        	</div>
			        </div>	
			    </div>
			    <?php 
			    	$controlador->script('interno');
			    ?>
			</body>
        <?php
    }else{
 		header('Location:../index.php');
     	die();
    }

