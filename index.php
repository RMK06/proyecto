<?php 
    require 'necesario/estructura.php';
    $controlador = new controlador();
    @\session_start();
    if (isset($_SESSION['id'])) {
        ?> 
            <script>
                window.location.href = 'vistas/home.php';
            </script>
        <?php
    } else {
            $controlador->base('externo');
        ?> 
            <div class="row">
                    <div class="col s12 l12">
                        <div class="col s6 l6 izquierda"></div>
                        <div class="col s12 l6 panel_der">
                            <div class="col s12">
                                <div class="row">
                                    <div class="center logo_login">
                                        <img class="responsive-img img-login" src="almacenamiento/INVENTORY CONTRO_CO.png" draggable="false">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input placeholder="Ej: micorreo@gmail.com" id="correo" type="email" class="validate">
                                        <label for="correo">Escriba aquí su correo electrónico:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="contrasena" type="password" class="validate">
                                        <label for="contrasena">Escriba aquí su contraseña</label>
                                        <span class="helper-text recuperar">¿Olvidó su contraseña?</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <button class="btn-flat col s12 waves-effect waves-dark iniciar_sesion"><i class="material-icons left">exit_to_app</i>Iniciar Sesión</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            $controlador->script('externo');
    }
    ?> 
