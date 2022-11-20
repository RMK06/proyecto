<?php
    require_once 'views/cabezote.php';
?>
<div class="row">
    <div class="col s12 l12">
        <div class="col s6 l6 izquierda"></div>
        <div class="col s12 l6 panel_der">
            <div class="col s12">
                <div class="center logo_login">
                    <img class="responsive-img img-login" alt=""
                        src="almacenamiento/INVENTORY CONTRO_CO.png" draggable="false"
                    >
                </div>
                <div class="input-field col s12">
                    <em class="material-icons prefix">email</em>
                    <input placeholder="Ej: micorreo@gmail.com" id="correo" type="email" class="validate">
                    <label for="correo">Escriba aquí su correo electrónico:</label>
                </div>
                <div class="input-field col s12">
                    <em class="material-icons prefix">lock</em>
                    <input id="contrasena" type="password" class="validate">
                    <label for="contrasena">Escriba aquí su contraseña</label>
                    <span class="helper-text recuperar">¿Olvidó su contraseña?</span>
                </div>
                <div class="container">
                    <button class="btn-flat col s12 waves-effect waves-dark iniciar_sesion">
                        <em class="material-icons left">exit_to_app</em>Iniciar Sesión
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once 'views/footer.php';
?>