<?php
    require_once 'config.php';
    class conexion
    {
        public static function conect()
        {
            $conn = new PDO("mysql:host=localhost;dbname=inventory_control_co_v2","root","");
            $conn->exec('set names utf8');
            return $conn;
        }
    }
