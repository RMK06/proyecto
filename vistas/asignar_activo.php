<?php
	@\session_start();
	require '../consultas/asignar_activo.php';
	require '../consultas/usuario.php';
	require '../consultas/activos.php';
	require '../necesario/estructura.php';
	$controlador = new controlador();
	$controlador->base('interno');
	$controlador->menu();
    $activos = allActivos();
    $colaboradores = c_Usuarios();
	?>
		<div class="panel" id="panel" style="padding: 15px;">
			<div class="row">
				<div class="col s12 no-padding">
                    <h5 class="titulo" style="position: relative;">
                        <b>Asignar Activos</b>
                    </h5>
                </div>
            </div>
        
            <div class="row">
                <div class="col s10">
                    <div class="input-field col s12 m5">
                        <select class="icons" id="idActivo">
                            <option value="[ninguno]" disabled selected>Seleccione el Activo</option>
                            <?php 
                                for ($i=0; $i <count($activos) ; $i++) { 
                                    if ($activos[$i]['estado'] == 1) {
                                        ?>
                                            <option value="<?php echo $activos[$i]['id'] ?>" data-icon="images/sample-1.jpg"><?php echo $activos[$i]['nombre'] ?> - <?php echo $activos[$i]['serial']?></option>
                                        <?php
                                    }
                                }
                            
                            ?>
                        </select>
                        <label>Asignar Activo:</label>
                    </div>
                    <div class="input-field col s12 m5">
                        <select class="icons" id="idUsuario" >
                            <option value="[ninugno]" disabled selected>Seleccione El operario</option>
                                <?php 
                                    for ($i=0; $i <count($colaboradores) ; $i++) { 
                                            ?>
												<option value="<?php echo $colaboradores[$i]['id']; ?>"><?php echo $colaboradores[$i]['nombre'] ?></option>
											<?php
                                          
                                    }
                                
                                ?>
                        </select>
                        <label>Operario que se le va a asignar:</label>
                               
                    </div>
                    <div class="input-field col s10">
                        <textarea id="texDetalles" class="materialize-textarea" data-length="120"></textarea>
                        <label for="texDetalles">Observaciones</label>
                    </div>
                    <div class="input-field col s5">
                        <input placeholder="Cantidad" id="cantidadInv" type="number" class="validate" value="1">
                        <label for="cantidadInv">Cantidad</label>
                    </div>
                    <div class="input-field col s5">
                        <input placeholder="Ubicacion" id="ubicacionInv" type="text" class="validate">
                        <label for="ubicacionInv">Ubicacion Donde se le hace entrega:</label>
                    </div>
                    <div class="input-field col s5">
                        <form class = "col s12">
                            <label>Fecha de Inicio</label>              
                            <input id="fecha_inicio" type = "date"  />    
                        </form>  
                    </div>
                    <div class="input-field col s5">
                        <form class = "col s12">
                            <label>Fecha Fin</label>              
                            <input id="fecha_fin" type = "date"  />    
                        </form>  
                    </div>
                    
                </div>
            </div>
            <div class="center">
                <a class="btn" id="btn_asignar_activo">Asignar Activo</a>
            </div>
            
        </div>
	<?php
	$controlador->script('interno');
				
?>