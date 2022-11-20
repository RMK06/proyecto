
<?php
  
    @\session_start();
    require_once 'cabezote.php';
    ?>
        <ul id="slide-out" class="sidenav sidenav-fixed">
            <li>
                <div class="user-view">
                    <a href="#user">
                        <img class="circle" alt="" src="../almacenamiento/fotos_usuarios/usuario.jpg">
                    </a>
                    <a href="#name">
                        <span class="white-text name">
                            <?php echo $_SESSION['nombre'];?>  <?php echo $_SESSION['apellidos']; ?>
                        </span>
                    </a>
                    <a href="#email"><span class="white-text email"><?php echo $_SESSION['correo'] ?></span></a>
                </div>
            </li>
            <li>
                <a class="boton white-text" id="correo">
                    <em class="material-icons" style="color: white">home</em>Home
                </a>
            </li>
                    <li><a class="subheader">Aplicaciones</a></li>
                    <a href=""></a>
                    <?php 
                        if ($consultaper[0]['administrador'] == 1) {
                            if (count($_GET) > 0) {
                                if ($_GET['active'] == 1) {
                                    $activo = 'active';
                                }else if ($_GET['active'] == 2){
                                    $activo1 = 'active';
                                }
                            }
                           
                            ?>
                                <ul class="collapsible">
                                    <li id="modulos" class="<?php echo $activo; ?>" >
                                        <div class="collapsible-header modulos">
                                            <i class="material-icons" style="color: #5499C7">person</i>Administrador  <i class="material-icons right">keyboard_arrow_down</i>
                                        </div>
                                        <div class="collapsible-body container">
                                            <ul class="list__show">
                                                <li>
                                                    <a href="administrador.php?active=1"><span class="list__inside">Ver usuarios</span></a> 
                                                </li>
                                                <li>
                                                    <a href="agregar_usuario.php?active=1"><span class="list__inside">Crear colaborador</span></a> 
                                                </li>
                                                <li>
                                                    <a href="asignar_permiso.php?active=1"><span class="list__inside">Asignar Permisos</span></a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                
                            <?php
                        }
                        if ($consultaper[0]['empleados'] == 1) {
                            ?>
                                <li class="border-1"><a class="white-text" id="colaboradores"> 
                                   <i class="material-icons" style="color: #58D68D">people</i>Colaboradores</a>
                                </li>
                            <?php
                        }
                        if ($consultaper[0]['activos'] == 1) {
                            ?>
                                <ul class="collapsible">
                                    <li id="modulos" class="<?php echo $activo1; ?>" >
                                        <div class="collapsible-header modulos">
                                            <i class="material-icons" style="color: #5499C7">computer</i>Activos  <i class="material-icons right">keyboard_arrow_down</i>
                                        </div>
                                        <div class="collapsible-body container">
                                            <ul class="list__show">
                                                <li class="list__inside">
                                                    <a href="activos.php?active=2"><span class="list__inside">Ver Activos</span></a> 
                                                </li>
                                                <li class="list__inside">
                                                    <a href="activos.php?active=2"><span class="list__inside">Agregar Activos</span></a> 
                                                </li>
                                                <?php 
                                                    if ($consultaper[0]['activos_asignados'] == 1) {
                                                        ?>
                                                            <li class="list__inside">
                                                                <a href="activos_asignados.php?active=2"><span class="list__inside">Activos Asignados</span></a> 
                                                            </li> 
                                                        <?php
                                                    }
                                                ?>
                                                <?php 
                                                    if ($consultaper[0]['activos_asignados'] == 1) {
                                                        ?>
                                                            <li class="list__inside">
                                                                <a href="asignar_activo.php?active=2"><span class="list__inside">Asignar Activos</span></a> 
                                                            </li> 
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            <?php
                        }
                        if ($consultaper[0]['pendientes'] == 1) {
                            ?>
                                <li>
                                    <a class="white-text" id="pendientes" href="#!"> <i class="material-icons" style="color: #7FB3D5">check_circle</i>Pendientes</a>
                                </li>
                            <?php
                        }
                        if ($consultaper[0]['reportes'] == 1) {
                            ?>
                                <li>
                                    <a class="white-text" id="reportes" href="#!"> <i class="material-icons" style="color: #F4D03F">inventory</i>Reportes</a>
                                </li>
                            <?php
                        }
                    ?>
                    <li><a class="subheader">Ajustes</a></li>
                    <li><a class="white-text" href="#!"> <i class="material-icons" style="color: white;">settings</i>Configuracion</a></li>
                    <li><a class="white-text" href="#!"> <i class="material-icons" style="color: white;">history</i>Historial</a></li>
                    <li><a class="white-text salir" href="#!"> <i class="material-icons" style="color: white;">logout</i>Salir</a></li>
              </ul>
    <?php
    require_once 'footer.php';