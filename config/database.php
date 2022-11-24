<?php
    require_once 'config.php';
    class Conexion
    {
        public static function conect()
        {
            $conn = new PDO("mysql:host=localhost;dbname=inventory_control_co_v2", "root", "colombia45");
            $conn->exec('set names utf8');
            return $conn;
        }
    }
