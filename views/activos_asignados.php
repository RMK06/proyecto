<?php
    require_once 'cabezote.php';
    require_once 'menu.php';
    require_once '../controllers/activosC.php';
?>
<title>Colaboradores | INVENTORY CONTROL CO</title>
<div class="panel" id="panel" style="padding: 15px;">
    <div class="row">
            
        <div class="col s12 no-padding">
                <h5 class="titulo" style="position: relative;">
                    <b>Activos asignados</b>
                    
                </h5>
                <div class="col s12 center hide-on-large-only subtitulo"><- Deslize hacía los lados para ver todos los datos -></div>
            </div>
            <div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
                <table class="striped highlight centered">
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
                            $activos = ActivosC::activosAsignados();
                            for ($i=0; $i < count($activos); $i++) {
                                ?>
                                    <tr>
                                        <td><?php echo $activos[$i]['id'] ?></td>
                                        <td>
                                            <?php 
                                                $empleado_id = ActivosC::idColaborador($activos[$i]['id_empleado']);
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
                                            <div class="agregarMov" data-id="<?php echo $activos[$i]['id']; ?>"><i class="material-icons" >add</i></div>
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
<?php
    require_once 'footer.php';
?>