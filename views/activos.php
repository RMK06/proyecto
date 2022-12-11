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
                                                        data-position="bottom" data-tooltip="Ver o editar">
                                                        edit
                                                </em>
                                                <em class="material-icons borrarActivo  waves-dark
                                                    tooltipped icono-eliminar"
                                                    data-id="<?php echo $activos[$i]['id']; ?>"
                                                    data-position="bottom" data-tooltip="Eliminar">delete
                                                </em>
                                                <em class="material-icons borrarActivo  waves-dark
                                                    tooltipped icono-eliminar"
                                                    data-id="<?php echo $activos[$i]['id']; ?>"
                                                    data-position="bottom" data-tooltip="Asignar">timeline
                                                </em>
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
                        <strong>No existe ningún activo</strong>
                    </h5>
                </div>
            <?php
        }
    ?>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 no-padding">
                <h5 class="titulo" style="position: relative;">
                    <strong>Ver o editar Activos</strong>
                </h5>
            </div>
            <input type="text" id="idActi" hidden>
            <div class="input-field col s6">
                <input placeholder="" id="Nombre" type="text" class="validate">
                <label class="active" for="Nombre">Nombre</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="" id="Serial" type="text" class="validate">
                <label class="active" for="Serial">Serial</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="" id="Placa" type="text" class="validate">
                <label class="active" for="Placa">Placa</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="" id="Tipo" type="text" class="validate">
                <label class="active" for="Tipo">Tipo</label>
            </div>
            <div class="input-field col s6">
                <input placeholder="" id="Marca" type="text" class="validate">
                <label class="active" for="Marca">Marca</label>
            </div>
            <div class="input-field col s6">
                <input  placeholder="" id="Precio" type="text" class="validate">
                <label class="active" for="Precio">Precio</label>
            </div>
            <div class="input-field col s12">
                <textarea id="Detalles" class="materialize-textarea"></textarea>
                <label  for="Detalles">Detalles</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      <div class="btn" id="actualizarActivo">Actualizar</div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>