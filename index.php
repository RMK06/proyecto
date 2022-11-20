<?php
    @\session_start();
    require_once 'controllers/Login.php';
    $login = new IniciarSesion();
    $login ->login();
    
   