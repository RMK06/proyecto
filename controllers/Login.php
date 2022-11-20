<?php
    
    class IniciarSesion
    {
        public function login()
        {
            include_once('views/login.php');
        }

        public function validarUsuario()
        {
            require_once('../models/validarUsuario.php');
            CValidarUsuario::mValidarUsuario($_POST);
            
        }
    }

    if (isset($_POST['correo'])) {
        $valUsuario = new IniciarSesion();
        $valUsuario -> validarEmail = $_POST['correo'];
        $valUsuario -> validarPass = $_POST['contrasena'];
        $valUsuario -> validarUsuario();
    }
