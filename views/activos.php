<?php
    require_once 'cabezote.php';
    require_once 'menu.php';
    require_once '../controllers/activosC.php';
?>
    <title>Colaboradores | INVENTORY CONTROL CO</title>
    <div class="panel" id="panel" style="padding: 15px;">
        <?php
        
            $activos = ActivosC::allActivos();
            if (isset($activos)) {
                ?>
                    <div class="col s12 no-padding">
                        <h5 class="titulo" style="position: relative;">
                            <strong>Activos existentes</strong>
                            
                        </h5>
                        <div class="col s12 center hide-on-large-only subtitulo">
                            <- Deslize hacía los lados para ver todos los datos ->
                        </div>
                    </div>
                    <div class="col s12 no-padding" style="overflow-x: auto;overflow-y: hidden;">
                        <table class="striped highlight">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Serial</th>
                                    <th>Placa</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>precio</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($activos) ; $i++) {
                                        ?>
                                            <tr class="info">
                                                <td><?php echo $activos[$i]['id'] ?></td>
                                                <td><?php echo $activos[$i]['nombre'] ?></td>
                                                <td><?php echo $activos[$i]['serial'] ?></td>
                                                <td><?php echo $activos[$i]['placa'] ?></td>
                                                <td><?php echo $activos[$i]['tipo'] ?></td>
                                                <td><?php echo $activos[$i]['marca'] ?></td>
                                                <td><?php echo $activos[$i]['precio'] ?></td>
                                                <td>
                                                    <?php
                                                        if ($activos[$i]['estado'] == 1) {
                                                            echo 'Buen estado';
                                                        } elseif ($activos[$i]['estado'] == 2) {
                                                            echo 'dañado';
                                                        } elseif ($activos[$i]['estado'] == 3) {
                                                            echo 'mantenimiento';
                                                        } elseif ($activos[$i]['estado'] == 4) {
                                                            echo 'en uso';
                                                        }
                                                        
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $activos_all = $activos[$i]['id']; ?>
                                                    
                                                        <em class="material-icons borrar_bloqueada
                                                            waves-dark  tooltipped icono-eliminar icono-ver-mas"
                                                            data-id="<?php echo $activos[$i]['id']; ?>"
                                                            data-position="bottom" data-tooltip="Ver más">
                                                            open_in_new
                                                    </em>
                                                    
                                                    <i class="material-icons borrar_bloqueada  waves-dark tooltipped icono-eliminar" data-id="<?php echo $usuarios[$i]['id']; ?>" data-position="bottom" data-tooltip="Editar">loop</i>
                                                    <i class="material-icons borrar_bloqueada  waves-dark tooltipped icono-eliminar" data-id="<?php echo $usuarios[$i]['id']; ?>" data-position="bottom" data-tooltip="Eliminar">delete</i>
                                                </td>

                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                <?php
            } else {
                ?>
                    <div class="col s12 no-padding">
                        <h5 class="titulo" style="position: relative;">
                            <b>No existe ningún activo</b>
                        </h5>
                    </div>
                <?php
            }
        ?>
    </div>
<?php
    require_once 'footer.php';
?>