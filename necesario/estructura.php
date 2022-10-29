<?php 

    class controlador {
        function base($a) {
            if ($a == 'interno') {
               ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="../librerias/materialize.min.css">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                        <link rel="stylesheet" href="../css/index.css?id=<?php echo date('d-m-Y-h-i-s');?>">
                        <link rel="stylesheet" href="../css/media_queries.css?id=<?php echo date('d-m-Y-h-i-s');?>">
                        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                         <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
                        <link rel="stylesheet" type="text/css" href="../css/media_queries.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
                        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
                        <link rel="stylesheet" type="text/css" href="../css/index.css?id=<?php echo date('d-m-Y-h-i-s');?>">
                        <link rel="stylesheet" type="text/css" href="../css/media_queries.css?id=<?php echo date('d-m-Y-h-i-s');?>"> 
                    </head>
                <?php
                date_default_timezone_set('America/Bogota');
            } else {
                ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <title>Inventory Control CO</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="librerias/materialize.min.css">
                        <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
                        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                        <link rel="stylesheet" href="css/index.css?id=<?php echo date('d-m-Y-h-i-s');?>">
                        <link rel="stylesheet" href="css/media_queries.css?id=<?php echo date('d-m-Y-h-i-s');?>">
                        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                        <link rel="stylesheet" type="text/css" href="css/media_queries.css">
                    </head>
                <?php
                date_default_timezone_set('America/Bogota');
            }
        }
        function script($a) {
            if ($a == 'interno') {
                ?>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                 <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
                 <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script src="../js/index.js?id=<?php echo date('d-m-Y-h-i-s');?>"></script>
                <script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
                <script type="text/javascript">
                    
                </script>
                <?php
            } else {
                ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                    <script src="js/index.js?id=<?php echo date('d-m-Y-h-i-s');?>"></script>
                <?php
            }
        }

        function menu() {
            //print_r($_SESSION); 
            require_once ("../consultas/permisos.php");
            $consultaper = consultarPermisos($_SESSION['id']);
            //print_r ($consultaper[0]['activos']);
            ?>
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <li>
                        <div class="user-view">
                            <a href="#user"><img class="circle" src="https://images.pexels.com/photos/6533803/pexels-photo-6533803.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"></a>
                            <a href="#name"><span class="white-text name"><?php echo $_SESSION['nombre'];?>  <?php echo $_SESSION['apellidos']; ?></span></a>
                            <a href="#email"><span class="white-text email"><?php echo $_SESSION['correo'] ?></span></a>
                        </div>
                    </li>                    
                    <li><a class="boton white-text" id="correo"> <i class="material-icons" style="color: white">home</i>Home</a></li>
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
        }   

        function menu_administrador() {
            ?>
                <div class="row">
                    <div class="col s12 no-padding subnav-wrapper">
                        <ul class="subnav">
                            <a href="administrador.php">
                                <i class="material-icons tooltipped ver_usuario fondo-icono" style="color: #95A5A6; margin-left: 15px; font-size: 30px;" data-tooltip="Ver usuarios">remove_red_eye</i>
                            </a>
                            <a href="agregar_usuario.php">
                                <i class="material-icons tooltipped ver_usuario fondo-icono" style="color: #95A5A6;  margin-left: 20px;" data-tooltip="Crear Colaborador">add_box</i>
                            </a>
                            <a href="asignar_permiso.php">
                                <i class="material-icons tooltipped ver_usuario fondo-icono" style="color: #95A5A6;  margin-left: 20px;" data-tooltip="Asignar Permisos">sync_problem</i>
                            </a>
                            <div class="divider"></div>
                        </ul>
                    </div>
                </div>
            <?php
        }

        function horario() {
            date_default_timezone_set('America/Bogota');
        }

        function notificaciones() {
            require '../consultas/notificaciones.php';
            $notificaciones = all_notificaciones();
            $contarNotificacionesAll = contarNotificaciones();
            $notificacionesString = $contarNotificacionesAll[0]['COUNT(*)'];
            ?>
                <i class="notificacion-chatbot"><?php echo $notificacionesString ?></i>
                <img src="../almacenamiento/campana.png" class="notificaciones" id="notificaciones" alt="">
                <div class="row">
                    <div class="contenido-notificaciones" id="contenido-notificaciones">
                        <div class="col s12 panelNotificaciones">
                            <div class="cerrar" id="cerrar-notificaciones">
                                <div class="col s6 tituloNotificaciones">NOTIFICACIONES</div>
                                <div class=" col s6 right-align" >
                                    <i class="material-icons">close</i>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>

                        <div class="Contenido">
                            <div class="row">
                                <div class="col s12">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="center">Detalles</th>
                                            <th class="center">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                for ($i=0; $i <count($notificaciones) ; $i++) { 
                                                    ?>
                                                        <tr>
                                                            <td class="center"><?php echo $notificaciones[$i]['mensaje'] ?></td>
                                                            <td class="center"><i style="font-size: 25px; font-weight: 500;" class="icon-ro material-icons eliminar_usuario" data-id="<?php echo $notificaciones[$i]['id']; ?>">delete</i>
                                                            <i style="font-size: 25px; font-weight: 500;" class="icon-ro material-icons eliminar_usuario" data-id="<?php echo $notificaciones[$i]['id']; ?>">do_not_disturb_on</i>
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
                    </div>
                </div>
            <?php
        }
    }
    