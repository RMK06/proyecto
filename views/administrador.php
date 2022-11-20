<?php
    require_once '../controllers/administradorC.php';
    require_once 'cabezote.php';
    require_once 'menu.php';
    $usuarios = AdministradotC::mostrarDatos();
?>
    <div class="panel" id="panel" style="padding: 15px;">
        <div class="col s12 no-padding">
            <h5 class="titulo" style="position: relative;">
                <strong>Usuarios existentes</strong>
                <em class="fa-solid fa-circle-plus"></em>

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
                        <th class="center">Nombre</th>
                        <th class="center">apellido</th>
                        <th class="center">Correo</th>
                        <th class="center">Cargo</th>
                        <th class="center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($usuarios)) {
                            for ($i=1; $i < count($usuarios) ; $i++) {
                                ?>
                                    <tr class="data-table" data-id="<?php echo $usuarios[$i]['id']; ?>">
                                        <td class="center"><?php echo $usuarios[$i]['nombre'] ?></td>
                                        <td class="center"><?php echo $usuarios[$i]['apellidos'] ?></td>
                                        <td class="center"><?php echo $usuarios[$i]['correo'] ?></td>
                                        
                                        <td class="center">
                                            <?php
                                                $id_cargo_a = AdministradotC::mostrarCargos($usuarios[$i]['cargo']);
                                                for ($j=0; $j < count($id_cargo_a) ; $j++) {
                                                    echo $id_cargo_a[$j]['nombre'];
                                                }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <a href="actualizar_usuario.php?active=<?php echo $active; ?>&id=<?php
                                                echo $usuarios[$i]['id']; ?>">
                                                <em style="font-size: 25px; font-weight: 500;"
                                                    class="icon-ro material-icons actualizar_usuario"
                                                    data-id="<?php echo $usuarios[$i]['id']; ?>">loop
                                            </em>
                                            </a>
                                            <i style="font-size: 25px; font-weight: 500;" class="icon-ro material-icons eliminar_usuario" data-id="<?php echo $usuarios[$i]['id']; ?>">delete</i>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else {
                            echo ' no hay datos';
                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    require_once 'footer.php';
?>